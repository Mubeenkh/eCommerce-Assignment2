<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function index()	//User Login Page
	{
		if(isset($_POST['action']))
		{
			
			$user = new \app\models\User();
			$user = $user->getByUsername($_POST['username']);
			
			if($user)
			{

				if(password_verify($_POST['password'], $user->password_hash))
				{

					$_SESSION['user_id'] = $user->user_id;  
					header('location:/Main/index');

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

	public function register() // User Registration Page
	{

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

	public function logout()
	{

		session_destroy();
		// header('location:/User/index');
		header('location:/Main/index');

	}

	#[\app\filters\Login]
	public function profile()
	{
		//users "Secure place", 
		//If user is mot loged in, it will not run the rest of the code****
		// if(!isset($_SESSION['user_id'])){
		// 	header('location:/User/index');
		// 	return;	//to make sure they dont get access to what comes after this if
		// }
		$publication = new \app\models\publication();
		// $publications = $publication->getByUser($_SESSION['user_id']);
		$publications = $publication->getByUser();
		$this->view('User/profile',$publications);

		// $this-> view('User/profile');

	}

	public function userInfo()
	{
		$user = new \app\models\User();
		$user = $user->getByUsername($_POST['username']);
		$this->view('User/userInfo',$user);
	}
	
}