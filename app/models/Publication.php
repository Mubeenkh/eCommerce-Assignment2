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

}	