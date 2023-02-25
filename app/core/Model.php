<?php
namespace app\core;

class Model{
	
	public $connection;
	
	public function __construct(){

		$host = 'localhost';
		$dbname = 'assignmenttwo';
		$user = 'root';
		$pass = '';
		try{

			$this->connection = new \PDO("mysql:host=$host;dname=$dname",$user,$pass);

		}
		catch(PDOExeption $e) {
			echo $e->getMessage();
		}

	}

}