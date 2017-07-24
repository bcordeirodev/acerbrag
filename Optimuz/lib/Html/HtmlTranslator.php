<?php
/**
 * This file sets a class to work with HTML elements.
 * @version 0.3
 * @package Html
 */

/**
 * This class is used for translation. Translations are done from one language
 * of expressions to another (like CSS to xPath).
 * @author Diego Andrade
 * @package Html
 * @since Optimuz 0.4
 * @version 0.3
 * @uses Strings.Text
 */
class HtmlTranslator
{
	/**
	 * Translates a CSS expression to a xPath expression.
	 * @param string $cssExpression CSS expression to translate. This expression
	 * must to be a valid CSS 3 expression, but also accepts some custom 
	 * selectors. They are:
	 * <ul>
	 * <li><b>":parent"</b>: selects the parent of the matched 
	 * element.</li>
	 * </ul>
	 * Warning: currently the :not() selector only accepts basic expressions. 
	 * Use it with caution.
	 * @return string xPath expression.
	 */
	public static function cssToXpath($cssExpression)
	{
		// fix the selectors '#', '.' and '[' with no preceding tag giving a
		// wildcard * to match all tags
		$xpathExpression = Text::replace('/(\s+|^|,)([\.\#\[])/', '\1*\2', $cssExpression);
		
		// fix the selectors '+' and '>' removing white spaces from arround them
		$xpathExpression = Text::replace('/\s*([\+>,])\s*/', '\1', $xpathExpression);
		
		// trim whitespace to prevent errors on descendant selector
		$xpathExpression = trim($xpathExpression);
		
		// commom expressions
		$expressions = array(
			'siblings' => '/\+([^\s\+>]+)/',
		);
		
		// the order of replacement below must to be respected in order for the
		// translation to work
		
		// multiple selectors
		if(Text::find(',', $cssExpression))
			$xpathExpression = Text::replace(',', '|.//', $xpathExpression);
		
		// next adjacent sibling
		if(Text::find('+', $cssExpression))
			$xpathExpression = Text::replace($expressions['siblings'], '/following-sibling::\1[1]', $xpathExpression);
		
		// next siblings
		if(Text::find('~', $cssExpression))
			$xpathExpression = Text::replace($expressions['siblings'], '/following-sibling::\1', $xpathExpression);
		
		// previous adjacent sibling (custom selector)
//		if(Text::find('', $cssExpression))
//			$xpathExpression = Text::replace($expressions['siblings'], '/preceding-sibling::\1[1]', $xpathExpression);
		
		// previous siblings (custom selector)
//		if(Text::find('', $cssExpression))
//			$xpathExpression = Text::replace($expressions['siblings'], '/preceding-sibling::\1', $xpathExpression);
		
		// has attribute
		if(Text::find('[', $cssExpression))
		{
			// first attributes with value
			$xpathExpression = Text::replace('/\[(\w[^=]+)=([^\'\"]+?)\]/', '[@\1=\'\2\']', $xpathExpression);
			
			// later attributes without value
			$xpathExpression = Text::replace('/\[(\w[^\]]+)\]/', '[@\1]', $xpathExpression);
		}
		
		// not
		// just basic expressions are supported
		// TODO improve the :not() selector
		$xpathExpression = Text::replace('/:not\(([^\)]+)\)/', '[not(\1)]', $xpathExpression);
		
		// parent (custom selector)
		$xpathExpression = Text::replace('/\s+:parent/', '/..', $xpathExpression);
		
		// descendant
		if(Text::find(' ', $cssExpression))
			$xpathExpression = Text::replace('/\s+/', '//', $xpathExpression);
		
		// direct child
		if(Text::find('>', $cssExpression))
			$xpathExpression = Text::replace('>', '/', $xpathExpression);
		
		// id
		if(Text::find('#', $cssExpression))
			$xpathExpression = Text::replace('/#([-_\w]+)/', '[@id=\'\1\']', $xpathExpression);
		
		// class
		if(Text::find('.', $cssExpression))
			$xpathExpression = Text::replace('/\.([-_\w]+)/', '[contains(concat(\' \', normalize-space(@class), \' \'), \' \1 \')]', $xpathExpression);
		
		// first child
		$xpathExpression = Text::replace(':first-child', '[1]', $xpathExpression);
		
		// last child
		$xpathExpression = Text::replace(':last-child', '[last()]', $xpathExpression);
		
		// fix the :not selector
		$xpathExpression = Text::replace('/not\(\[(.+?)\]\)/', 'not(\1)', $xpathExpression);
		
		return ".//$xpathExpression";
	}
}
?>
