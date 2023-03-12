<?php
namespace app\models;

class Publication extends \app\core\Model{

	public $publication_id;
	public $profile_id;
	public $picture;
	public $caption;
	public $timestamp;


	public function getAll()
	{
		$SQL = "SELECT * FROM publication";
		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}


	public function insert()
	{
		$SQL = "INSERT INTO publication(profile_id, picture, caption) VALUES (:profile_id, :picture, :caption)";

		$STH = $this->connection->prepare($SQL);

		$data = [
			'profile_id' => $this->profile_id,
			'picture' => $this->picture,
			'caption' => $this->caption
		];

		$STH->execute($data);

		return $this->connection->lastInsertId();
	}

	// $profile_id
	public function getByUser()
    {
        $SQL = "SELECT * FROM profile WHERE user_id=:user_id";

        $STH = $this->connection->prepare($SQL);

        $data = ['user_id' => $user_id];

        $STH->execute($data);

        $STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');

		return $STH->fetch();
    }	


    public function update(){
		//modify object without changing the user_id

		$SQL = "UPDATE `publication` 
				SET `caption`=:caption
				WHERE publication_id=:publication_id";

		$STH = $this->connection->prepare($SQL);

		$data = [
			'caption'=>$this->caption,
			'publication_id'=>$this->publication_id
		];

		$STH->execute( $data );
		return $STH->rowCount();
	}



/////////////////////////////////////////////////

	public function getPost($publication_id){
		$SQL = "SELECT * FROM publication WHERE publication_id=:publication_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['publication_id'=>$publication_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetch();
	}


	public function getProfile(){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		
		$STH->execute(['user_id'=>$this->user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetch();
	}

	
	public function deletePost(){
		$SQL = "DELETE FROM publication WHERE publication_id=:publication_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['publication_id'=>$this->publication_id]);
	}
}