<?php
namespace app\controllers;

class Follow extends \app\core\Controller{

	#[\app\filters\Login]
	public function index()
	{
		$follow = new \app\models\Follow();
		$follow->getFollowingPublication();

		$this->view('Follow/index',$follow);
	}


	//following someone
	public function followUser($following)
	{
		
		$follow = new \app\models\Follow();

		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->insert();
		header('location:/Profile/details/' . $following .'?success=Successfully followed');
	
	}

	public function unfollowUser($following)
	{
		
		$follow = new \app\models\Follow();

		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->unfollowUser();
		header('location:/Profile/details/' . $following .'?success=Successfully unfollowed');
	}

}