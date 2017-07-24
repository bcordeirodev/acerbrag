<?php
/**
 * This file sets all default paths and methos required to work with file
 * loading.
 * @version 1.1.1
 * @package Core
 */

/**
 * Class used to load all classes, packages and scripts in the framework.
 *
 * All includes are made with the require_once function.
 * @author Diego Andrade
 * @package Core
 * @uses Core.Enviroment
 * @since Optimuz 0.1
 * @version 1.2
 * @final
 * @static
 */
final class Load
{
	/**
	 * The map of files was not found.
	 */
	const MISSING_MAP_FILES				= 3100;

	/**
	 * The file is not mapped.
	 */
	const FILE_NOT_MAPPED				= 3101;

	/**
	 * Array of loaded files.
	 * @var array
	 * @static
	 */
	private static $loadedFiles			= array();

	/**
	 * Memory used by loaded files.
	 * @var int
	 * @static
	 */
	private static $totalUsedMemory		= 0;

	/**
	 * Wheter to use the autoload mode or not. Default is false.
	 * @var bool
	 */
	private static $autoLoad			= false;

	/**
	 * Array of mapped files.
	 * @var array
	 * @static
	 */
	private static $filesMap			= array();

	/**
	 * Path of the framework's root directory.
	 * @var string
	 * @static
	 */
	private static $frameworkRootPath	= null;

	/**
	 * Autoloads a class.
	 * @param string $className
	 * @return bool Returns true on success or false on errors.
	 * @todo Fix the cases when class_exists() and interface_exists() try to autoload files that don't need to be loaded
	 */
	public static function autoload($className)
	{
		if(self::$autoLoad)
		{
			if(($map = &self::getMap($className)))
			{
				// only iterates for not loaded maps
				if(!isset($map['loaded']))
				{
					$map['loaded'] = true;

					// load single file
					if(isset($map['file']))
					{
						try{
							$dependecies = $map['uses'];
							$parents = $map['extends'];

							if(is_array($parents))
							{
								foreach($parents as $parent)
									self::autoload($parent);
							}

							self::loadFile(self::$frameworkRootPath . $map['file']);

							if(!empty($dependecies))
							{
								foreach($dependecies as $fileName)
									self::autoload($fileName);
							}
						}
						catch(Exception $ex){
							Error::handleException($ex);
						}
					}
					else // load entire package
					{
						foreach($map['files'] as $fileName)
							self::autoload($fileName);
					}
				}
			}
			elseif(strpos($className, '\\') !== false)
			{
				// loads classes from their namespaces. For this to work, the class
				// must to be located in the scripts directory of the current
				// application or of the shared application. The directory structure
				// must reflect the namespace structure.
				$pathParts = explode('\\', $className);
				$fileName = array_pop($pathParts);
				$dirPath = Application::getCurrent()->getPath('scripts') . implode(DIRECTORY_SEPARATOR, $pathParts) . DIRECTORY_SEPARATOR;
				self::loadRecursively($fileName, $dirPath, true);
			}
			else
			{
				// check for core classes, interfaces and functions of the PHP,
				// like the Exception class. These elements cannot be mapped because
				// they already exist at any time.
				if(!class_exists($className, false) && !interface_exists($className, false) && !function_exists($className))
				{
					// checks if Propel is enabled and if it can load the class. If
					// it also fails so we throw an Exception and display an error page
					if(class_exists('Propel', false) ? !Propel::autoload($className) : true)
					{
						// if we throw an exception here, this will be uncatchable. So
						// instead of this, we pass the exception directly to the
						// default exception handler.
						Error::handleException(new Exception("The file {$className} is not mapped and cannot be autoloaded", self::FILE_NOT_MAPPED));
					}
				}
			}
		}
	}

	/**
	 * Enables the autoload mechanism.
	 * @return bool Returns true if enabled with success, or false otherwise.
	 */
	public static function enableAutoLoad()
	{
		$success = false;
		$filesMapPath = Enviroment::getPath('config') . 'filesMap.php';

		if(is_file($filesMapPath))
		{
			if(empty(self::$filesMap))
			{
				self::$frameworkRootPath = Enviroment::getPath('framework');
				self::$filesMap = self::loadFile($filesMapPath, true);
			}

			if(function_exists('spl_autoload_register'))
			{
				$success = spl_autoload_register(array('Load', 'autoLoad'));
			}
			else
			{
				self::loadFile(Enviroment::getPath('packages') . 'Core/autoload.php');
				$success = true;
			}
		}
		else
		{
			// The class Error was not loaded here yet,
			// so we use the PHP Exception class
			throw new Exception('The file map was not found', self::MISSING_MAP_FILES);
		}

		return $success;
	}

