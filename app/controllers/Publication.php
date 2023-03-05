<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	// As a user, I can create a publication (upload my picture with its caption).
 	public function create()
 	{

 		if(isset($_POST['action']))
 		{

 			$publication = new \app\models\Publication();















 			

 		}

 	}

	// As a user, I can edit my publication (only the picture caption).
 	public function edit()
 	{



 	}

	// As a user, I can delete my publications.
 	public function delete($publication_id)
 	{

 		$user_id = $_SESSION['user_id'];

		$publication = new \app\models\Publication();

		$success = $publication->delete($publication_id,$user_id);
		
		if($success){
			header('location:/User/profile?success=Publication deleted.');
		}else{
			header('location:/User/profile?error=You are not allowed to delete this publication.');
		}

 	}

}