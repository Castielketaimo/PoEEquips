<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccessoriesCtr extends Application
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->load->model('Accessories');
		$all_the_items = $this->Accessories->all();
		$data['all'] = $all_the_items;
		$this->load->view('accessories_display', $data);
	}

}
