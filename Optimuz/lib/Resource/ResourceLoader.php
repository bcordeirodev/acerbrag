<?php
/**
 * This file is used to handle resource files such as CSS and Javascript files.
 * @version 0.2
 * @package Resource
 */

/**
 * This class is used to store and recover resources files, such as CSS and
 * Javascript.
 *
 * It can use the file system or session to handle the files. This setting can
 * be done in the class or with through the setting "resources.storage.engine".
 * The default engine is setted to "files".
 * @author Diego Andrade
 * @package Resouce
 * @since Optimuz 0.3
 * @version 0.2
 * @uses Core
 * @uses Collection
 * @uses Minify
 * @uses Lang
 * @uses DateTime
 */
class ResourceLoader extends Object
{
	/**
	 * The selected storage engine is not supported (invalid).
	 */
	const INVALID_STORAGE_ENGINE	= 2701;

	/**
	 * A resource file is invalid.
	 */
	const INVALID_RESOURCE_FILE		= 2702;

	/**
	 * File system is used to store the resource files.
	 */
	const ENGINE_FILES				= 'files';

	/**
	 * Session is used to store the resource files.
	 */
	const ENGINE_SESSION			= 'session';

	/**
	 * Files that will be loaded together. These files will use only one HTTP
	 * request for each file type.
	 * @var ArrayList
	 * @see ResourceLoader::addResource()
	 */
	protected $resourcesToLoad		= null;

	/**
	 * List of loaded resources.
	 * @var ArrayList
	 * @see ResourceLoader::storeFiles()
	 */
	protected $loadedResources		= null;

	/**
	 * List of cached resources.
	 * @var ArrayList
	 * @see ResourceLoader::storeFiles()
	 */
	protected $cachedResources		= null;

	/**
	 * Engine used to store the resulting resource files. Can be "files" or
	 * "session". Default is "files".
	 * @var string
	 * @see ResourceLoader::setStorageEngine()
	 * @see ResourceLoader::getStorageEngine()
	 */
	protected $storageEngine		= null;

	/**
	 * Creates a new class instance.
	 */
	public function __construct()
	{
		$this->resourcesToLoad = new ArrayList();
		$this->loadedResources = new ArrayList();
		$this->cachedResources = new ArrayList();
		$this->storageEngine = self::ENGINE_FILES;
	}

	/**
	 * Sets the engine used to store resource files.
	 * @param string $engine Engine used to store resource files.
	 * @see ResourceLoader::$storageEngine
	 * @see ResourceLoader::getStorageEngine()
	 */
	public function setStorageEngine($engine)
	{
		$this->storageEngine = $engine;

		if($engine == self::ENGINE_SESSION)
		{
			if(!Session::isStarted())
			{
				Session::getActive()->setCacheLimiter('none');
				Session::getActive()->start();
			}
		}
	}

	/**
	 * Returns the engine used to store resource files.
	 * @return string
	 * @see ResourceLoader::$storageEngine
	 * @see ResourceLoader::setStorageEngine()
	 */
	public function getStorageEngine()
	{
		return $this->storageEngine;
	}

	/**
	 * Adds a resource to be loaded.
	 * @param ResourceFile $resource A ResourceFile object representing a file.
	 * type.
	 */
	public function addResource(ResourceFile $resource)
	{
		$this->resourcesToLoad->add($resource);
	}

