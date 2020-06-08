<?php

require_once "conexion.php";

//heredar la clase conexion.php para poder accesar y utilizar la conexión de base de datos, se extiende cuando se requiere manipular una función o método, en este caso manipularemos la función "conectar" de models/conexion.php
class Categoria extends Conexion{

	//REGISTRO DE CATEGORIAS

	public function registroCategoriaModel($datosModel, $tabla){

		#prepare() prepara la sentencia de sql para que sea ejecutada por el método POSStatmen. La sentencia de SQL se puede contener desde cero para ejecutar mas parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");


		//bindParam vincula una variable de PHP a un parametro de sustitución con nombre correspondiente a la sentencia sql

		$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);

		#Regresar una respuesta satisfactoria o no

		if($stmt->execute()){
			return "success";	
		}else{
			return "error";
		}

		$stmt->close();

	}


	#MODELO VISTA CATEGORIA
	public function vistaCategoriaModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociados al objeto PDO statment ($stmt)
		return $stmt->fetchAll();

		$stmt->close();
	}

	#MODELO EDITAR CATEGORIA
	public function editarCategoriaModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id,nombre FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
		$stmt->execute();
		
		//echo $datosModel;
		return $stmt->fetch();
		$stmt->close();

	}


	#MODELO ACTUALIZAR CATEGORIA
	public function actualizarCategoriaModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre WHERE id=:id");
		$stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
			$stmt->close();

	}

	#MODELO BORRAR CATEGORIA
	public function borrarCategoriaModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);

		if($stmt->execute()){
			return "sucess";
		}else{
			return "error";
		}

		$stmt->close();
	}


	}
?>