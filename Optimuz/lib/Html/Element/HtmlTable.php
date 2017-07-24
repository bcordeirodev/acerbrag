<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Element
 */

/**
 * Returns the HTML of a table. This class extends the HtmlComponent class
 * addiing new methods to automatic tables creation.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.2
 * @version 0.3
 * @uses Format
 * @uses Strings
 */
class HtmlTable extends HtmlElement
{
	/**
	 * Sort data ascending.
	 */
	const SORT_ASC						= 'asc';

	/**
	 * Sort data descending.
	 */
	const SORT_DESC						= 'desc';

	/**
	 * The row tamplate is empty.
	 */
	const EMPTY_ROW_TEMPLATE			= 2106;

	/**
	 * The dataset is of a wrong type.
	 */
	const DATASET_MISMATCH				= 2107;

	/**
	 * The boolean expression of a column is invalid.
	 */
	const INVALID_BOOLEAN_EXPRESSION	= 2108;

	/**
	 * Table head.
	 * @var HtmlComponent
	 */
	public $head						= null;

	/**
	 * Table body.
	 * @var HtmlComponent
	 */
	public $body						= null;

	/**
	 * Table foot.
	 * @var HtmlComponent
	 */
	public $foot						= null;

	/**
	 * Dataset from where the table will be populated.
	 * @var mixed
	 * @see HtmlTable::setSource()
	 * @see HtmlTable::getSource()
	 */
	protected $dataset					= null;

	/**
	 * CSS class of the alternate rows.
	 * @var string
	 * @see HtmlTable::setAlternateCss()
	 * @see HtmlTable::getAlternateCss()
	 */
	protected $alternateRowCss			= null;

	/**
	 * HTML template of the rows of the table head.
	 * @var string
	 */
	protected $headRowTemplate			= null;

	/**
	 * HTML template of the rows of the table body.
	 * @var string
	 */
	protected $bodyRowTemplate			= null;

	/**
	 * HTML template of the rows of the table foot.
	 * @var string
	 */
	protected $footRowTemplate			= null;

	/**
	 * Number of columns in the table body.
	 * @var int
	 */
	protected $columnsCount				= null;

	/**
	 * Array of the columns that can be used to sort data on table.
	 * @var array
	 */
	protected $sortColumns				= null;

	/**
	 * The zero-based index of the column that will sort the data on table.
	 * @var int
	 */
	protected $sortColumnIndex			= null;

	/**
	 * Direction of sorting: asc, desc.
	 * @var string
	 */
	protected $sortOrder				= null;

	/**
	 * Name of the column URL param. Default is 'sort-column'.
	 * @var string
	 */
	protected $sortColumnParamName		= null;

	/**
	 * Name of the direction URL param. Default is 'sort-order'.
	 * @var string
	 */
	protected $sortOrderParamName		= null;

	/**
	 * Base URL used to build the links. Default is an empty string.
	 * @var string
	 */
	protected $baseUrl					= null;

