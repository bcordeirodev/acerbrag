<?php
/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */
require_once dirname(__FILE__) . '/../../../orm/Propel/generator/lib/reverse/mysql/MysqlSchemaParser.php';

/**
 * Custom MySql database schema parser.
 *
 * @author     Diego Andrade <diego.andrade@interativatecnologia.com.br>
 */
class CustomMySqlSchemaParser extends MysqlSchemaParser
{
	/**
	 * Parses the database to retrive tables structure. It also automaticaly
	 * adds the isCrossRef attribute to the relation tables.
	 */
	public function parse(Database $database, Task $task = null)
	{
		$count = parent::parse($database, $task);
		
		foreach($database->getTables() as $table)
		{
			$columns = $table->getColumns();
			$fks = $columns[0]->getForeignKeys();
			$table->setIsCrossRef($columns[0]->isPrimaryKey() && !empty($fks));
		}

		return $count;
	}
}
