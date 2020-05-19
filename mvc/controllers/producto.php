<?php

class ProductoController{
	#Llamada a la Plantilla
	public function pagina(){
		include "views/template.php";
	}

	#ENLACES
	public function enlacesPaginasController(){
		if(isset($_GET['action'])){
			$enlaces = $_GET['action'];
		}else{
			$enlaces = 'index';
		}

		#Es el momento en que el controlador invoca al modelo llamado enlacesPaginasModel para que muestre el listado de páginas
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}
	
	#REGISTRO DE PRODUCTOS
	public function registroProductoController(){

		if(isset($_POST["nombreProductoRegistro"])){
			#Recibe a traves del método post el name(html) de usuario,contraseña y email, se almacenan los datos en una propiedad de tipo array asociativo con sus respectivas propiedades (usuario,contraseña, email).

			$datosController = array(
				"nombre"=>$_POST["nombreProductoRegistro"],
				"descripcion"=>$_POST["descripcionRegistro"],
				"precio_venta"=>$_POST["precio_ventaRegistro"],
				"precio_compra"=>$_POST["precio_compraRegistro"],
				"inventario"=>$_POST["inventarioRegistro"],
				"categoria_id"=>$_POST["categoria_id"]
			);


			#Se le dice al modelo models/crud.php (Producto::regostroUsuarioModel),que en modelo Datos el metodo registroUsuariosModel reciba en sus parametros los valores $datosController y el nombre de la tabla a la cual debe conectarse(usuarios)

			$respuesta = Producto::registroProductoModel($datosController,"productos");

			#Se imprime la respuesta en la vista

			if($respuesta== "success"){
				header("location:index.php?action=okProducto");
			} else{
				header("location:index.php");

			}

		}
	}

	public function obtenerSelectCategorias(){
		$respuesta = Categoria::vistaCategoriaModel("categorias");
		
		return $respuesta;
	}

	//VISTA DE PRODUCTOS
	public function vistaProductoController(){

		$respuesta=Producto::vistaProductoModel("productos");
		//Utilizar un foreach para poder iterar un array e imprimir la consulta del modelo

		foreach ($respuesta as $row => $item) {
			echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["precio_venta"].'</td>
					<td>'.$item["precio_compra"].'</td>
					<td>'.$item["inventario"].'</td>
					<td>'.$item["categoria"].'</td>
					<td><a href="index.php?action=editarProducto&id='.$item["id"].'"<button>Editar</button></a></td>
					<td><a href="index.php?action=productos&idBorrar='.$item["id"].'"<button>Borrar</button></a></td>
					</tr>';
		} 


	}
	
	#EDITAR PRODUCTO
	public function editarProductoController(){
		$datosController = $_GET["id"];
		//echo $datosController;

		$respuesta= Producto::editarProductoModel($datosController,"productos");
		$categorias = Categoria::vistaCategoriaModel("categorias");
		$select_categoria = "";

		// Recorrer todas la lista de categorias
		foreach ($categorias as $row => $item) {
			// Preseleccionar en el campo la categoria almacenada
			if($item["id"] == $respuesta["categoria_id"]){
				$select_categoria = $select_categoria.'<option value="'.$item["id"].'" selected>'.$item["nombre"].'</option>';	
			}else{
				$select_categoria = $select_categoria.'<option value="'.$item["id"].'">'.$item["nombre"].'</option>';
			}
			
		}

		#Diseñar la estructura de un formulario para que se muestren los datos de la consulta generada en el modelo
		
		echo '
			<input type="hidden"  value="'.$respuesta["id"].'" name="idEditar">
			
			<input type="text" placeholder="Nombre" name="nombreProductoEditar" value="'.$respuesta["nombre"].'" required>
			<textarea name="descripcionEditar" cols="30" rows="10" placeholder="Descripción...">'.$respuesta["descripcion"].'</textarea>
			<input type="text" type="number" placeholder="Precio venta" name="precio_ventaEditar" value="'.$respuesta["precio_venta"].'" required>
			<input type="text" type="number" placeholder="Precio compra" name="precio_compraEditar" value="'.$respuesta["precio_compra"].'" required>
			<input type="text" type="number" placeholder="Inventario" name="inventarioEditar" value="'.$respuesta["inventario"].'" required>
			<label>Categoria</label>
			<select name="categoria_id" id="">
			'.$select_categoria.'
			</select>

			<input type="submit" value="Guardar">

		';


	}

		#ACTUALIZAR PRODUCTO
		public function actualizarProductoController(){
			
			if(isset($_POST["idEditar"])){

				$datosController = array(
					"id"=>$_POST["idEditar"],
					"nombre"=>$_POST["nombreProductoEditar"],
					"descripcion"=>$_POST["descripcionEditar"],
					"precio_venta"=>$_POST["precio_ventaEditar"],
					"precio_compra"=>$_POST["precio_compraEditar"],
					"inventario"=>$_POST["inventarioEditar"],
					"categoria_id"=>$_POST["categoria_id"],
				);
				
				$respuesta=Producto::actualizarProductoModel($datosController,"productos");

			if($respuesta=="success"){
				//header("location:index.php?action=cambioCategoria");
				header("location:index.php?action=productos");
			}else{
				echo("error");
			
			}
			

		}

	}

	#BORRAR PRODUCTO 
	public function borrarProductoController(){
		if(isset($_GET["idBorrar"])){
			$datosController=$_GET["idBorrar"];
			$respuesta=Producto::borrarProductoModel($datosController,"productos");
			if($respuesta == "success"){
				header("location:index.php?action=productos");
			}
		}
	}


}



?>