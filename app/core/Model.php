<?php 
namespace app\core;

class Model{
	public $connection;
	public function __construct(){

		$host = 'localhost';
		$dbname = 'assignmenttwo';
		$user = 'root';
		$pass = '';
		try {
			# MySQL with PDO_MYSQL
			// $DBH = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$this->connection = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		}
		catch(PDOException $e) {
		 	echo $e->getMessage();
		}

	}
}