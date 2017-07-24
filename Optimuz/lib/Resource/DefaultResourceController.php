<?php
/**
 * This file contains only a controller.
 * @version 0.2
 * @package Resource
 */

/**
 * This controller sends the page components like: scripts, stylesheets, images
 * and others.
 *
 * Depending on the application configuration and the file type, the components
 * can be minified, compressed and merged in only one file, all on the fly. This
 * is made to reduce the requests made by the UA. In this case, the final files
 * are stored in the application cache.
 * @author Diego Andrade
 * @package Resource
 * @since Optimuz 0.1
 * @version 0.2
 * @uses Core
 * @uses Lang
 * @uses IO
 * @uses Http
 * @uses Minify
 * @uses DateTime
 */
class DefaultResourceController extends Object
{
	/**
	 * Invalid resource identifier (UID).
	 */
	const INVALID_UID					= 806;

	/**
	 * Invalid resource identifier (UID).
	 */
	const INVALID_PARAMS				= 807;
	
	/**
	 * Creates a new controller instance.
	 *
	 * This controller sends the page components like: scripts, stylesheets, images
	 * and others.
	 *
	 * Depending on the application configuration and the file type, the components
	 * can be minified, compressed and merged in only one file, all on the fly. This
	 * is made to reduce the requests made by the UA. In this case, the final files
	 * are stored in the application cache.
	 */
	public function __construct()
	{
	}

	/**
	 * Reads the resource files and send them to UA.
	 * @param ArrayList $params These parameters indicate the resource files
	 * that must be loaded.
	 * @todo Fix problem when the property ResourceLoader::$storageEngine is set
	 * to ResourceLoader::ENGINE_SESSION (browser does not send the header
	 * If-Modified-Since, so the file cannot be cached).
	 */
	public function load(ArrayList $params = null)
	{
		$httpStatus = 404;
		$request = CurrentHttpRequest::getInstance();
		$response = CurrentHttpResponse::getInstance();

		// check parameters
		if($params->count() == 2)
		{
			$resourceType = Text::plain($params[0]);
			$uid = Text::plain($params[1]);
			$resourceContent = '';

			// check UID
			if(preg_match('/^[a-zA-Z0-9]+$/', $uid))
			{
				$response->setContentType("text/{$resourceType}");

				// recover the content
				switch(LocalConfiguration::get('resources.storage.engine'))
				{
					case ResourceLoader::ENGINE_FILES:
						$cacheDir = Enviroment::getPath('cache');
						$resourcePath = $cacheDir . $uid;
						$cacheFilePath = "{$resourcePath}.cache";

						if(File::exists($resourcePath))
						{
							$useCache = false;
							$canCache = true;
							$newCache = true;

							if(File::exists($cacheFilePath))
							{
								$cacheHeaders = ArrayList::create('Pragma', 'Cache-Control');
								$useCache = true;
								$newCache = !$request->hasHeader('If-Modified-Since');

								foreach($cacheHeaders as $header)
								{
									if(($canCache = !$request->hasHeader($header)))
										break;
								}
							}

							if($useCache && $canCache)
							{
								if($newCache)
								{
									// calculate dates
									$expires = Date::get();
									$expires->addSecond(LocalConfiguration::get('resources.storage.lifetime'));

									// write dates to cache file
									$cacheFile = File::open($cacheFilePath);
									$cacheFile->write($expires->getGMT());

									// set cache headers
									$response->setCache($expires);

									// set file to download and response status
									$response->setFile($resourcePath, false);
									$httpStatus = 200;
								}
								else
								{
									// open cache file
									$cacheFile = File::open($cacheFilePath);

									// set cache header
									$response->setCache($cacheFile->read());

									// set content type and response status
									$response->setContentType("text/{$resourceType}");
									$httpStatus = 304;
								}

								// set last modified header
								$response->setHeader('Last-Modified', Date::parse($cacheFile->getModifiedTime())->getGMT());
							}
							else
							{
								$response->setFile($resourcePath, false);
								$httpStatus = 200;
							}
						}
						else
						{
							Report::sendError(new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.uidNotFound', $uid), self::INVALID_UID));
						}
						break;
					case ResourceLoader::ENGINE_SESSION:
						$cacheUid = "{$uid}_cache";
						$cacheLastModfied = "{$uid}_lastMod";

						if(Session::exists($uid))
						{
							$useCache = false;
							$canCache = true;
							$newCache = true;

							if(Session::exists($cacheUid))
							{
								$cacheHeaders = ArrayList::create('Pragma', 'Cache-Control');
								$useCache = true;
								$newCache = !$request->hasHeader('If-Modified-Since');

								foreach($cacheHeaders as $header)
								{
									if(($canCache = !$request->hasHeader($header)))
										break;
								}
							}

							if($useCache && $canCache)
							{
								if($newCache)
								{
									// calculate dates
									$now = Date::GMT();
									$expires = Date::get();
									$expires->addSecond(LocalConfiguration::get('resources.storage.lifetime'));

									// write dates to session
									Session::set($cacheUid, $expires->getGMT());
									Session::set($cacheLastModfied, $now);
									
									// set cache headers
									$response->setCache($expires);

									// set file to download and response status
									$response->setContent(Session::get($uid));
									$httpStatus = 200;
								}
								else
								{
									// set cache header
									$response->setCache(Session::get($cacheUid));

									// set content type and response status
									$response->setContentType("text/{$resourceType}");
									$httpStatus = 304;
								}

								// set last modified header
								$response->setHeader('Last-Modified', Session::get($cacheLastModfied));
							}
							else
							{
								$response->setContent(Session::get($uid));
								$httpStatus = 200;
							}
						}
						else
						{
							Report::sendError(new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.uidNotFound', $uid), self::INVALID_UID));
						}
						break;
					default:
						break;
				}
			}
			else
			{
				Report::sendError(new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.invalidUid'), self::INVALID_UID));
			}
		}
		else
		{
			Report::sendError(new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.invalidParams'), self::INVALID_PARAMS));
		}

		$response->setHeader('Accept-Ranges', 'bytes');
		$response->setStatusCode($httpStatus);
		$response->send();
	}
}
?>