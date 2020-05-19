<?php

require_once "conexion.php";

//heredar la clase conexion.php para poder accesar y utilizar la conexión de base de datos, se extiende cuando se requiere manipular una función o método, en este caso manipularemos la función "conectar" de models/conexion.php
class Producto extends Conexion{

	//REGISTRO DE CATEGORIAS

	public function registroProductoModel($datosModel, $tabla){

		#prepare() prepara la sentencia de sql para que sea ejecutada por el método POSStatmen. La sentencia de SQL se puede contener desde cero para ejecutar mas parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descripcion,precio_venta,precio_compra,inventario,categoria_id) VALUES (:nombre,:descripcion,:precio_venta,:precio_compra,:inventario,:categoria_id)");


		//bindParam vincula una variable de PHP a un parametro de sustitución con nombre correspondiente a la sentencia sql

		$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta",$datosModel["precio_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra",$datosModel["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":inventario",$datosModel["inventario"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria_id",$datosModel["categoria_id"], PDO::PARAM_STR);

		#Regresar una respuesta satisfactoria o no

		if($stmt->execute()){
			return "success";	
		}else{
			return "error";
		}

		$stmt->close();

	}


	#MODELO VISTA CATEGORIA
	public function vistaProductoModel($tabla){
		$stmt=Conexion::conectar()->prepare("SELECT p.id,p.nombre,p.precio_venta,p.precio_compra,p.inventario,c.nombre AS categoria FROM $tabla AS p INNER JOIN categorias AS c ON c.id=p.categoria_id");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociados al objeto PDO statment ($stmt)
		return $stmt->fetchAll();

		$stmt->close();
	}

	#MODELO EDITAR CATEGORIA
	public function editarProductoModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("SELECT id,nombre,descripcion,precio_venta,precio_compra,inventario,categoria_id FROM $tabla WHERE id=:id");
		$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
		$stmt->execute();
		
		//echo $datosModel;
		return $stmt->fetch();
		$stmt->close();

	}


	#MODELO ACTUALIZAR CATEGORIA
	public function actualizarProductoModel($datosModel,$tabla){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,descripcion=:descripcion,precio_venta=:precio_venta,precio_compra=:precio_compra,inventario=:inventario,categoria_id=:categoria_id WHERE id=:id");
		$stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datosModel["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta",$datosModel["precio_venta"],PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra",$datosModel["precio_compra"],PDO::PARAM_STR);
		$stmt->bindParam(":inventario",$datosModel["inventario"],PDO::PARAM_STR);
		$stmt->bindParam(":categoria_id",$datosModel["categoria_id"],PDO::PARAM_STR);

		$stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
			$stmt->close();

	}

	#MODELO BORRAR CATEGORIA
	public function borrarProductoModel($datosModel,$tabla){
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