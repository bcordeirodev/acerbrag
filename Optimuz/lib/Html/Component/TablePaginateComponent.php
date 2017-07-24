<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.2
 * @package Html
 * @subpackage Component
 */

/**
 * This class extends the TableComponent class to add pagination capability,
 * using the Propel project.
 * @author Diego Andrade
 * @package Html
 * @subpackage Component
 * @since Optimuz 0.3
 * @version 0.3
 * @uses Propel
 * @uses Format
 * @uses Lang.Language
 */
class TablePaginateComponent extends HtmlTable
{
	/**
	 * Named parameter used to build the links. Default name is 'page'.
	 * @var string
	 * @see TablePaginateComponent::setLinkNamedParameter()
	 * @see TablePaginateComponent::getLinkNamedParameter()
	 */
	protected $namedParameter			= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class extends the TableComponent class to add pagination capability,
	 * using the Propel project.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Initializes the settings of the component.
	 */
	public function initialize()
	{
		parent::initialize();
		$this->namedParameter = 'page';
	}

	/**
	 * Populates the table with defined dataset.
	 *
	 * This method builds a pagination component in the table foot, and for this
	 * it uses as default the PropelModelPager as the dataset. So Propel must to
	 * be enabled.
	 * @return string
	 */
	public function setup()
	{
		parent::setup();

		// auto paginate
		if(class_exists('PropelModelPager') && ($this->dataset instanceof PropelModelPager))
		{
			$lang = Language::getInstance('Html');
			$totalRecords = $this->dataset->count();
			$totalPages = ceil($totalRecords / $this->dataset->getMaxPerPage());
			$firstRecord = $this->dataset->getFirstIndex();
			$lastRecord = $this->dataset->getLastIndex();
			$curPage = $this->dataset->getPage();
			$firstPage = $curPage - 2;
			$firstPage = $firstPage < 1 ? 1 : $firstPage;
			$lastPage = $curPage + 2;
			$lastPage = $lastPage > $totalPages ? $totalPages : $lastPage;
			$i = $firstPage - 1;
			$footer = '';

			if($totalRecords > 0)
			{
				if($firstPage > 1)
				{
					$footer = "<li><a href='{$this->getPageLink(1)}' title='{$lang->getSentence('component.table.paging.firstPage')}'>1</a></li>";

					if($firstPage - 1 > 1)
					{
						$footer .= '<li>...</li>';
					}
				}

				while(++$i <= $lastPage)
				{
					$footer .= '<li>';

					if($curPage != $i)
						$footer .= "<a href='{$this->getPageLink($i)}' title='{$lang->getSentence('component.table.paging.page')} {$i}'>{$i}</a>";
					else
						$footer .= "<span title='{$lang->getSentence('component.table.paging.page')} {$i}'>{$i}</span>";

					$footer .= '</li>';
				}

				if($lastPage < $totalPages)
				{

					if($lastPage + 1 < $totalPages)
					{
						$footer .= '<li>...</li>';
					}

					$footer .= "<li><a href='{$this->getPageLink($totalPages)}' title='{$lang->getSentence('component.table.paging.lastPage')}'>{$totalPages}</a></li>";
				}

				$footer = "<ul>{$footer}</ul>";

				$rowTotal = self::create('tr');
				$rowTotal->setAttribute('class', 'count');
				$cellTotal = self::create('td', $lang->getSentence('component.table.paging.count', $firstRecord, $lastRecord, $totalRecords));

				if($this->columnsCount > 1)
					$cellTotal->setAttribute('colspan', $this->columnsCount);

				$rowTotal->appendChild($cellTotal);
			}

			$row = self::create('tr');
			$row->setAttribute('class', 'pagination');
			$cell = self::create('td');
			$cell->loadHtml($footer);

			if($this->columnsCount > 1)
				$cell->setAttribute('colspan', $this->columnsCount);

			$row->appendChild($cell);
			$this->foot->appendChild($row);

			if(isset($rowTotal))
				$this->foot->appendChild($rowTotal);
		}
	}

	/**
	 * Returns the link for a page in the pagination based on the page number.
	 *
	 * The link is built using a named parameter ('page' by default). This named
	 * parameter can be change using the method .
	 * @param int $page Page number.
	 * @return string
	 * @see TablePaginateComponent::setLinkNamedParameter()
	 */
	private function getPageLink($page)
	{
		$url = !empty($this->baseUrl) ? $this->baseUrl : $_SERVER['REQUEST_URI'];
		$qs = '';
		$pattern = "/{$this->namedParameter}:(\d+)/";

		if(strpos($url, '?') !== false)
		{
			$parts = explode('?', $url, 2);
			$url = $parts[0];
			$qs = "?{$parts[1]}";
		}

		if(preg_match($pattern, $url, $matches))
		{
			$url = preg_replace($pattern, "{$this->namedParameter}:{$page}", $url);
		}
		else
		{
			if(substr($url, -1) !== '/')
				$url .= '/';

			$url .= "{$this->namedParameter}:{$page}";
		}

		$url .= $qs;

		if(!empty($this->sortColumns))
		{
			if(isset($this->sortColumns[$this->sortColumnIndex]))
			{
				$columnName = $this->sortColumns[$this->sortColumnIndex];
				$sortOrder = $this->sortOrder ? $this->sortOrder : self::SORT_ASC;

				$url .= "/{$this->sortColumnParamName}:{$columnName}/{$this->sortOrderParamName}:{$sortOrder}";
			}
		}

		return $url;
	}

	/**
	 * Sets a new parameter name that points to the page number in the URLs of
	 * the pagination.
	 * @param string $name Parameter name.
	 * @see TablePaginateComponent::$namedParameter
	 * @see TablePaginateComponent::getLinkNamedParameter()
	 */
	public function setLinkNamedParameter($name)
	{
		$this->namedParameter = $name;
	}

	/**
	 * Returns the parameter name that points to page number in the URLs of the
	 * the pagination.
	 * @return string.
	 * @see TablePaginateComponent::$namedParameter
	 * @see TablePaginateComponent::setLinkNamedParameter()
	 */
	public function getLinkNamedParameter()
	{
		return $this->namedParameter;
	}
}
?>