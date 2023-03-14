<?php

namespace app\models;

class Follow extends \app\core\Model{

	public $follower_id;	//ME
	public $followed_id;	//Rachelle
	public $timestamp;


	//following a user
	public function insert()	
	{
		$SQL = "INSERT INTO follow(follower_id, followed_id)
				VALUES (:follower_id, :followed_id)";

		$STH = $this->connection->prepare($SQL);
		
		$data = [
			'follower_id' => $this->follower_id,
			'followed_id' => $this->followed_id
		];

		$STH->execute($data);
		return $STH->fetch();
	}

	public function unfollowUser() 
	{

		$SQL = "DELETE FROM follow WHERE follower_id=:follower_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['follower_id'=>$this->follower_id]);
		//unfollow user so delete from database
		header('location:/Main/index?success=Successfully unfollowed');

	}

	public function isFollowing() {
		$SQL = 'SELECT * FROM follow 
				WHERE follower_id=:follower_id 
				AND followed_id=:followed_id';
		// $SQL = 'SELECT * FROM follow 
		// 		WHERE followed_id=:followed_id';
				

		$STH = $this->connection->prepare($SQL);

		$data = [
			'follower_id'=>$this->follower_id,
		    'followed_id'=>$this->followed_id
		];

		$STH->execute($data);
		return $STH->fetch();
	}


	
}