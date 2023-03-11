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
        $SQL = "SELECT * FROM profile WHERE profile_id=:profile_id";

        $STH = $this->connection->prepare($SQL);

        $data = ['profile_id' => $profile_id];

        $STH->execute($data);

        $STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Profile');

		return $STH->fetch();
    }	

}