<?php
namespace app\controllers;

class Follow extends \app\core\Controller{

	//useless now
	// public function index()
	// {
	// 	$follow = new \app\models\Follow();
	// 	$follow->getFollowingPublication();
	// 	$this->view('Follow/index',$follow);
	// }


	//following someone
	#[\app\filters\Login]
	public function followUser($following)
	{
		
		$follow = new \app\models\Follow();

		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->insert();
		header('location:/Profile/details/' . $following .'?success=Successfully followed');
	
	}
	
	#[\app\filters\Login]
	public function unfollowUser($following)
	{
		
		$follow = new \app\models\Follow();

		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->unfollowUser();
		header('location:/Profile/details/' . $following .'?success=Successfully unfollowed');
	}

}