<?php
namespace app\models;

class Profile extends app\core\Model{

	public $user_id;		//PK, FK to user
	public $first_name;		
	public $middle_name;
	public $last_name;

	public function getUserById($user_id)
	{

	}

	public function insert()
	{

	}

	//user should be able to edit their profile
	public function edit()
	{

	}


}