	/**
	 * Loads all resources and returns an ArrayList with the results.
	 * @return ArrayList
	 * @todo Implement loading of merged resource files.
	 */
	public function getStoredFiles()
	{
		$resourcesName = new ArrayList();
		$resourcesLoaded = new ArrayList();

		if(LocalConfiguration::get('performance.minify.enable') && !Load::isLoaded('Minify'))
			Load::package('Minify');

		if(LocalConfiguration::get('performance.compress.enable') && !Load::isLoaded('Compress'))
			Load::package('Compress');

		foreach($this->resourcesToLoad as $resource)
		{
			if(!$this->isResourceCached($resource))
				$this->loadResourceContent($resource);
			else
				$this->loadCachedResource($resource);
		}

		// save resources to application cache
		if(!$this->loadedResources->isEmpty())
		{
			$mergeUID = uniqid(rand());
			$mergeContents = '';
			$mergeNames = new ArrayList();
			$controllerPath = $this->getControllerPath();

			foreach($this->loadedResources as $resource)
			{
				$type = $resource->getType();

				if($resource->getMerge())
				{
					$name = "{$type}/{$mergeUID}";
					$mergeNames->add($resource->getName());
					$mergeContents .= $resource->getContent();
				}
				else
				{
					$uid = uniqid(rand());
					$name = "{$type}/{$uid}";
					$this->storeFile($uid, "{$resource->getName()}.{$type}", $resource->getContent(), $resource->getCache());
				}

				if(!$resourcesLoaded->offsetExists($type))
					$resourcesLoaded->addKey($type, new ArrayList());

				$resourcesLoaded[$type]->add($controllerPath . "/load/{$name}");
			}

			if(!empty($mergeContents))
			{
				$this->storeFile($mergeUID, $mergeNames->join('_'), $mergeContents, true);
				//File::create($cacheDir . $mergeUID)->write($mergeContents);
				//File::create($cacheDir . $mergeNames->join('_'))->write($mergeUID);
			}
		}

		// recover cached resources
		if(!$this->cachedResources->isEmpty())
			$resourcesLoaded->merge($this->cachedResources);

		return $resourcesLoaded;
	}

	/**
	 * Gets the content of a resource file into the <code>ResourceFile</code>
	 * object.
	 * @param ResourceFile $resource ResourceFile instance.
	 */
	protected function loadResourceContent(ResourceFile $resource)
	{
		$saveResource = false;

		// resource type
		$resourceType = $resource->getType();

		// get file content
		$resourceContent = File::open(Application::getCurrent()->getPath('resources') . $resourceType . Enviroment::DIR_SEP . $resource->getFilePath())->read();

		// minify content (CSS and JS)
		if(LocalConfiguration::get('performance.minify.enable') ? $resource->getMinify() : false)
		{
			switch($resourceType)
			{
				case 'css':
					$resourceContent = CssMin::minify($resourceContent);
					$saveResource = true;
					break;
				case 'js':
					$resourceContent = JsMin::minify($resourceContent);
					$saveResource = true;
					break;
				default:
					break;
			}
		}

		// compress content
		if(LocalConfiguration::get('performance.compress.enable') ? $resource->getCompress() : false)
		{
			$resourceContent = Compressor::encode($resourceContent); // compress using the application configuration
			$saveResource = true;
		}

		$resource->setContent($resourceContent);

		if((LocalConfiguration::get('performance.mergeFiles.enable') && $resource->getMerge()) || $saveResource)
			$this->loadedResources->add($resource);
	}

	/**
	 * Stores the content of a file using the predefined storage engine.
	 * @param string $uid Resource UID.
	 * @param string $name Original name of resource file.
	 * @param string $content Resource content.
	 * @param bool $cache Specifies whether the resource should be cached for
	 * HTTP requests. If is true, HTTP cache will also be used, besides the
	 * application cache.
	 */
	protected function storeFile($uid, $name, $content, $cache)
	{
		switch($this->storageEngine)
		{
			case self::ENGINE_FILES:
				$cacheDir = Application::getCurrent()->getPath('cache');
				File::create($cacheDir . $uid)->write($content);
				File::create($cacheDir . $name)->write($uid);

				if($cache)
					File::create($cacheDir . $uid . '.cache');
				break;
			case self::ENGINE_SESSION:
				Session::set($uid, $content);
				Session::set($name, $uid);

				if($cache)
					Session::set("{$uid}_cache", '');
				break;
			default:
				throw new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.invalidStorageEngine', $this->storageEngine), self::INVALID_STORAGE_ENGINE);
				break;
		}
	}