	/**
	 * Disables the autoload mechanism.
	 * @return bool Returns true if disabled with success, or false otherwise.
	 */
	public static function disableAutoLoad()
	{
		$success = false;

		if(function_exists('spl_autoload_unregister'))
			$success = spl_autoload_unregister(array('Load', 'autoLoad'));

		return $success;
	}

	/**
	 * Sets if autoloading will be used.
	 *
	 * Only take effect in the bootstrap file, before the configuration
	 * initialization.
	 * @param bool $autoLoad
	 */
	public static function setAutoLoad($autoLoad)
	{
		self::$autoLoad = $autoLoad;
	}

	/**
	 * Returns a bool which defines if the autoloading of classes will be used.
	 * @return bool
	 */
	public static function getAutoLoad()
	{
		return self::$autoLoad;
	}

	/**
	 * Retuns a map for a given file or directory.
	 *
	 * The map is an array and its content depends on the type of the content
	 * that you want to retrieve. If you want a file, the map have two keys:
	 * 'file' (the full path of the file) and 'uses' (an array with the names
	 * of the files that the target file depends on). If you want a package
	 * (directory), the map will only contain the names of all files inside it.
	 *
	 * If the map does not exist a null value will be returned.
	 * @param string $name Name of file or directory (package).
	 * @return array
	 */
	public static function &getMap($name)
	{
		$map = null;

		// main library
		if(isset(self::$filesMap['lib']['files'][$name]))
		{
			$map = &self::$filesMap['lib']['files'][$name];
		}
		// main library packages
		elseif(isset(self::$filesMap['lib']['packages'][$name]))
		{
			$map = &self::$filesMap['lib']['packages'][$name];
		}
		else
		{
			if(class_exists('Application', false) && Application::getCurrent())
			{
				// current application
				$appName = Application::getCurrent()->getName();

				if(isset(self::$filesMap[$appName]) && isset(self::$filesMap[$appName]['files'][$name]))
					$map = &self::$filesMap[$appName]['files'][$name];

				// current application's packages
				elseif(isset(self::$filesMap[$appName]['packages'][$name]))
					$map = &self::$filesMap[$appName]['packages'][$name];
			}

			if(!$map)
			{
				// shared application
				if(isset(self::$filesMap['shared']['files'][$name]))
					$map = &self::$filesMap['shared']['files'][$name];

				// shared application's packages
				elseif(isset(self::$filesMap['shared']['packages'][$name]))
					$map = &self::$filesMap['shared']['packages'][$name];
			}
		}

		return $map;
	}

	/**
	 * Loads the package with $name.
	 *
	 * The name can point to a single file or an entire package. If a package is
	 * specified, all files are loaded.
	 *
	 * Some examples:
	 *
	 * <code>
	 * <?php
	 * // Loading sigle package file.
	 * // In this case, SiteNavigation is a file that is a package
	 * Load::package('SiteNavigation');
	 *
	 * // Loading entire package.
	 * // In this case, Http is a package with some files and all files will be
	 * loaded.
	 * Load::package('Http');
	 *
	 * // Loading one file of package.
	 * // In this case, Core is the package and Text is the class of this
	 * // package that will be loaded.
	 * Load::package('Core.Text');
	 * ?>
	 * </code>
	 *
	 * The packages are loaded from /Optimuz/lib. You can get this path by
	 * calling Enviroment::getPath('packages').
	 * @param string $name Module name.
	 * @static
	 * @see Enviroment::getPath()
	 */
	public static function package($name)
	{
		self::loadRecursively($name, Enviroment::getPath('packages'));
	}

	/**
	 * Loads a controller specified by $name. The controller is loaded from the
	 * current application.
	 *
	 * If the controller to load is named 'HomeController.php', you must call
	 * only 'HomeController' as name. Example:
	 *
	 * <code>
	 * <?php
	 * // loading controller Home from the application 'default'
	 * // /Optimuz/apps/default/layers/control/page/HomeController.php
	 * Load::controller('HomeController');
	 * ?>
	 * </code>
	 *
	 * If $isPageController is true, the controller will be loaded from
	 * /Optimuz/apps/APPLICATION_NAME/layers/control/page, otherwise it will
	 * be loaded from /Optimuz/apps/APPLICATION_NAME/layers/control. Only page
	 * controllers can to be loaded from URL.
	 *
	 * If the controller doesn't exist an exception will be thrown.
	 * @param string $name Controller name.
	 * @param bool $isPageController (optimal) Defines whether the controller is
	 * a page controller. If so, it can be called from URL and will be loaded
	 * from /Optimuz/apps/APPLICATION_NAME/layers/control/page. Otherwise it
	 * cannot be called from URL and will be loaded from
	 * /Optimuz/apps/APPLICATION_NAME/layers/control. Default is true.
	 *
	 * Note that APPLICATION_NAME is the name of the current application.
	 * @static
	 */
	public static function controller($name, $isPageController = true)
	{
		$name = str_replace('.', Enviroment::DIR_SEP, $name);
		$path = Application::getCurrent()->getPath('control') . ($isPageController ? 'page' . Enviroment::DIR_SEP : '') . $name . '.php';

		if(is_file($path))
		{
			self::loadFile($path);
		}
		else
		{
			$path = Enviroment::getSharedApplication()->getPath('control') . ($isPageController ? 'page' . Enviroment::DIR_SEP : '') . $name . '.php';

			if(is_file($path))
				self::loadFile($path);
			else
				throw new Exception("The controller '{$name}' does not exist", File::NOT_EXISTS);
		}
	}

