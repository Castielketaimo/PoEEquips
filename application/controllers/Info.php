<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Application
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
  }

	/*
	Load all categories model and return it as a Json file in the browser when no parameter passed
	Load single category and return it as a Json files in the browser if a parameter is passed
	*/
  public function category($key = -1)
  {
		if($key === -1){
			$this->load->model('Categories');
			$record = $this->Categories->all();
			header("Content-type: application/json");
			echo json_encode($record);
		} else {
			$this->load->model('Categories');
			$record = $this->Categories->get($key);
			header("Content-type: application/json");
			echo json_encode($record);
		}
  }

	/*
	Load all Catalog model and return it as a Json file in the browser when no parameter passed
	Load single catalog and return it as a Json files in the browser if a parameter is passed
	*/
  public function catalog($key = -1)
  {
		if($key === -1){
			$this->load->model('Accessories');
			$record = $this->Accessories->all();
			header("Content-type: application/json");
			echo json_encode($record);
		} else {
			$this->load->model('Accessories');
			$record = $this->Accessories->get($key);
			header("Content-type: application/json");
			echo json_encode($record);
		}
  }

	/*
	Load all presets model and return it as a Json file in the browser when no parameter passed
	Load single preset and return it as a Json files in the browser if a parameter is passed
	*/
  public function bundle($key = -1)
  {
		if($key === -1){
			$this->load->model('Presets');
			$record = $this->Presets->all();
			header("Content-type: application/json");
			echo json_encode($record);
		} else {
			$this->load->model('Presets');
			$record = $this->Presets->get($key);
			header("Content-type: application/json");
			echo json_encode($record);
		}
  }
}
