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
