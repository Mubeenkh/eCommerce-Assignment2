<?php
namespace app\models;

class Publication extends \app\core\Model{

	public $publication_id; //PK
	public $profile_id;		//FK to profile
	public $picture;
	public $caption;
	public $timestamp;


	public function insert()
	{
		
		$SQL = "INSERT INTO publication (profile_id, picture, caption) value (:profile_id, :picture, :caption)";
		$STH = $this->connection->prepare($SQL);

		//basically inserting the values into the database
		$data = ['profile_id'=>$this->profile_id,
					'picture'=>$this->picture,
					'caption'=>$this->caption];
		$STH->execute($data); 
		$this->publication_id = $this->connection->lastInsertId(); 

	}

	// - As a person or user, I can see a list of all publications, most recent first.
	public function getAll($user_id)
	{
		//order by timestamp desc to get the most recent published post
		$SQL = 'SELECT * FROM publication 
				ORDER BY `timestamp` DESC';

		$STH = $this->connection->prepare($SQL);

		$data = ['profile_id'=>$profile_id,
					'picture'=>$picture,
					'caption'=> $caption];

		$STH->execute($data); 
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Publication');
		return $STH->fetchAll();	//get all of the publications

	}

	// - As a person or user, I can search publications by caption, using search terms.
	public function search($search)
	{

		$SQL= 'SELECT * WHERE $search LIKE caption';

		$STH = $this->connection->prepare($SQL);

	}

	// - As a person or user, I can view other user profile pages.
	//public function 


	

}	