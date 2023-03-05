<?php
namespace app\controllers;

class User extends \app\core\Controller{


	// - As a person, I can log into the application.
	public function index()
	{  //login page

		if(isset($_POST['action']))
		{
			
			$user = new \app\models\User();
			$user = $user->getByUsername($_POST['username']);
			
			if($user)
			{

				if(password_verify($_POST['password'], $user->password_hash))
				{

					$_SESSION['user_id'] = $user->user_id;  
					header('location:/User/profile');

				}else{

					header('location:/User/index?error=Wrong Username or Password combination');
				}

			}else{
				header('location:/User/index?error=Wrong Username or Password combination'); 
			}

		}else{
			//display te form
			$this->view('User/index'); 
		}

	}

	// - As a person, I can register.
	public function register()
	{  //registration page

		if(isset($_POST['action']))
		{
			
			$user = new \app\models\User();

			$usercheck = $user->getByUsername($_POST['username']);

			if(!$usercheck)
			{
				$user->username = $_POST['username'];
				
				$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert();
				header('location:/User/index');

			}else{

				header('location:/User/register?error=Username ' . $_POST['username'] . ' already in use. Choose another.');

			}

		}else{
			
			$this->view('User/register'); 

		}
	}

	// - As a user, I can logout of the application.
	public function logout()
	{

		session_destroy();
		header('location:/User/index');

	}

	public function profile()
	{

		//users "Secure place"

		if(!isset($_SESSION['user_id'])){

			header('location:/User/index');
			return;

		}
		echo('Finish the publication model and controller');
		$publication = new \app\models\Publication();
		$publications = $publication->getAll($_SESSION['user_id']);
		$this->view('User/profile',$publications);

	}

	
}
