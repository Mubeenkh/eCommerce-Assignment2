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

	public function getFollowingPublication()
	{
		$SQL = "SELECT p.publication_id, p.caption, p.picture, p.timestamp, u.user_id , u.first_name, u.last_name, u.middle_name
				FROM follow f
				JOIN profile u ON f.followed_id = u.user_id
				JOIN publication p ON u.user_id = p.profile_id
				WHERE f.follower_id = :current_id 
				ORDER BY p.timestamp DESC";

		$STH = $this->connection->prepare($SQL);

		$STH->execute(['current_id'=>$_SESSION['user_id']]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		
		return $STH->fetchAll();
	}

	public function getFollowing()
	{
		$SQL = "SELECT p.picture, p.first_name, p.middle_name, p.last_name
				FROM profile p
				JOIN follow f ON f.follower_id = p.user_id
				WHERE f.followed_id = :current_id";

		$STH = $this->connection->prepare($SQL);

		$STH->execute(['current_id'=>$_SESSION['user_id']]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Follow');
		
		return $STH->fetchAll();
	}
	
}