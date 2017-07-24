<?php
/**
 * This is the local setup file. This file is called after the global setup file
 * and sets the local enviroment.
 *
 * This file MUST contain only code of the Optimuz Framework. If you want to add
 * your own code to the initialization of each request, use the custom
 * bootstrap file, located at the same folder of this file.
 *
 * You are advised to not change this file, only if is realy needed. Any custom
 * code MUST be placed at the custom bootstrap file. Like this, we keep the
 * initialization organized.
 *
 * @package Default
 * @uses Core
 * @uses Router
 * @uses Lang
 * @uses Cache.Cache
 * @author Diego Andrade
 * @version 0.4
 * @since Optimuz 0.1
 */

try{
	/** sets the application in the Enviroment class */
	Application::setCurrent($application);

	/** load local configuration */
	$confName = "LocalConfiguration_{$application}";
	$cache = new ConfigurationCache($confName, ConfigurationCache::TYPE_LOCAL);

	if(!ConfigurationCache::hasCache($confName))
	{
		LocalConfiguration::load(LocalConfiguration::XML_CONFIG);
		$settings = &LocalConfiguration::getSettings()->toArray();
		$cache->cache($settings);
	}
	else
	{
		$cache->restore();
	}

	unset($cache, $confName);
	
	/** updates the current application's settings */
	Application::getCurrent()->update();

	/** overwrite global language settings */
	if(LocalConfiguration::get('page.language'))
	{
		if(!Language::hasCache('main.lang'))
			Language::load(LocalConfiguration::get('page.language'));
	}

	/** compressor */
	Compressor::setMethod(LocalConfiguration::get('performance.compress.method'));
	Compressor::setLevel(LocalConfiguration::get('performance.compress.level'));

	/** include Propel script */
	if(LocalConfiguration::get('orm.propel.enable'))
	{
		require_once Enviroment::getPath('orm') . 'Propel/runtime/lib/Propel.php';
		$propelConfPath = Application::getCurrent()->getPath('config') . 'orm/Propel/build/conf/' . Application::getCurrent()->getName() . '-conf.php';

		if(is_file($propelConfPath))
			Propel::init($propelConfPath);
	}

	/** session */
	if(LocalConfiguration::hasValue('session.savePath'))
		Application::getCurrent()->setPath('session', LocalConfiguration::get('session.savePath'));

	if(!Session::persist() ? LocalConfiguration::get('session.autoStart.enable') : false)
		Session::getActive()->start();

	if(LocalConfiguration::get('htmlElements.session.autoLoadSavedState.enable') && Session::exists('HtmlElements'))
	{
		$elements = Session::get('HtmlElements');
		$url = CurrentHttpRequest::getInstance()->getUrl();

		if(isset($elements[$url]))
		{
			foreach($elements[$url] as $elementId => $data)
				HtmlElement::recover($elementId);
		}
	}

	/** set the default charset */
	$defaultCharset = LocalConfiguration::get('page.charset');
	@ini_set('default_charset', $defaultCharset);

	if(function_exists('mb_internal_encoding'))
		mb_internal_encoding($defaultCharset);

	/** call custom bootstrap file */
	require_once 'custom.php';
}
catch(Exception $err){
	if(Load::isLoaded('Report'))
	{
		Report::sendError($err);
	}
	else
	{
		$msg = Load::isLoaded('Language') ? Language::getCurrent()->getSentence('error.bootstrap') : 'Error while setting local settings';
		echo "{$msg} <br />{$err->getMessage()}";
	}
}
?>