	/**
	 * Creates a new class instance.
	 *
	 * Returns the HTML of a table. This class extends the HtmlComponent class
	 * adding new methods to automatic tables creation.
	 */
	public function __construct()
	{
		parent::__construct('table');
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	public function initialize()
	{
		parent::initialize();

		if($this->getElementsByTagName('thead')->length == 0)
		{
			$this->head = new HtmlElement('thead');
			$this->appendChild($this->head);
		}
		else
		{
			$this->head = $this->getElementsByTagName('thead')->item(0);
		}
		
		if($this->getElementsByTagName('tbody')->length == 0)
		{
			$this->body = new HtmlElement('tbody');
			$this->appendChild($this->body);
		}
		else
		{
			$this->body = $this->getElementsByTagName('tbody')->item(0);
		}
		
		if($this->getElementsByTagName('tfoot')->length == 0)
		{
			$this->foot = new HtmlElement('tfoot');
			$this->appendChild($this->foot);
		}
		else
		{
			$this->foot = $this->getElementsByTagName('tfoot')->item(0);
		}
		
		$this->columnsCount = 0;
		$this->sortColumns = array();
		$this->sortColumnParamName = 'sort-column';
		$this->sortOrderParamName = 'sort-order';
		$this->baseUrl = '';
	}

	/**
	 * Enables a column to sort data on table.
	 *
	 * This method does not sort the data on table. It only appends links on the
	 * table header with these information, so you can get it as URL params and
	 * sort the data by yourself directly on your data source.
	 * @param int $columnIndex Zero-based index of the column that sorts data on
	 * table. If the index is out of range, the first column (index 0) is used.
	 * @param string $columnName Name of the column on the URL.
	 * @param boolean $active (optional) Sets whether this column is the active
	 * column, i.e., is the column currently sorting data on table. Default is
	 * false.
	 */
	public function setSortColumn($columnIndex, $columnName, $active = false)
	{
		$this->sortColumns[$columnIndex] = $columnName;

		if($active)
			$this->sortColumnIndex = $columnIndex;
	}

	/**
	 * Sets the sort order of data on table.
	 *
	 * This method does not sort the data on table. It only appends links on the
	 * table header with these information, so you can get it as URL params and
	 * sort the data by yourself directly on your data source.
	 * @param string $order (optional) Two possible values: HtmlTable::SORT_ASC
	 * or HtmlTable::SORT_DESC. Default is HtmlTable::SORT_ASC.
	 */
	public function setSortOrder($order)
	{
		$this->sortOrder = Text::toLower($order);
	}

	/**
	 * Sets the names of sorting params appended to the generated links.
	 * @param int $columnParamName Name of the column URL param.
	 * @param string $orderParamName Name of the direction URL param.
	 */
	public function setSortParamsNames($columnParamName, $orderParamName)
	{
		$this->sortColumnParamName = $columnParamName;
		$this->sortOrderParamName = $orderParamName;
	}

	/**
	 * Sets the base URL for the links generated by this class.
	 * @param string $link Base URL.
	 */
	public function setBaseUrl($link)
	{
		$this->baseUrl = Enviroment::resolveUrl($link);
	}

	/**
	 * Returns the base URL for the table's links generated automaticaly.
	 * @return string.
	 */
	public function getBaseUrl()
	{
		return $this->baseUrl;
	}

	/**
	 * Sets a template for the rows of the table head.
	 * @param string $html HTML string.
	 * @see HtmlTable::setBodyTemplate()
	 * @see HtmlTable::setFootTemplate()
	 * @see HtmlTable::$headRowTemplate
	 */
	public function setHeadTemplate($html)
	{
		$this->headRowTemplate = $html;
	}

	/**
	 * Sets a template for the rows of the table body.
	 * @param string $html HTML string.
	 * @see HtmlTable::setHeadTemplate()
	 * @see HtmlTable::setFootTemplate()
	 * @see HtmlTable::$bodyRowTemplate
	 */
	public function setBodyTemplate($html)
	{
		$this->bodyRowTemplate = $html;
	}

	/**
	 * Sets a template for the rows of the table foot.
	 * @param string $html HTML string.
	 * @see HtmlTable::setHeadTemplate()
	 * @see HtmlTable::setBodyTemplate()
	 * @see HtmlTable::$footRowTemplate
	 */
	public function setFootTemplate($html)
	{
		$this->footRowTemplate = $html;
	}

	/**
	 * Sets the CSS class for the alternate rows, in other words, the even
	 * rows.
	 * @param string $alternateCss CSS class.
	 * @see HtmlTable::getAlternateCss()
	 * @see HtmlTable::$alternateRowCss
	 */
	public function setAlternateCss($alternateCss)
	{
		$this->alternateRowCss = $alternateCss;
	}

	/**
	 * Returns the CSS class of the alternate rows.
	 * @return string
	 * @see HtmlTable::setAlternateCss()
	 * @see HtmlTable::$alternateRowCss
	 */
	public function getAlternateCss()
	{
		return $this->alternateRowCss;
	}

	/**
	 * Sets the source dataset.
	 *
	 * The table will be populated with the values from this dataset.
	 * @param mixed $dataset Dataset used to populate the table. Can be an array
	 * or any object that extends the IteratorAggregate interface.
	 * @see HtmlTable::getSource()
	 * @see HtmlTable::$dataset
	 */
	public function setSource($dataset)
	{
		$this->dataset = $dataset;
	}

	/**
	 * Returns the source dataset.
	 * @return mixed
	 * @see HtmlTable::setSource()
	 * @see HtmlTable::$dataset
	 */
	public function getSource()
	{
		return $this->dataset;
	}

	/**
	 * Calls the setup method to populate the table with data from the dataset.
	 * @see HtmlTable::setSource()
	 * @see HtmlTable::getSource()
	 * @see HtmlTable::$dataset
	 */
	public function bindSource()
	{
		$this->setup();
	}

	/**
	 * Returns the complete table HTML.
	 * @return string
	 */
	public function getHtml()
	{
		if(!$this->body->hasChildNodes())
			$this->setup();

		return parent::getHtml();
	}

	/**
	 * Populates the table with defined dataset.
	 */
	public function setup()
	{
		// head columns setting
		if(!empty($this->headRowTemplate))
		{
			$this->head->loadHtml($this->headRowTemplate);

			if(!empty($this->sortColumns))
			{
				if(isset($this->sortColumns[$this->sortColumnIndex]))
				{
					$columns = $this->head->getElementsByTagName('th');

					foreach($columns as $index => $column)
					{
						if(isset($this->sortColumns[$index]))
						{
							$link = new HtmlLink();
							$columnName = $this->sortColumns[$index];
							$sortOrder = self::SORT_ASC;

							if($this->sortColumnIndex == $index)
							{
								$sortOrder = $this->sortOrder == self::SORT_ASC ? self::SORT_DESC : self::SORT_ASC;
								$link->setAttribute('class', $sortOrder);
							}

							$link->setUrl("{$this->baseUrl}/{$this->sortColumnParamName}:{$columnName}/{$this->sortOrderParamName}:{$sortOrder}");

							foreach($column->childNodes as $child)
								$link->appendChild($child);

							$column->appendChild($link);
						}
					}
				}
			}
		}

		// foot columns setting
		if(!empty($this->footRowTemplate))
			$this->foot->loadHtml($this->footRowTemplate);

		if(!empty($this->bodyRowTemplate))
		{
			$rows = null;

			if(is_array($this->dataset) || ($this->dataset instanceof Iterator) || ($this->dataset instanceof IteratorAggregate))
			{
				$rows = is_array($this->dataset) || ($this->dataset instanceof Iterator) ? $this->dataset : $this->dataset->getIterator();
				$rowTemplate = preg_replace('/\n+/', '', $this->bodyRowTemplate);

				// columns count
				$this->columnsCount = preg_match_all('/<td[^>]*>/', $rowTemplate, $m);
				
				if(method_exists($this->dataset, 'count') ? ($this->dataset->count() > 0) : !empty($this->dataset))
				{
					$z = 0;

					// fields to replace
					if(($hasFields = preg_match_all('/({[^}]+})/', $rowTemplate, $fields) > 0))
						$fields = $fields[1];

					// row CSS class
					preg_match('/<tr([^>]+)>/', $rowTemplate, $matches);
					$oldAttrs = isset($matches[1]) ? $matches[1] : false;
					$replaceRowCss = false;

					if($oldAttrs && (stripos($oldAttrs, 'class=') !== false))
					{
						$newAttrs = preg_replace('/class=(\'|")/', "class=\\1{ROW_CSS_REPLACE} ", $oldAttrs);
						$rowTemplate = str_replace("<tr{$oldAttrs}", "<tr{$newAttrs}", $rowTemplate);
						$replaceRowCss = true;
					}

					// removes all children from the table body to populate again
					if($this->body->hasChildNodes())
						$this->body->clear();

					foreach($this->dataset as $index => $dataRow)
					{
						if($dataRow instanceof HtmlElement)
						{
							$row = $dataRow;
						}
						else
						{
							$row = $rowTemplate;

							if($hasFields)
							{
								$methodName = null;

								switch(gettype($dataRow))
								{
									case 'array':
										$methodName = 'getArrayValue';
										break;
									case 'object':
										$methodName = 'getObjectValue';
										break;
									default:
										$methodName = false;
										break;
								}

								foreach($fields as $field)
								{
									$fieldName = str_replace('{', '', str_replace('}', '', $field));
									$formatter = null;

									// boolean expressions {expression|true|false}
									if(strpos($fieldName, '|') > 0)
									{
										$fieldParts = explode('|', $fieldName);
										$auxMethodName = $fieldParts[0];

										if(is_object($dataRow))
										{
											$fieldName = $this->getObjectValue($dataRow, $auxMethodName) ? $fieldParts[1] : $fieldParts[2];
										}
										else
										{
											if(function_exists($auxMethodName))
												$fieldName = $auxMethodName($dataRow) ? $fieldParts[1] : $fieldParts[2];
											else
												throw new HtmlError(Language::getInstance('Html')->getSentence('component.table.invalidBooleanExpression', $fieldName), self::INVALID_BOOLEAN_EXPRESSION);
										}
									}

									// formatter expressions {[format]value}
									if(preg_match('/\[([^]]+)\]/', $fieldName, $matches) > 0)
									{
										$fieldName = str_replace($matches[0], '', $fieldName);
										$formatter = new Formatter($matches[1]);
									}

									$value = $fieldName == 'AUTO_INCREMENT' ? $index + 1 : $this->$methodName($dataRow, $fieldName);

									if($formatter)
										$value = $formatter->format($value);

									$row = str_replace($field, $value, $row);
								}
							}

							if($this->alternateRowCss && (++$z % 2 == 0))
							{
								if($replaceRowCss)
									$row = str_replace('{ROW_CSS_REPLACE}', $this->alternateRowCss, $row);
								else
									$row = str_replace('<tr', "<tr class='{$this->alternateRowCss}'", $row);
							}
							else
							{
								if($replaceRowCss)
									$row = str_replace('{ROW_CSS_REPLACE}', '', $row);
							}
						}

						$this->body->loadHtml($row);
					}
				}
				else
				{
					$row = self::create('tr');
					$column = self::create('td', Language::getInstance('Html')->getSentence('component.table.emptyDataset'));
					$column->setAttribute('colspan', $this->columnsCount);
					$column->setAttribute('class', 'empty');
					$row->appendChild($column);
					$this->body->appendChild($row);
				}
			}
			else
			{
				throw new HtmlError(Language::getInstance('Html')->getSentence('component.table.datasetMismatch'), self::DATASET_MISMATCH);
			}
		}
		else
		{
			throw new HtmlError(Language::getInstance('Html')->getSentence('component.table.emptyRowTemplate'), self::EMPTY_ROW_TEMPLATE);
		}
	}

	/**
	 * Returns a value from an array.
	 * @param array $array Base array.
	 * @param string $field Key name of the value.
	 * @return mixed
	 */
	protected function getArrayValue($array, $field)
	{
		return isset($array[$field]) ? $array[$field] : $field;
	}

	/**
	 * Returns a value from an object.
	 * @param mixed $object Base object.
	 * @param string $field Key name of the value.
	 * @return mixed
	 */
	protected function getObjectValue($object, $field)
	{
		$value = null;

		if(strpos($field, '.') !== false)
		{
			$parts = explode('.', $field);
			$value = $object;

			foreach($parts as $part)
				$value = $this->getObjectValue($value, $part);
		}
		else
		{
			$method = $this->getMethodName($field);
			$value = method_exists($object, $method) ? $object->$method() : (property_exists($object, $field) ? $object->$field : $field);
		}

		return $value;
	}

	/**
	 * Returns the getter method name of the corresponding field from the
	 * dataset.
	 * @param string $field Field name.
	 * @return string Getter method name.
	 */
	protected function getMethodName($field)
	{
		$methodName = '';

		if($field)
			$methodName = 'get' . CamelCase::toUpper($field);

		return $methodName;
	}
}
?>