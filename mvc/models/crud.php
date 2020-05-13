<?php 
require_once "conexion.php";

//Heredar la clase conexion.php para poder accesar y utilizar la conexion a la base de datos, se extiende cuando se requiere manipular una función o método, en este caso manipularemos la función "conectar" de models/conexion.php

class ClassName extends Conexion{
	
	public function registroUsuarioModel($datosModel, $tabla){
		//prepare() Prepara la sentencia de SQL para que sea ejecutada por el método POStantement. La sentencia SQL se puede cotener desde 0 para ejecutar con parámetros

		$stmt = Conexion::conectar()->prepare"INSERT INTO $tabla (usuario, password, email) VALUES (:usuario, :password, :email)");

		//bindParam() vincula una variable de PHP a un parámetro de sustitución con nombre correspondiente a la sentencia sql que fue usada para la sentencia

		$stmt-bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt-bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt-bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "succes";
		} else {
			return "error";
		}

		$stmt->close();
	}
}

 ?>