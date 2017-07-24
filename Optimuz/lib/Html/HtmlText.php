<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This class is used to build HTML text elements. As the HtmlElement only works
 * with objects, text also must to be objects. So this class can be used.
 *
 * This class only extends the PHP class DOMText.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 */
class HtmlText extends DOMText
{
	/**
	 * Removes the element from the DOM tree.
	 * @return HtmlElement Returns the removed element.
	 */
	public function remove()
	{
		return $this->parentNode->removeChild($this);
	}

	/**
	 * Returns a list of all previous elements. Only the Element nodes are
	 * returned by this function. Text nodes and other types are ignored.
	 *
	 * If there is no previous siblings, an empty list is returned.
	 * @return HtmlElementList List of the previous elements.
	 */
	public function getPreviousSiblings()
	{
		$current = $this;
		$siblings = array();

		while(($current = $current->previousSibling))
		{
			if($current->nodeType == 1)
				$siblings[] = $current;
		}

		return new HtmlElementList($siblings);
	}

	/**
	 * Returns a list of all next elements. Only the Element nodes are
	 * returned by this function. Text nodes and other types are ignored.
	 *
	 * If there is no next siblings, an empty list is returned.
	 * @return HtmlElementList List of the next elements.
	 */
	public function getNextSiblings()
	{
		$current = $this;
		$siblings = array();

		while(($current = $current->nextSibling))
		{
			if($current->nodeType == 1)
				$siblings[] = $current;
		}

		return new HtmlElementList($siblings);
	}

	/**
	 * Returns a list of all sibling elements. Only the Element nodes are
	 * returned by this function. Text nodes and other types are ignored.
	 *
	 * If there is no siblings, an empty list is returned.
	 * @return HtmlElementList List of sibling elements.
	 */
	public function getSiblings()
	{
		$prev = $this->getPreviousSiblings()->getIterator()->getArray();
		$next = $this->getNextSiblings()->getIterator()->getArray();

		return new HtmlElementList(array_merge($prev, $next));
	}

	/**
	 * Returns the contents of the node.
	 * @return string Returns the textual contents of the node.
	 */
	public function __toString()
	{
		return $this->nodeValue;
	}
}
?>