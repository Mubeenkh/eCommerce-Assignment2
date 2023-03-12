<?php

namespace app\controllers;

class Follow extends \app\core\Controller{

	//following someone
	public function followUser($following)
	{
		
		$follow = new \app\models\Follow();

		$follow->follower_id = $_SESSION['user_id'];
		$follow->followed_id = $following;

		$follow->insert();

		header('location:/Main/index?success="Successfully followed');
	
	}

	

}