	/**
	 * Checks if the specified resource is already cached in the application.
	 * @param ResourceFile $resource Resource to check.
	 * @return bool
	 */
	protected function isResourceCached(ResourceFile $resource)
	{
		$bool = false;

		switch($this->storageEngine)
		{
			case self::ENGINE_FILES:
				$cacheDir = Application::getCurrent()->getPath('cache');
				$bool = File::exists($cacheDir . "{$resource->getName()}.{$resource->getType()}");
				break;
			case self::ENGINE_SESSION:
				$bool = Session::exists($resource->getName());
				break;
			default:
				throw new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.invalidStorageEngine', $this->storageEngine), self::INVALID_STORAGE_ENGINE);
				break;
		}

		return $bool;
	}

	/**
	 * Recovers the UID of a cached resource and add it to the array of cached
	 * files.
	 * @param ResourceFile $resource A ResourceFile object.
	 * @todo Get merged cached resources.
	 */
	protected function loadCachedResource(ResourceFile $resource)
	{
		$type = $resource->getType();
		$name = "{$resource->getName()}.{$resource->getType()}";

		if($resource->getMerge())
		{
			/*$name = "{$type}/{$mergeUID}";
			$mergeNames->add($resource->getName());
			$mergeContents .= $resource->getContent();*/
		}
		else
		{
			switch($this->storageEngine)
			{
				case self::ENGINE_FILES:
					$cacheDir = Application::getCurrent()->getPath('cache');
					$uid = trim(File::open($cacheDir . $name)->read());
					break;
				case self::ENGINE_SESSION:
					$uid = Session::get($name);
					break;
				default:
					throw new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.invalidStorageEngine', $this->storageEngine), self::INVALID_STORAGE_ENGINE);
					break;
			}

			$name = "{$type}/{$uid}";
		}

		if(!$this->cachedResources->offsetExists($type))
			$this->cachedResources->addKey($type, new ArrayList());

		$this->cachedResources[$type]->add($this->getControllerPath() . "/load/{$name}");
	}

