<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Category extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    //This function just render the page
    public function index()
    {
        $this->load->library('parser');
        $role = $this->session->userdata('userrole');
        $baseurl = base_url();
        if ($role != ROLE_ADMIN) {
            redirect('/welcome');
        } else {
            $this->data = array(
                'urlLink' => $baseurl,
            );
        }

        $this->data['pagebody'] = 'category';
        $this->render();
    }

    // initiate editing of a task
    public function edit($CategoryId = null)
    {
        $this->load->model('Categories');

        if ($CategoryId == null)
            redirect('/Catalog');
        $category = $this->Categories->get($CategoryId);
        echo $category->CategoryId;
        $this->session->set_userdata('category', $category);

        $this->showit();
    }

    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $category = $this->session->userdata('category');
        $this->data['CategoryId'] = $category->CategoryId;

        // if no errors, pass an empty message
        if (!isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'fcategory' => form_label('Category Name') . form_input('Name', isset($category->category) ? null : $category->Name),
            'zsubmit' => form_submit('submit', 'Update Category'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'category_edit';
        $this->render();
    }

    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->load->model('Categories');

        $this->form_validation->set_rules($this->Categories->rules());

        // retrieve & update data transfer buffer
        $category = (array)$this->session->userdata('category');
        $category = array_merge($category, $this->input->post());
        $category = array_slice($category, 1);
        //print_r($accessory);
        $category = (object)$category;  // convert back to object
        $this->session->set_userdata('accessory', (object)$category);

        // validate away
        if ($this->form_validation->run()) {
            $this->Categories->update($category);

        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        redirect('/Category');
    }

    // build a suitable error message
    private function alert($message)
    {
        $this->load->helper('html');
        $this->data['error'] = heading($message, 3);
    }

    // Forget about this edit
    function cancel()
    {
        $this->session->unset_userdata('category');
        redirect('/Category');
    }
}