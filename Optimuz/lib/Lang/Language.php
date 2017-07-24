<?php
/**
 * This file defines a way to work with socket connections, encapsulating all
 * needed funcions in one object.
 * @version 0.2
 * @package Socket
 */

/**
 * This class stores the sentences used in the application, and is a convenient
 * way to write multi-language applications.
 *
 * All .lang files are loaded using the UTF-8 encoding, but the sentences can
 * be retrieved with the original encoding. See Language::getSentence() for more
 * detailss.
 * @author Diego Andrade
 * @package Lang
 * @since Optimuz 0.3
 * @version 0.4
 * @uses IO
 * @uses Core
 * @uses Storage.Cache
 * @uses Strings.Text
 */
class Language extends Cacheable
{
	/**
	 * Searchs the language file in all locations.
	 */
	const LOCATION_ALL					= 1;

	/**
	 * Searchs the language file in the current application directory.
	 */
	const LOCATION_APPLICATION			= 2;

	/**
	 * Searchs the language file in the shared application directory.
	 */
	const LOCATION_SHARED_APPLICATION	= 3;

	/**
	 * Searchs the language file in the global directory.
	 */
	const LOCATION_GLOBAL				= 4;

	/**
	 * Array that stores all strings used in the application.
	 * @var array
	 */
	private $sentences					= null;

	/**
	 * Original encoding of the .lang file.
	 * @var string
	 */
	private $originalEncoding			= null;

	/**
	 * Global instance of the class.
	 * @var Language
	 * @static
	 */
	private static $instance				= null;

	/**
	 * Instances loaded by different packages.
	 * @var array
	 * @static
	 */
	private static $instances				= null;

	/**
	 * Initializes the default values of variables.
	 */
	public function __construct()
	{
		$this->name = 'main.lang';
		$this->sentences = array();
		self::$instances = array();
		CacheManager::add($this);
	}
	
	/**
	 * Free memory used by resources.
	 */
	public function __destruct()
	{
		CacheManager::remove($this);
		unset(self::$instances[$this->name]);
	}

	/**
	 * Restores previously cached sentences.
	 */
	public function restore()
	{
		$this->sentences = require $this->getFilePath();
	}

	/**
	 * Returns the global instance of the class.
	 * @static
	 * @return Language
	 */
	public static function getCurrent()
	{
		if(self::$instance == null)
			self::$instance = new self;

		return self::$instance;
	}

	/**
	 * Returns a Language instance loaded with the language file named in $name.
	 * 
	 * This is useful to load specific language files for packages, controllers,
	 * views or any class in the application.
	 * 
	 * The language files must be located at /Optimuz/lang.
	 * @param string $name Name of language file.
	 * @param string $lang (optimal) Language of language file. Default is the
	 * same of the setting page.language.
	 * @param int $location The location to search the language file. Default is
	 * Language::LOCATION_ALL.
	 * @static
	 * @return Language
	 */
	public static function getInstance($name, $lang = null, $location = self::LOCATION_ALL)
	{
		if(is_null($lang))
			$lang = LocalConfiguration::get('page.language');

		$objName = "{$lang}.{$name}";

		if(!isset(self::$instances[$objName]))
		{
			$obj = new self;
			$obj->name = $objName;

			if(!$obj->isCached())
				$obj->loadLang($name, $lang, $location);
			else
				$obj->restore();

			self::$instances[$objName] = $obj;
		}

		return self::$instances[$objName];
	}

	/**
	 * Stores a sentence in the object's array.
	 * @param string $name Name of the sentence.
	 * @param string $sentence The sentence itself.
	 */
	public function setSentence($name, $sentence)
	{
		$this->sentences[$name] = $sentence;
	}

	/**
	 * Returns a sentence previously stored. If the sentence doesn't exist, the
	 * name of the sentence will be returned.
	 * @param string $name The sentence name.
	 * @param string $name,... (optimal) If aditional parameters are specified
	 * and the sentence has wildcards, these wildcards will be replaced by the
	 * optimal parameters. This works just like the PHP sprintf() function. So
	 * you can get sentences with dinamic values.
	 * @return string
	 */
	public function getSentence($name)
	{
		$name = self::getSentenceName($name);

		if(($sentence = isset($this->sentences[$name]) ? $this->sentences[$name] : null))
		{
			if(func_num_args() > 1)
			{
				$args = func_get_args();
				$sentence = call_user_func_array('sprintf', array_merge(array($sentence), array_slice($args, 1)));
			}
		}
		else
		{
			$sentence = $name;
		}

		return $sentence;
	}

	/**
	 * Removes all sentences from the object.
	 */
	public function clear()
	{
		$this->sentences = array();
	}