	/**
	 * Loads a view class specified by $name. The view is loaded from the
	 * current application.
	 *
	 * You must to specify only the view name, without the file extension.
	 * Example:
	 *
	 * <code>
	 * <?php
	 * // loading the view class Costumer from the application 'default'
	 * // /Optimuz/apps/default/layers/view/CostumerView.php
	 * Load::view('Costumer');
	 * ?>
	 * </code>
	 *
	 * If the view name is the same as the controller, the controller will call
	 * this method automaticaly to load the view.
	 *
	 * The view page is NOT loaded, only the view class.
	 * @param string $name View name.
	 * @return bool If success returns true, but on errors or if the view is not
	 * found returns false.
	 * @static
	 */
	public static function view($name)
	{
		$success = false;
		$path = Application::getCurrent()->getPath('view');
		$realName = str_replace('.', Enviroment::DIR_SEP, $name);
		$viewFile = $path . $realName . 'View.php';

		if(is_file($viewFile))
		{
			self::loadFile($viewFile);
			$success = true;
		}
		else
		{
			$path = Enviroment::getSharedApplication()->getPath('view');
			$viewFile = $path . $realName . 'View.php';

			if(is_file($viewFile))
			{
				self::loadFile($viewFile);
				$success = true;
			}
		}

		return $success;
	}

	/**
	 * Loads a model specified by $name. The model is loaded from the current
	 * application.
	 *
	 * You must to specify only the model name, without the file extension.
	 * Example:
	 *
	 * <code>
	 * <?php
	 * // loading the model Costumer from the application 'default'
	 * // /Optimuz/layers/model/Costumer.php
	 * Load::package('Costumer');
	 * ?>
	 * </code>
	 * @param string $name Model name.
	 * @static
	 */
	public static function model($name)
	{
		$appPath = Application::getCurrent()->getPath('model');
		$sharedPath = Enviroment::getSharedApplication()->getPath('model');
		$realName = str_replace('.', Enviroment::DIR_SEP, $name);

		// main file
		$voFile = "{$realName}.php";

		// Propel files
		$peerFile = "{$realName}Peer.php";
		$queryFile = "{$realName}Query.php";

		// other files
		$daoFile = "{$realName}DAO.php";

		if(is_file($appPath . $voFile))
			self::loadFile($appPath . $voFile);
		elseif(is_file($sharedPath . $voFile))
			self::loadFile($sharedPath . $voFile);

		if(is_file($appPath . $peerFile))
			self::loadFile($appPath . $peerFile);
		elseif(is_file($sharedPath . $peerFile))
			self::loadFile($sharedPath . $peerFile);

		if(is_file($appPath . $queryFile))
			self::loadFile($appPath . $queryFile);
		elseif(is_file($sharedPath . $queryFile))
			self::loadFile($sharedPath . $queryFile);

		if(is_file($appPath . $daoFile))
			self::loadFile($appPath . $daoFile);
		elseif(is_file($sharedPath . $daoFile))
			self::loadFile($sharedPath . $daoFile);
	}

	/**
	 * Loads the component with $name. The component is loaded from the current
	 * application.
	 *
	 * The name can point to a single file or an entire package. If a package is
	 * specified, all files are loaded.
	 *
	 * Same examples from Load::package() applies to this method.
	 *
	 * The components are loaded from /Optimuz/apps/APPLICATION_NAME/components.
	 *
	 * Note that APPLICATION_NAME is the name of the current application.
	 * @param string $name Component name.
	 * @static
	 * @see Load::package()
	 */
	public static function component($name)
	{
		self::loadRecursively($name, Application::getCurrent()->getPath('components'), true);
	}

	/**
	 * Loads the script with $name. The script is loaded from the current
	 * application.
	 *
	 * The name can point to a single file or an entire package. If a package is
	 * specified, all files are loaded.
	 *
	 * Same examples from Load::package() applies to this method.
	 *
	 * The scripts are loaded from /Optimuz/apps/APPLICATION_NAME/scripts.
	 *
	 * Note that APPLICATION_NAME is the name of the current application.
	 * @param string $name Component name.
	 * @static
	 * @see Load::package()
	 * @see Enviroment::getPath()
	 */
	public static function script($name)
	{
		self::loadRecursively($name, Application::getCurrent()->getPath('scripts'), true);
	}

