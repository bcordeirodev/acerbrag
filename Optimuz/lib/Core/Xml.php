<?php
/**
 * This file is used to handle XML documents.
 * @version 0.1
 * @package Core
 */

/**
 * Class used to handle XML documents.
 *
 * This class extends the DOMDocument PHP class and only adds a few methods.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.1
 * @uses Core
 * @uses Lang
 */
class Xml extends DOMDocument
{
	/**
	 * Error on xPath query.
	 */
	const XPATH_ERROR		= 1400;

	/**
	 * Error while trying to load a XML document.
	 */
	const LOAD_ERROR		= 1401;

	/**
	 * A new class instance is created with the DOMDocument::$preserveWhiteSpace
	 * setted to false.
	 */
	public function Xml()
	{
		parent::__construct();
		$this->preserveWhiteSpace = false;
	}
	
	/**
	 * Executes a xPath query and returns the results.
	 * @param string $path xPath expression.
	 * @return DOMNodeList
	 */
	public function get($path)
	{
		//try{
			$xpath = new DOMXPath($this);
			$results = $xpath->query($path);
		/*}
		catch(Exception $err){
			$results = array();
			new Error($err->getMessage(), self::XPATH_ERROR);
		}*/

		return $results;
	}
}
?>