	/**
	 * Reads and parses the main Properties text file with language sentences
	 * for entire application. This file must be located in /Optimuz/lang/.
	 *
	 * The new sentences are stored in the current Language object.
	 *
	 * This does not removes old sentences from current object.
	 * @param string $lang Language file name.
	 * @param int $location The location to search the language file. Default is
	 * Language::LOCATION_ALL.
	 * @static
	 */
	public static function load($lang, $location = self::LOCATION_ALL)
	{
		$filePath = self::getLangFilePath($lang . Enviroment::DIR_SEP . "main.lang", $location);
		self::loadLangFile($filePath);
	}

	/**
	 * Reads and parses a Properties text file with language sentences for a
	 * specific page.
	 *
	 * The new sentences are stored in the current Language object.
	 *
	 * This does not removes old sentences from current object.
	 * @param string $lang Language file name.
	 * @param int $location The location to search the language file. Default is
	 * Language::LOCATION_ALL.
	 */
	public function loadLang($name, $lang, $location = self::LOCATION_ALL)
	{
		$this->cache($this->sentences, "{$lang}.{$name}");
		$filePath = self::getLangFilePath($lang . Enviroment::DIR_SEP . "{$name}.lang", $location);
		self::loadLangFile($filePath, $this);
	}

	/**
	 * Retruns the complete path for the language file.
	 *
	 * The file is searched in three directories in the following order: lang
	 * directory of current application; lang directory of shared application;
	 * the global lang directory.
	 * @param string $relativePath This path is only of the directory name and
	 * the file name, like "en/Home.lang" or "pt-br/Component.lang".
	 * @param int $location The location to search the language file. Default is
	 * Language::LOCATION_ALL.
	 * @return string
	 */
	private static function getLangFilePath($relativePath, $location = self::LOCATION_ALL)
	{
		$filePath = null;

		switch($location)
		{
			case self::LOCATION_ALL:
				if(Application::getCurrent())
				{
					$filePath = Application::getCurrent()->getPath('lang') . $relativePath;

					if(!File::exists($filePath))
					{
						$filePath = Enviroment::getSharedApplication()->getPath('lang') . $relativePath;

						if(!File::exists($filePath))
							$filePath = Enviroment::getPath('lang') . $relativePath;
					}
				}
				else
				{
					$filePath = Enviroment::getPath('lang') . $relativePath;
				}
				break;
			case self::LOCATION_APPLICATION:
				if(Application::getCurrent())
					$filePath = Application::getCurrent()->getPath('lang') . $relativePath;
				break;
			case self::LOCATION_SHARED_APPLICATION:
				$filePath = Enviroment::getSharedApplication()->getPath('lang') . $relativePath;
				break;
			case self::LOCATION_GLOBAL:
				$filePath = Enviroment::getPath('lang') . $relativePath;
				break;
		}

		return $filePath;
	}

	/**
	 * Loads the specified file into the current Language object.
	 * @param string $filePath Language file path.
	 * @param Language $langObj (optimal) Language object that will be store the
	 * loaded sentences. If it is not specified, the current global Language
	 * object will be used.
	 * @static
	 */
	private static function loadLangFile($filePath, $langObj = null)
	{
		if(File::exists($filePath))
		{
			if(isset($langObj))
			{
				$obj = $langObj;
			}
			else
			{
				$obj = self::getCurrent();
				//$lang = Text::remove('.lang', Text::replace(Enviroment::DIR_SEP, '.', Text::split(Enviroment::DIR_SEP, $filePath)->slice(-2)->join('.')));
				$obj->cache($obj->sentences, 'main.lang');
			}

			$lines = file($filePath);
			$obj->originalEncoding = mb_convert_variables('UTF-8', mb_internal_encoding(), $lines);

			foreach($lines as $line)
			{
				if(!!$line)
				{
					if($line{0} !== '#')
					{
						$parts = explode('=', $line, 2);
						$name = trim($parts[0]);
						$value = isset($parts[1]) ? trim($parts[1]) : '';
						$obj->setSentence($name, $value);
					}
				}
			}
		}
	}

	/**
	 * Checks if the string is a valid name of a sentence.
	 *
	 * Valid names follow the form "${name_of_sentence}" (without quotes). But
	 * note that this method only checks if the name is valid, not if the
	 * sentence with this name exists.
	 *
	 * Returns the name without the "${}" part, or the original string if is not
	 * a valid name.
	 * @param string $name
	 * @return string
	 * @static
	 */
	public static function getSentenceName($name)
	{
		$result = $name;

		if(preg_match('/^\${([^}]+)}$/', $name, $matches))
			$result = $matches[1];

		return $result;
	}
}
?>