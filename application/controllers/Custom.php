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

        $presetButton = '<input type="submit" value="Update Preset" onclick="updatePreset()"></input>';

        $role = $this->session->userdata('userrole');
		if ($role == ROLE_ADMIN) {
            $this->data = array(
                'urlLink' => $baseurl,
                'updatePresetButton' => $presetButton
            );

        } else if ($role == ROLE_USER) {
            $this->data = array(
                'urlLink' => $baseurl,
                'updatePresetButton' => ""
            );
        } else {
            $this->data = array(
                'urlLink' => $baseurl,
                'updatePresetButton' => ""
            );
            redirect('/welcome');
        }

		$this->data['pagebody'] = 'custom_creation';
		$this->render();
    }


    	// Initiate adding a new task
    	public function add()
    	{
            // setup for validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules($this->Presets->rules());

            // retrieve & update data transfer buffer
            $preset = (array) $this->Presets->create();
            //$preset = (array) $this->session->userdata('preset');
            // var_dump($preset);
            // echo('<br/>');
            $preset = array_merge($preset, $this->input->post());
            // var_dump($preset);
            $preset = (object) $preset;  // convert back to object

            // validate away
            if ($this->form_validation->run())
            {
                if (empty($preset->PresetId))
                {
                    $preset->PresetId = $this->Presets->highest() + 1;
                    $this->Presets->add($preset);
                } else
                {
                    $this->Presets->update($preset);
                }
            } else
            {
                $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
            }
            redirect('custom');
    	}

    // initiate editing of a task
    public function edit($id = null)
        {
            // setup for validation
          $this->load->library('form_validation');
          $this->form_validation->set_rules($this->Presets->rules());
          if ($id == null)
          {
              redirect('/custom');
          }
          $preset = (array) $this->Presets->get($id);
          if(empty($preset))
          {
              redirect('/custom');
          }
          $preset = array_merge($preset, $this->input->post());
          $preset = (object) $preset;  // convert back to object

          // validate away
          if ($this->form_validation->run())
          {
              $this->Presets->update($preset);
          } else
          {
              $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
          }
          redirect('custom');
        }

        // build a suitable error mesage
        private function alert($message) {
            echo($message);
        }
    }
