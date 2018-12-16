<?php
// CRUD MVC // Cored developed by Carlos H Gonzalez N
	include_once 'config/Config.php';
	include_once 'methods/Controller.php';
	include_once 'methods/Router.php';
	
	if (!isset($_GET['pg'])) {
		$pg='start';
	}else{
		$pg = filter_input(INPUT_GET, 'pg', $filter = FILTER_SANITIZE_STRING);
	}

	$router = new Router();
	if($router->validGET($pg)){
		$router->chargeViews($pg);
	}

