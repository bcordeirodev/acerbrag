<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.2
 * @package Html
 * @subpackage Element
 */

/**
 * This class is extends the DOMDocument class to provide additional methods
 * for creating HTML elements in a easy way. It adds some static methods used
 * to manage the conversation between controllers and views.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 */
class HtmlPersistentDocument
{
	/**
	 * Document ID.
	 * @var string
	 */
	protected $id			= null;

	/**
	 * A HtmlParser object.
	 * @var HtmlParser
	 */
	protected $parser		= null;

	/**
	 * Creates a new isntance of the parser.
	 * @param string $id The ID is used as an indentifier to cache the
	 * parsed document. It must be unique.
	 * @param HtmlParser $parser (optional) A HtmlParser object.
	 *
	 */
	public function __construct($id, HtmlParser $parser = null)
	{
		$this->id = $id;
		$this->parser = $parser;
	}

	/**
	 * Sets the HtmlParser object that will be saved.
	 * @param HtmlParser $parser
	 */
	public function setParser(HtmlParser $parser)
	{
		$this->parser = $parser;
	}

	/**
	 * Gets the HtmlParser object that will be saved. If the object is not set
	 * a null value is returned.
	 * @return HtmlParser
	 */
	public function getParser()
	{
		return $this->parser;
	}

	/**
	 * Saves the the HtmlParser object.
	 */
	public function save()
	{
		$arrayId = get_class();
		$array = Session::exists($arrayId) ? Session::get($arrayId) : array();
		$array[$this->id] = serialize($this->parser);
		Session::set($arrayId, $array);
	}

	/**
	 * Restores a previously saved HtmlParser with the same ID.
	 *
	 * Returns true if the parser is restored, false otherwise.
	 * @return bool
	 */
	public function restore()
	{
		$arrayId = get_class();
		$success = false;

		if(Session::exists($arrayId))
		{
			$array = Session::get($arrayId);

			if(isset($array[$this->id]))
			{
				$this->parser = unserialize($array[$this->id]);
				$success = true;
			}
		}

		return $success;
	}

	/**
	 * Removes the current document from the session.
	 *
	 * Returns true on success or false otherwise.
	 * @return bool
	 */
	public function remove()
	{
		$arrayId = get_class();
		$success = false;

		if(Session::exists($arrayId))
		{
			$array = Session::get($arrayId);
			unset($array[$this->id]);
			Session::set($arrayId, $array);
			$success = true;
		}

		return $success;
	}

	/**
	 * Removes all saved documents.
	 * 
	 * Returns true on success or false otherwise.
	 * @static
	 * @return bool
	 */
	public static function clear()
	{
		$arrayId = get_class();
		$success = false;

		if(Session::exists($arrayId))
		{
			Session::remove($arrayId);
			$success = true;
		}

		return $success;
	}
}
?>