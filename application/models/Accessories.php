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
}
