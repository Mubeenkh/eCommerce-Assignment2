<?php
namespace app\controllers;

class Profile extends \app\core\Controller{


	public function index()
	{
		$this->view('User/profile');
	}



}