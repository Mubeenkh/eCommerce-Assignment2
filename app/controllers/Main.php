<?php 
namespace app\controllers;
//name of this controller is Main,we wanna make sure Main calls the view class
// which is why we extends Controller
class Main extends \app\core\Controller{ 
	
	public function index(){

		$publication = new \app\models\Publication();
		$publications = $publication->getAll();
		$this->view('Main/index', $publications);

	}

}