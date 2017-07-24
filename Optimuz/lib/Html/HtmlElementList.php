<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This class is a replacement for the DOMNodeList class and provide additional
 * methods for iterating throughout the items. It does not extend the
 * DOMNodeList class.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1.1
 */
class HtmlElementList extends ArrayListIteratorAggregate
{
	/**
	 * Array that holds all items.
	 * @var array
	 */
	protected $array			= null;

	/**
	 * Creates a new list with the elements from the collection $items.
	 * @param DOMNodeList|ArrayList|array $items Collection of items.
	 */
	public function __construct($items)
	{
		$this->array = array();

		if(!empty($items))
		{
			foreach($items as $item)
				$this->array[] = $item;
		}

		$this->iterator = new ArrayListIterator($this->array);
	}

	/**
	 * Returns an HtmlElement from the list.
	 * @return HtmlElement
	 */
	public function item($index)
	{
		return $this->array[$index];
	}

	/**
	 * Checks if the list is empty.
	 * @return bool
	 */
	public function isEmpty()
	{
		return $this->count() === 0;
	}

	/**
	 * Returns the first element in the list.
	 * @return HtmlElement
	 */
	public function getFirst()
	{
		return $this->iterator->rewind();
	}

	/**
	 * Returns the last element in the list.
	 * @return HtmlElement
	 */
	public function getLast()
	{
		return $this->iterator->end();
	}

	/**
	 * Returns the next HtmlElement in the list.
	 *
	 * If there is no element, a null value will be returned. Otherwise the
	 * next element will be returned and the array index will be changed.
	 * @return HtmlElement
	 */
	public function getNext()
	{
		$value = $this->iterator->next();

		if(!$value)
			$value = null;

		return $value;
	}

	/**
	 * Returns the previous element in the list.
	 *
	 * If there is no element, a null value will be returned. Otherwise the
	 * previous element will be returned and the array index will be changed.
	 * @return HtmlElement
	 */
	public function getPrevious()
	{
		$value = $this->iterator->previous();

		if(!$value)
			$value = null;

		return $value;
	}

	/**
	 * Returns the total number of elements in the list.
	 * @return int
	 */
	public function count()
	{
		return $this->iterator->count();
	}
}
?>