	/**
	 * Retuns an ArrayList with the resources to load. All resources of the same
	 * type are merged in one file.
	 * @return ArrayList
	 */
	public function getMergedResources()
	{
		$resourcesLoaded = new ArrayList();
		$mergeTypes = new ArrayList();
		$mergeNames = new ArrayList();
		$mergeModifiedTimes = new ArrayList();
		$mergeFiles = new ArrayList();
		$noMergeFiles = new ArrayList();
		$resourcesDir = Application::getCurrent()->getPath('resources');
		$appName = Application::getCurrent()->getName();
		$baseUrl = Enviroment::getPath('baseUrl');
		$prefix = GlobalConfiguration::get('urlRewrite.useServerMod.enable') ? 'resource' : 'resources.php';
		$minify = LocalConfiguration::get('performance.minify.enable');

		if(LocalConfiguration::get('performance.minify.enable') && !Load::isLoaded('Minify'))
			Load::package('Minify');

		if(LocalConfiguration::get('performance.compress.enable') && !Load::isLoaded('Compress'))
			Load::package('Compress');

		foreach($this->resourcesToLoad as $resource)
		{
			if(!$resource->isHttp() && $resource->getMerge())
			{
				$type = Text::toLower($resource->getType());

				if(!$mergeTypes->find($type))
				{
					$mergeTypes->add($type);
					$mergeNames->addKey($type, new ArrayList());
					$mergeModifiedTimes->addKey($type, new ArrayList());
					$mergeFiles->addKey($type, new ArrayList());
				}

				$mergeNames[$type]->add($resource->getName());
				$filePath = $resourcesDir . Text::split("{$prefix}/{$appName}/", $resource->getFilePath(), 2)->getLast();

				if(File::exists($filePath))
				{
					$tmp = File::open($filePath);
					$mergeModifiedTimes[$type]->add($tmp->getModifiedTime());
					$tmp->close();
					$mergeFiles[$type]->add($filePath);
				}
				else
				{
					throw new ResourceError(Language::getInstance('Resource')->getSentence('resource.error.invalidResourceFile', $filePath), self::INVALID_RESOURCE_FILE);
				}
			}
			else
			{
				$noMergeFiles->add($resource);
			}
		}

		foreach($mergeTypes as $type)
		{
			$newModifiedTime = $mergeModifiedTimes[$type]->join('-');
			$mergeFileUID = md5($mergeNames[$type]->join('-'));
			$baseDir = "{$resourcesDir}{$type}/merged";
			$newMergeFileName = "{$mergeFileUID}-" . md5($newModifiedTime) . ".{$type}";
			$newMergeFilePath = "{$baseDir}/{$newMergeFileName}";
			$doUpdate = true;

			if(Cache::exists($mergeFileUID))
				$doUpdate = ($newModifiedTime != Cache::get($mergeFileUID)) || !File::exists($newMergeFilePath);

			if($doUpdate)
			{
				$oldMergeFilePath = "{$baseDir}/{$mergeFileUID}-" . md5(Cache::get($mergeFileUID)) . ".{$type}";

				if(File::exists($oldMergeFilePath))
					File::remove($oldMergeFilePath);

				Cache::set($mergeFileUID, $newModifiedTime);
				$mergedContent = '';

				foreach($mergeFiles[$type] as $resourceFilePath)
				{
					$resourceFile = File::open($resourceFilePath);
					$resourceContent = $resourceFile->read();

					if($type == 'css')
					{
						$baseResourceDir = $resourceFile->getDirPath();

						if(preg_match_all('#(url\(["\']?)(.+?)((?:\?|\#).+?)?([\'"]?\))#', $resourceContent, $matches))
						{
							foreach($matches[2] as $i => $url)
							{
								$normalizedPath = realpath($baseResourceDir . $url);

								if($normalizedPath)
								{
									$suffix = $matches[3][$i];
									$fixedUrl = "{$baseUrl}{$prefix}/{$appName}/" . Text::replace('\\', '/', Text::split('/(\\\|\/)resource(\\\|\/)/', $normalizedPath, 2)->getLast()) . $suffix;
									$resourceContent = Text::replace($matches[0][$i], $matches[1][$i] . $fixedUrl . $matches[4][$i], $resourceContent);
								}
							}
						}

						if(preg_match_all('#@(?:import|charset).+?;#', $resourceContent, $matches))
						{
							$resourceContent = Text::remove('#@(?:import|charset).+?;#', $resourceContent);
							$mergedContent = implode("\n", $matches[0]) . "\n" . $mergedContent;
						}
					}

					if($minify)
					{
						if(!Text::find('.min', $resourceFilePath))
						{
							switch($type)
							{
								case 'css':
									$resourceContent = CssMin::minify($resourceContent);
									break;
								case 'js':
									$resourceContent = JsMin::minify($resourceContent);
									break;
								default:
									break;
							}
						}

						$resourceContent = Text::remove('#^\s*/\*(?:.*?\n*)*?\*/\s*#', $resourceContent);
						$resourceContent = Text::remove('#^/{2,}.*#', $resourceContent);
					}

					$mergedContent .= $resourceContent;
					$resourceFile->close();
				}

				if(!Dir::exists($baseDir))
					Dir::create($baseDir);
				elseif(File::exists($newMergeFilePath))
					File::remove($newMergeFilePath);

				$mergeFile = File::create($newMergeFilePath);
				$mergeFile->write($mergedContent);
				$mergeFile->close();
			}

			$mergeResource = new ResourceFile("{$baseUrl}{$prefix}/{$appName}/{$type}/merged/{$newMergeFileName}", $type);
			$resourcesLoaded->add($mergeResource);
		}

		$resourcesLoaded->merge($noMergeFiles);
		return $resourcesLoaded;
	}

	/**
	 * Retuns an ArrayList with the resources to load.
	 * @return ArrayList
	 */
	public function getResources()
	{
		return $this->resourcesToLoad;
	}

	/**
	 * Returns the path (URL) of the controller that will handle resources
	 * requests.
	 * @return string
	 */
	protected function getControllerPath()
	{
		$controllerPath = LocalConfiguration::get('resources.controller');

		if(Text::substring($controllerPath, -1) == '/')
			$controllerPath = Text::substring($controllerPath, 0, -2);

		return $controllerPath;
	}
}
?>