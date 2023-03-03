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
		
	}

	// - As a person or user, I can see a list of all publications, most recent first.
	public function getAllPublications()
	{
		//order by timestamp desc to get the most recent published post
		$SQL = 'SELECT * FROM publication 
				ORDER BY `timestamp` DESC';

		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Publication');
		return $STH->fetch();
	}

	// - As a person or user, I can search publications by caption, using search terms.
	public function search()
	{

	}

	// - As a person or user, I can view other user profile pages.
	public function 


	

}	