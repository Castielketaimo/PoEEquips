<?php

/**
 * This is a model for Accessories. The data will come from Accessories.csv
 * ------------------------------------------------------------------------
 */
class Accessories extends CSV_Model
{
	function __construct() {
      parent::__construct('assets/csv/Accessories.csv','AccessoriesId');
    }
}
