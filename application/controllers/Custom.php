<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Custom extends Application
{

    function __construct()
    {
        parent::__construct();
    }

//This function just render the page
    public function index()
    {
        $this->load->library('parser');
		$baseurl = base_url();
		$this->data = array(
			'urlLink' => $baseurl
		);
		$this->data['pagebody'] = 'custom_creation';
		$this->render();
    }

}
