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

	/** cache */
	if(!LocalConfiguration::get('performance.cache.enable'))
		Cache::clear();

	/** session */
	if(LocalConfiguration::hasValue('session.savePath'))
		Application::getCurrent()->setPath('session', LocalConfiguration::get('session.savePath'));

	if(!Session::persist() ? LocalConfiguration::get('session.autoStart.enable') : false)
		Session::getActive()->start();

	/** call custom bootstrap file */
	Load::file(Application::getCurrent()->getPath('config') . 'bootstrap' . Enviroment::DIR_SEP . 'custom.php');
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