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

  public function category(&$key = 0)
  {
		if(isset($key)){
			$this->load->model('Categories');
			$record = $this->Categories->all();
			header("Content-type: application/json");
			echo json_encode($record);
		}

		// if ($key === NULL)
		// {
		// 	$this->load->model('Categories');
		// 	$all_the_items = $this->Categories->all();
		// 	$data['all'] = $all_the_items;
		// 	return $this->load->view('categories_display', $data);
		// } else {
		// 	$this->load->model('Categories');
		// 	$item = $this->Categories->where('Name', $key);
		// 	$data['single'] = $item;
		// 	return $this->load->view('categories_display', $data);
		// }
  }

  public function catalog($key = 0)
  {
	  if(isset($key)){
		  $this->load->model('Accessories');
		  $record = $this->Accessories->all();
		  header("Content-type: application/json");
		  echo json_encode($record);
	  }
  }

  public function bundle($key = 0)
  {
	  if(isset($key)){
		  $this->load->model('Presets');
		  $record = $this->Presets->all();
		  header("Content-type: application/json");
		  echo json_encode($record);
	  }
  }
}
