<?php 

	ob_start();

	require_once("controllers/controller.php");
	require_once("models/enlaces.php");
	require_once("models/crud.php");

	$mvc = new MvcController();
	$mvc -> plantilla();

?>