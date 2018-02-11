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

			//Template for accessories data to replace
			$rowTemplate = "
				<tr>
					<td>{AccessoriesId}</td>
					<td>{ItemName}</td>
					<td>{Strength}</td>
					<td>{Dexterity}</td>
					<td>{Intelligence}</td>
					<td><img src='/assets/images/{ImagePath}' alt='{ItemName} at /assets/images/{ImagePath}'/></td>
					<td>{CategoryName}</td>
				</tr>
			";

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
		$this->load->view("partials/_menubar");
		$this->render();
		$this->load->view("partials/_footer");
//
	}


}
