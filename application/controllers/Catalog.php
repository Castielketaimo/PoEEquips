<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Application
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
		//Load Resources
		$this->load->library('parser');
		$this->load->model('Accessories');
		$this->load->model('Categories');

		//Get all items from Accessories and Catalog
		$allItems = $this->Accessories->all();
		$allCategories = $this->Categories->all();

		//Initialize container for Table items
		$itemsContainer = "";

		//Iterate over each item in accessories and execute code
		for ($i = 1; $i < count($allItems); $i++) {
			//Save data found at indexes into variables
			$AccessoriesId = $allItems[$i]->AccessoriesId;
			$ItemName = $allItems[$i]->Name;
			$Strength = $allItems[$i]->Strength;
			$Dexterity = $allItems[$i]->Dexterity;
			$Intelligence = $allItems[$i]->Intelligence;
			$ImagePath = $allItems[$i]->ImagePath;

			//Queries Category and returns rows matching CategoryId
			$CategoryRowQuery = $this->Categories->some('CategoryId', $allItems[$i]->CategoryId);

			//Store catagory name
			$CategoryName = $CategoryRowQuery[0]->Name;

            $role = $this->session->userdata('userrole');

			//Template for accessories data to replace
            if ($role == ROLE_ADMIN) {
                $rowTemplate = "
				<tr>
					<td><a href=\"/Catalog/edit/{AccessoriesId}\"><input type=\"button\" value=\"{AccessoriesId}\"/></a></td>
					<td>{ItemName}</td>
					<td>{Strength}</td>
					<td>{Dexterity}</td>
					<td>{Intelligence}</td>
					<td><img src='/assets/images/{ImagePath}' alt='{ItemName} at /assets/images/{ImagePath}'/></td>
					<td>{CategoryName}</td>
				</tr>";
            } else {
                $rowTemplate = "
				<tr>
					<td>{AccessoriesId}</td>
					<td>{ItemName}</td>
					<td>{Strength}</td>
					<td>{Dexterity}</td>
					<td>{Intelligence}</td>
					<td><img src='/assets/images/{ImagePath}' alt='{ItemName} at /assets/images/{ImagePath}'/></td>
					<td>{CategoryName}</td>
				</tr>";
            }


			//Replace each {} keyword with data saved
			$data = array(
				'AccessoriesId' => $AccessoriesId,
				'ItemName' => $ItemName,
				'Strength' => $Strength,
				'Dexterity' =>$Dexterity,
				'Intelligence' => $Intelligence,
				'ImagePath' => $ImagePath,
				'CategoryName' => $CategoryName
			);

			//Parse rowTemplate and replace each {} with the data from before and add it as a string into the itemContainer for later use
			$itemsContainer .= $this->parser->parse_string($rowTemplate, $data, TRUE);
		}

		//Template for Category Headers
		$headerTemplate= "
			<table class='table table-striped'>
					<tr>
						<th>Accessories Id</th>
						<th>Item Name</th>
						<th>Strength</th>
						<th>Dexterity</th>
						<th>Intelligence</th>
						<th>Image</th>
						<th>Category</th>
					</tr>
				{tableItems}
			</table>
		";

		//Replace {} with the itemsContainer currently saved
		$tableData = array(
			'tableItems' => $itemsContainer
		);

		//Parse headerTemplate and replace each {} with the data from before
		$tableContainer = $this->parser->parse_string($headerTemplate, $tableData, TRUE);

		//Replace and Set data to replace AccessoriesTable found in HTML with all of the previous templates
		$this->data = array (
			'AccesoriesTable' => $tableContainer
		);

		$this->data['pagebody'] = 'catalog_display';
		$this->render();
//
	}

    // initiate editing of a task
    public function edit($AccessoriesId = null)
    {
        $this->load->model('Accessories');

        if ($AccessoriesId == null)
            redirect('/Catalog');
        $accessory = $this->Accessories->get($AccessoriesId);
        //print_r($accessory);
        echo $accessory->AccessoriesId;
        $this->session->set_userdata('accessory', $accessory);

        $this->showit();
    }

    // Render the current DTO
    private function showit()
    {
        $this->load->helper('form');
        $accessory = $this->session->userdata('accessory');
        //echo $accessory->AccessoriesId;
        $this->data['AccessoriesId'] = $accessory->AccessoriesId;

        // if no errors, pass an empty message
        if ( ! isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'faccessory'      => form_label('Accessory Name') . form_input('Name', isset($accessory->accessory) ? null : $accessory->Name),
            'fstrength'  => form_label('Strength') . form_input('Strength',isset($accessory->strength) ? null : $accessory->Strength),
            'fdexterity'  => form_label('Dexterity') . form_input('Dexterity', isset($accessory->dexterity) ? null : $accessory->Dexterity),
            'fintelligence'  => form_label('Intelligence') . form_input('Intelligence', isset($accessory->intelligence) ? null : $accessory->Intelligence),
            'zsubmit'    => form_submit('submit', 'Update Accessory'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'itemedit';
        $this->render();
    }

    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->load->model('Accessories');

        $this->form_validation->set_rules($this->Accessories->rules());

        // retrieve & update data transfer buffer
        $accessory = (array) $this->session->userdata('accessory');
        $accessory = array_merge($accessory, $this->input->post());
        $accessory = array_slice($accessory, 1);
        //print_r($accessory);
        $accessory = (object) $accessory;  // convert back to object
        $this->session->set_userdata('accessory', (object) $accessory);

        // validate away
        if ($this->form_validation->run())
        {
            $this->Accessories->update($accessory);

        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }

    // build a suitable error message
    private function alert($message) {
        $this->load->helper('html');
        $this->data['error'] = heading($message,3);
    }

    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('accessory');
        redirect('/Catalog');
    }

}
