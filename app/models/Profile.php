<?php
namespace app\models;

class Profile extends \app\core\Model{
	public $user_id;
	public $first_name;
	public $last_name;
	public $middle_name;
	public $picture;


	public function insert()
	{
		$SQL = "INSERT INTO profile(user_id,first_name,last_name,middle_name,picture) VALUES (:user_id,:first_name,:last_name,:middle_name,:picture)";

		$STH = $this->connection->prepare($SQL);

		$data = [
			'user_id' => $this->user_id,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'middle_name' => $this->middle_name,
			'picture' => $this->picture
		];

		$STH->execute( $data );
		return $STH->rowCount();
	}

	public function update()
	{
		//modify object without changing the user_id

		$SQL = "UPDATE `profile` 
				SET `first_name`=:first_name, `last_name`=:last_name, `middle_name`=:middle_name, `picture`=:picture
				WHERE user_id=:user_id";

		$STH = $this->connection->prepare($SQL);

		$data = [
			'user_id'=>$this->user_id,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'middle_name' => $this->middle_name,
			'picture' => $this->picture
		];

		$STH->execute( $data );
		return $STH->rowCount();
	}

	public function getByUserId($user_id){
		//: is a place holder
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";

		$STH = $this->connection->prepare($SQL);

		$STH->execute( ['user_id' => $user_id] );

		$STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');

		return $STH->fetch();
	}

/////////////////////

	public function get($user_id){

		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";

		$STH = $this->connection->prepare($SQL);

		$STH->execute(['user_id'=>$user_id]);

		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');

		return $STH->fetch();

	}

	public function getPublications($user_id){
		$SQL = "SELECT * FROM publication 
				WHERE profile_id=:profile_id 
				ORDER BY `timestamp` DESC";

		$STH = $this->connection->prepare($SQL);

		// $profile_ID = $_SESSION['user_id'];
		$STH->execute(['profile_id'=>$this->user_id]);

		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');

		return $STH->fetchAll();
	}

	public function getAll(){
		$SQL = "SELECT * FROM profile";
		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetchAll();
	}

	
	public function getFollowing($followed_id)
	{
		$SQL = "SELECT p.picture, p.first_name, p.middle_name, p.last_name
				FROM profile p
				JOIN follow f ON f.follower_id = p.user_id
				WHERE f.followed_id = :followed_id";

		$STH = $this->connection->prepare($SQL);

		$STH->execute(['followed_id'=>$followed_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		
		return $STH->fetchAll();
	}
	


}