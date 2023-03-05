<?php
namespace app\controllers;

class Person extends \app\core\Controller{

	public function index()
	{
		$person = new \app\Models\Person();
		$persons = $person->getAll();
		$this->view('Person/index',$persons);
	}

	public function create()
	{

		if(isset($_POST['action']))
		{
			//Make a new Person
			$person = new \app\Models\Person();
			
			//Populate the person
			$person->first_name = $_POST['first_name'];
			$person->last_name = $_POST['last_name'];
			$person->middle_name = $_POST['middle_name'];
			
			//Invoke the insert method
			$person->insert();
			
			//Redirect back to the list of persons
			header('location:/Person/index');

		}else{
			$this->view('Person/create');
		}

	}
	
	public function delete($person_id)
	{
		$person = new \app\Models\Person();
		$person->delete($person_id); //calling the action that actually deletes 
		header('location:/Person/index');
	}
}