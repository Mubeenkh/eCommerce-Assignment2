<?php
namespace app\core;

class App
{
	
	function __construct()
	{	

		$request = $this->parseURL($_GET['url'] ?? '');

		$controller = 'User';
		$method = 'index';
		$params = [];

		if(file_exists('app/controllers/'.$request[0] .'.php')) 
		{

			$controller = $request[0];
			unset($request[0]); 

		}

		$controller = 'app\\controllers\\' . $controller;  
		$controller = new $controller; 						
		
		if(isset($request[1]) && method_exists($controller, $request[1]))
		{
			$method = $request[1];
			unset($request[1]);
		}
		
		$params = array_values($request);   //array_values(
		call_user_func_array([$controller, $method], $params);
	}

	function parseURL($url)
	{
		return explode('/', trim($url,'/'));
	}
}