<?php

/**
* core/MY_Controller.php
*
* Default application controller
*
* @author		JLP
* @copyright           2010-2016, James L. Parry
* ------------------------------------------------------------------------
*/
class Application extends CI_Controller
{

	/**
	* Constructor.
	* Establish view parameters & load common helpers
	*/

	function __construct()
	{
		parent::__construct();

		// load session so we can use later
		$this->load->library('session');
		//  Set basic view parameters
		$this->data = array ();

		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	* Render this page
	*/
	function render($template = 'template')
	{
		$this->data['pagetitle'] = 'PoEEquips';
        $customBar = '<li><a href="/custom">Custom</a></li>';
        $categoryBar = '<li><a href="/Category">Edit Catagories</a></li>';
        $fields = array(
            'custom' => $customBar
        );
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_ADMIN) {
            $fields = array(
                'custom' => $customBar,
                'category' => $categoryBar
            );
        } else if ($role == ROLE_USER) {
            $fields = array(
                'custom' => $customBar,
				'category' => ""
            );
        } else {
            $fields = array(
                'custom' => "",
				'category' => ""
            );
        }
		$this->data['menubar'] = $this->parser->parse('partials/_menubar', $fields, true);
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->data['footer'] = $this->parser->parse('partials/_footer', $this->config->item('menu_choices'), true);
		$this->parser->parse('template', $this->data);
	}

}
