<?php

/**
 * This is a model for Accessories. The data will come from Accessories.csv
 * ------------------------------------------------------------------------
 */
class Accessories extends CSV_Model
{

	/**
	 * Constructor.
	 * @param string $origin Filename of the CSV file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity	Entity name meaningful to the persistence
	 */
	function __construct()
	{
		parent::__construct("../public/assets/csv/Accessories.csv", "AccessoriesId", Accessories);
	}
}
