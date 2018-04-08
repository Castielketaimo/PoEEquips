<?php

/**
 * This is Accessories's model. This model will get all the data from Accessories.csv
 * ------------------------------------------------------------------------
 */
class Accessories extends CSV_Model
{
    /**
     * Accessories constructor.
     */
	function __construct() {
      parent::__construct('assets/csv/Accessories.csv','AccessoriesId');
    }

    public function rules()
    {
        $config = array(
            ['field' => 'Name', 'label' => 'Accessory Name', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
            ['field' => 'Strength', 'label' => 'Strength', 'rules' => 'integer|less_than[101]'],
            ['field' => 'Dexterity', 'label' => 'Dexterity', 'rules' => 'integer|less_than[101]'],
            ['field' => 'Intelligence', 'label' => 'Intelligence', 'rules' => 'integer|less_than[101]'],
        );
        return $config;
    }
}