	/**
	 * Loads a file from $path.
	 * @param string $path File path.
	 * @static
	 */
	public static function file($path)
	{
		if(is_file($path))
			self::loadFile($path);
	}

	/**
	 * Checks whether a class, interface or function with $name is loaded.
	 * @param string $name Class or function name.
	 * @return bool
	 */
	public static function isLoaded($name)
	{
		if(strpos($name, '.') !== false)
			$name = end((explode('.', $name)));

		return class_exists($name, false) || interface_exists($name, false) || function_exists($name);
	}

	/**
	 * Checks if the specified controller is a page controller, i.e., if this
	 * controller can be called from URL.
	 *
	 * For a controller to be accessable, it must to be placed in the directory
	 * /Optimuz/apps/APPLICATION_NAME/layers/control/page.
	 *
	 * Note that APPLICATION_NAME is the name of the current application.
	 * @param string $name Controller name.
	 * @return bool
	 */
	public static function isPageController($name)
	{
		$appDir = Application::getCurrent()->getPath('control') . 'page' . Enviroment::DIR_SEP;
		$sharedDir = Enviroment::getSharedApplication()->getPath('control') . 'page' . Enviroment::DIR_SEP;
		$realPath = str_replace('.', Enviroment::DIR_SEP, $name);
		return is_file("{$appDir}{$realPath}.php") || is_file("{$sharedDir}{$realPath}.php");
	}

	/**
	 * Load files recursively.
	 * @param string $name Class or package name.
	 * @param string $dirPath Root folder.
	 * @param bool $trySharedApplication If is true and the file is not found
	 * in $dirPath, the method will also look in the shared application. Default
	 * is false.
	 * @static
	 * @ignore
	 */
	private static function loadRecursively($name, $dirPath, $trySharedApplication = false)
	{
		$sep = DIRECTORY_SEPARATOR; // class Enviroment may not be loaded yet
		$name = str_replace('.', $sep, $name);
		$path = $dirPath . $name;

		if(is_dir($path))
		{
			if(($dir = @opendir($path)))
			{
				$files = array();
				$dirs = array();
				$path .= $sep;

				while(($content = readdir($dir)) !== false)
				{
					if(($content != '.') && ($content != '..') && ($content{0} != '.'))
					{
						if(is_file($path . $content))
							$files[] = $path . $content;
						elseif(is_dir($path . $content . $sep))
							$dirs[] = $name . $sep . $content;
					}
				}

				// sort arrays
				sort($files);
				sort($dirs);

				// directories
				foreach($dirs as $dir)
					self::loadRecursively($dir, $dirPath);

				// files
				foreach($files as $file)
					self::loadFile($file);
			}
		}
		else
		{
			$path .= '.php';

			if(is_file($path))
			{
				self::loadFile($path);
				self::$loadedFiles[] = $path;
			}
			else
			{
				if($trySharedApplication)
				{
					$dirName = str_replace(Application::getCurrent()->getPath('scripts'), '', $dirPath);
					self::loadRecursively($name, Enviroment::getSharedApplication()->getPath('scripts') . $dirName, $trySharedApplication);
				}
			}
		}
	}

	/**
	 * Returns the amount of memory used by the files loaded with this class.
	 * @param bool $format (optimal) If true than the resulting number will be
	 * formatted to be represented in MB, otherwise the number will be returned
	 * in bytes. Default is true.
	 * @return int|string
	 */
	public static function getUsedMemory($format = true)
	{
		return $format ? number_format((self::$totalUsedMemory / 1024 / 1024), 4, ',', '.') . 'MB' : self::$totalUsedMemory;
	}

	/**
	 * Returns an array with all files loaded with this class.
	 * @return array
	 */
	public static function getLoadedFiles()
	{
		return self::$loadedFiles;
	}

	/**
	 * Loads a file and stores information about memory usage.
	 * @param string $path File path.
	 * @param bool $return (optimal) If is true, the file content will be
	 * returned. Default is false.
	 */
	private static function loadFile($filePath, $return = false)
	{
		$mem1 = Enviroment::getUsedMemory(false);

		if($return)
			$content = require_once $filePath;
		else
			require_once $filePath;

		$mem2 = Enviroment::getUsedMemory(false);
		$memUsed = $mem2 - $mem1;
		self::$totalUsedMemory += $memUsed;
		self::$loadedFiles[] = array(
			'file' => $filePath,
			'memory' => $memUsed
		);

		if($return)
			return $content;
	}
}
?>