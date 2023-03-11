<?php
namespace app\controllers;

class Publication extends \app\core\Controller{

	#[\app\filters\Login]
	public function create(){

		if(isset($_POST['action']))
		{

			$publication = new \app\models\Publication();

			$publication->profile_id = $_SESSION['user_id'];//FK ///************might be user_id
			$publication->caption = $_POST['caption'];
			// $filename = $this->saveFile($_FILES['picture']);

		///////////   Related to the picture   ///////////

            $uploadedPicture = $this->uploadPicture($_SESSION['user_id']);

            if(isset($uploadedPicture['target_file']))
            {
                $publication->picture = $uploadedPicture["target_file"];
            }

            $uploadMessage = $uploadedPicture["upload_message"] == 'success' ? '' : '&error=Something went wrong '.$uploadedPicture["upload_message"];

        ///////////   Related to the picture   ///////////

            $success = $publication->insert();

			if($success)
			{

				header('location:/Profile/index?success=Post created.' .$uploadMessage);

			}else{

				header('location:/Publication/create?error=Something went wrong. Maybe file type'.$uploadMessage);

			}
			
		}else{

			$this->view('Publication/create');

		}
	}

	public function uploadPicture($user_id)
	{

		$uploadedFile = array();

        if(isset($_FILES["postPicture"]) && ($_FILES["postPicture"]["error"] == UPLOAD_ERR_OK))
        {

            $info = getimagesize($_FILES["postPicture"]["tmp_name"]);

            $allowedTypes = ["jpg", "png", "gif"];

            $fileName = basename($_FILES["postPicture"]["name"]);

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

                move_uploaded_file($_FILES["postPicture"]["tmp_name"], $path.$targetFileName);

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