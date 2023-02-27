<?php
namespace app\models;

class Follow extends \app\core\models{
	// [follower_id (FK to profile), followed_id (FK to profile)](Composite PK), timestamp.


	public $follower_id;	//FK to profile (PK)
	public $followed_id;	//FK to profile (PK)
	public $timestamp;

}