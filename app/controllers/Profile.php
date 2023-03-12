<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	#[\app\filters\Login]
	public function index()
	{
	
		//where we view the profile information
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($_SESSION['user_id']);
		
		if($profile){
			// $this->view('Profile/index',$profile);
			$this->view('Profile/details', $profile);	
		}else{
			header('location:/Profile/create');	//if no profile then forced to go there
		}

		
		
	} 

	public function details($user_id){
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($user_id);
		$this->view('Profile/details', $profile);
	}


////////////////////////////////////////////////////////

	
	#[\app\filters\Login]
	public function create(){

		if(isset($_POST['action'])){

			$profile = new \app\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name']; 
			$profile->last_name = $_POST['last_name']; 
			$profile->middle_name = $_POST['middle_name']; 
		

			$success = $profile->insert();						//inserts data into the profile table

			if($success){
				header('location:/Profile/index?success=Profile created.' .$uploadMessage);
			}else{
				header('location:/Profile/index?error=Something went wrong. You can only have one profile'.$uploadMessage);
			}

		}else{

			$this->view('Profile/create');
		}

	}

	#[\app\filters\Login]
	public function edit(){

		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($_SESSION['user_id']);

		if(isset($_POST['action'])){
			
			// $profile->user_id = $_SESSION['user_id'];	//when you edit profile you dont change the user_id
			$profile->first_name = $_POST['first_name']; 
			$profile->last_name = $_POST['last_name']; 
			$profile->middle_name = $_POST['middle_name']; 

			$success = $profile->update();					//updates data in the table

			if($success){
				header('location:/Profile/index?success=Profile modified.');
			}else{
				header('location:/Profile/index?error=Something went wrong.');
			}

		}else{

			$this->view('Profile/edit', $profile);  //adding $profile so we can view the information
		}

	}


}