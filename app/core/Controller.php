<?php
namespace app\core;

class Controller{

	function view($name, $data = [])
	{

		include('app/view/' . $name . '.php')
	
	}
	
}