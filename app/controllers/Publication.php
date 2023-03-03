<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

// As a user, I can create a publication (upload my picture with its caption).
// As a user, I can edit my publication (only the picture caption).
// As a user, I can delete my publications.

 	public function create()
 	{

 		if(isset($_POST['action']))
 		{
 			$publication = new \app\models\Publication();
 		}

 	}


}