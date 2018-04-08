<?php

/**
 * This is Presets's model. This model will get all the data from Presets.csv
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
		parent::__construct("../public/assets/csv/Presets.csv", 'PresetId');
	}

	// provide form validation rules
	public function rules()
	{
		$config = array(
			['field' => 'Helmet', 'label' => 'Helmet', 'rules' => 'integer|greater_than_equal_to[1]|less_than_equal_to[6]'],
			['field' => 'Chest', 'label' => 'Chest', 'rules' => 'integer|greater_than_equal_to[7]|less_than_equal_to[12]'],
			['field' => 'Shields', 'label' => 'Shields', 'rules' => 'integer|greater_than_equal_to[13]|less_than_equal_to[18]'],
			['field' => 'Weapons', 'label' => 'Weapons', 'rules' => 'integer|greater_than_equal_to[19]|less_than_equal_to[24]'],
			['field' => 'Boots', 'label' => 'Boots', 'rules' => 'integer|greater_than_equal_to[25]|less_than_equal_to[30]'],
			['field' => 'Gloves', 'label' => 'Gloves', 'rules' => 'integer|greater_than_equal_to[31]|less_than_equal_to[36]'],
		);
		return $config;
	}
}
