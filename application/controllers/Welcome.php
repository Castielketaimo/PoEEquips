<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
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
		$this->data['pagebody'] = 'welcome_message';

			//	$this->load->model('themenu');
		//		$all_the_items = $this->themenu->all();

	//			$subset = $this->themenu->where('category','entree');
		$this->load->view("partials/_menubar");
		$this->render();
	}

}
}
