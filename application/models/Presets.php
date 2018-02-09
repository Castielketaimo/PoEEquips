<?php

/**
 * This is a model for Accessories. The data will come from Presets.csv
 * ------------------------------------------------------------------------
 */
class Presets extends CSV_Model
{

	/**
	 * Constructor.
	 * @param string $origin Filename of the CSV file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity	Entity name meaningful to the persistence
	 */
	function __construct()
	{
		parent::__construct("assets/csv/Presets.csv", 'PresetId');
	}
}
