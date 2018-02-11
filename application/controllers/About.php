<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class About extends Application
{

    function __construct()
    {
        parent::__construct();
    }

//This function just render the page
    public function index()
    {
        $this->data['pagebody'] = 'about_message';
        $this->render();
    }

}
