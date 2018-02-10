<?php

/**
 * This is Categories's model. This model will get all the data from Categories.csv
 * ------------------------------------------------------------------------
 */
class Categories extends CSV_Model
{

	/**
	 * Constructor.
	 * @param string $origin Filename of the CSV file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity	Entity name meaningful to the persistence
	 */
	function __construct()
	{
		parent::__construct('assets/csv/Categories.csv', 'CategoryId');
	}
}
