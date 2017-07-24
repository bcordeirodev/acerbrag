<?php
/**
 * This is the main setup file. Every request calls this file to setup the
 * enviroment, loading all default packages and classes.
 *
 * This file MUST contain only code of the Optimuz Framework. If you want to add
 * your own code to the initialization of each request, use the custom
 * bootstrap file, located at the same folder of the local bootstrap file.
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
 * @version 0.3.1
 * @since Optimuz 0.1
 */

try
{
	/** initialize the paths */
	Enviroment::initializePathsConfiguration();

	/** add application paths to PHP include path */
	Enviroment::addPaths();

	/** set the autoload mode */
	Load::setAutoLoad(true);

	if(Load::getAutoLoad())
	{
		/** autoload is on */
		Load::enableAutoLoad();
	}
	else
	{
		/** load basic packages */
		Load::package('Error');
		Load::package('Collection');
		Load::package('Strings');
		Load::package('Storage');
		Load::package('Core');
		Load::package('Event');
		Load::package('Session');
		Load::package('SystemAccess');
		Load::package('Configuration');
		Load::package('Http');
		Load::package('DateTime');
		Load::package('IO');
		Load::package('Lang');
		//Load::package('Socket');
		Load::package('Email');
		Load::package('Router');
		Load::package('Controller');
		Load::package('Resource');
		Load::package('View');
		Load::package('Validation.InputField');
	}

	/** load global configuration */
	$confName = 'GlocalConfiguration';
	$cache = new ConfigurationCache($confName, ConfigurationCache::TYPE_GLOBAL);

	if(!ConfigurationCache::hasCache($confName))
	{
		GlobalConfiguration::load(GlobalConfiguration::XML_CONFIG);
		$settings = &GlobalConfiguration::getSettings()->toArray();
		$cache->cache($settings);
	}
	else
	{
		$cache->restore();
	}

	unset($cache, $confName);

	/** language settings */
	if(GlobalConfiguration::get('page.language'))
	{
		if(!Language::hasCache('main.lang'))
			Language::load(GlobalConfiguration::get('page.language'));
		else
			Language::getCurrent()->restore();
	}

	/** routes */
	Router::loadRouteMap('default');

	/** timezone identifier */
	if(GlobalConfiguration::get('dateTime.timezone.identifier'))
		date_default_timezone_set(GlobalConfiguration::get('dateTime.timezone.identifier'));

	/** set custom error handling */
	set_error_handler('Error::handleScriptError', E_ALL);
	set_exception_handler('Error::handleException');
	register_shutdown_function('Error::handleFatalError');

	/** register objects to be cached */
//	register_shutdown_function('CacheManager::save');

	/** sets the enviroment as web */
	Enviroment::setWebEnviroment(true);
}
catch(Exception $err)
{
	try{
		Report::sendError($err);

		if(Load::isLoaded('Error'))
			Error::showStaticErrorPage();
	}
	catch(Exception $err){
		$msg = Load::isLoaded('Language') ? Language::getCurrent()->getSentence('error.bootstrap') : 'Error while setting global settings';
		echo "{$msg} <br />{$err->getMessage()}";
	}
}
?>