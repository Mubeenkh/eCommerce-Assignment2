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
			$this->view('Profile/details', $profile);	//uses the details to display 
		}else{																																															
			header('location:/Profile/create');	//if no profile then forced to go there
		}
	
	} 
	//this function allows you to see the users profile by 
	public function details($user_id){

		$profile = new \app\models\Profile();
		
		$profile = $profile->getByUserId($user_id);

		$this->view('Profile/details', $profile);

	}

    //checking the followers have to be here since you are passing the data from the view /Profile/details
    public function checkIfFollowing($profile_id){
		$follow = new \app\models\Follow();
		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $profile_id;

		$boolean = $follow->isFollowing();

		return $boolean;	
	}


////////////////////////////////
	
	#[\app\filters\Login]
	public function create(){

		if(isset($_POST['create'])){

			$profile = new \app\models\Profile();
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name']; 
			$profile->last_name = $_POST['last_name']; 
			$profile->middle_name = $_POST['middle_name']; 
		
			////////////////////////
            $uploadedPicture = $this->uploadPicture($_SESSION['user_id']);

            if(isset($uploadedPicture['target_file']))
            {
                $profile->picture = $uploadedPicture["target_file"];
                
            }

            $uploadMessage = $uploadedPicture["upload_message"] == 'success' ? '' : '&error=Something went wrong '.$uploadedPicture["upload_message"];
            
			////////////////////////
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

		if(isset($_POST['edit'])){
			
			// $profile->user_id = $_SESSION['user_id'];	//when you edit profile you dont change the user_id
			$profile->first_name = $_POST['first_name']; 
			$profile->last_name = $_POST['last_name']; 
			$profile->middle_name = $_POST['middle_name']; 

			///////////////////////////////////

            $uploadedPicture = $this->uploadPicture($_SESSION['user_id']);
            
            if(isset($uploadedPicture['target_file']))
            {
                $profile->picture = $uploadedPicture["target_file"];
            }

            $uploadMessage = $uploadedPicture["upload_message"] == 'success' ? '' : '&error=Something went wrong '.$uploadedPicture["upload_message"];

			///////////////////////////////////


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



	public function uploadPicture($user_id){
		echo 'inside profile addpic';
		$uploadedFile = array();

        if(isset($_FILES["profilePicture"]) && ($_FILES["profilePicture"]["error"] == UPLOAD_ERR_OK))
        {

            $info = getimagesize($_FILES["profilePicture"]["tmp_name"]);

            $allowedTypes = ["jpg", "png", "gif"];

            $fileName = basename($_FILES["profilePicture"]["name"]);

            $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

            if($info == false){

                // header('location:/Profile/index?error=Bad file format!');   
                $uploadedFile["upload_message"] = "Bad image file format!";
                $uploadedFile["target_file"] = null;


            }else if(!in_array($fileType, $allowedTypes))
            {//File uploaded, but check the image file type
               
               // header('location:/Profile/index?error=The file type is not accepted!'); 
            	$uploadedFile["upload_message"] = "The image file type is not accepted!";
                $uploadedFile["target_file"] = null;


            }else{
                // Save the image in the images folder
                	
                // $path = dirname(__DIR__).DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR; //****************************************
                $path = 'images'.DIRECTORY_SEPARATOR;

                $targetFileName = $user_id.'-'.uniqid().'.'.$fileType;

                move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $path.$targetFileName);

                $uploadedFile["upload_message"] = "success";

                $uploadedFile["target_file"] = $targetFileName;
                
                return $uploadedFile;
            }

            
        }else{
            // $this->view('Profile/edit');
            $uploadedFile["upload_message"] = "Image not specified or not uploaded successfully.";

            $uploadedFile["target_file"] = null;

        }
        
        return $uploadedFile;

    }



}