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
	{}

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
  
  public function checkChoice($category, $selection)
  {
	  if($category === "bundle"){
		  $this->load->model('Presets');
		  if($this->Presets->get($selection) === null){
			  return false;
		  }else {
			  return true;
		  }
	  }
	  if($category === "accessories"){
		  $this->load->model('Accessories');
		 if($this->Accessories->get($selection) === null){
			  return false;
		  }else {
			  return true;
		  }
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
			return;
	  }

	if($this->checkChoice("accessories",$key) == true){
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
		return;	
	};
		
	if($this->checkChoice("bundle",$key) == true){
		$this->load->model('Presets');
		$record = $this->Presets->get($key);
		header("Content-type: application/json");
		echo json_encode($record);
	};	
  }
}
