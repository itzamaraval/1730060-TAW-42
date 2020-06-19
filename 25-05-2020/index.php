<?php
ob_start();

// se muestran las vistas y se llaman los métodos

//Invocación a los métodos
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "models/crudProd.php";
require_once "models/categoria.php";
require_once "models/producto.php";
require_once "models/ventas.php";

//Controlador
//Creación de los objetos, que es la lógica del negocio
require_once "controllers/controller.php";
require_once "controllers/categoria.php";
require_once "controllers/producto.php";
require_once "controllers/ventas.php";


//muestra la función o método "página" que se encuentra en controllers/controller.php
$mvc = new MvcController();
$mvc->pagina();

?>