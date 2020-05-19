<?php

class CategoriaController{
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

	#REGISTRO DE CATEGORIAS
	public function registroCategoriaController(){

		if(isset($_POST["categoriaRegistro"])){
			#Recibe a traves del método post el name(html) de usuario,contraseña y email, se almacenan los datos en una propiedad de tipo array asociativo con sus respectivas propiedades (usuario,contraseña, email).

			$datosController = array("nombre"=>$_POST["categoriaRegistro"]);


			#Se le dice al modelo models/crud.php (Categoria::regostroUsuarioModel),que en modelo Datos el metodo registroUsuariosModel reciba en sus parametros los valores $datosController y el nombre de la tabla a la cual debe conectarse(usuarios)

			$respuesta = Categoria::registroCategoriaModel($datosController,"categorias");

			#Se imprime la respuesta en la vista

			if($respuesta== "success"){
				header("location:index.php?action=okCategoria");
			} else{
				header("location:index.php");

			}

		}
	}


	//VISTA DE CATEGORIAS
	public function vistaCategoriaController(){

		$respuesta=Categoria::vistaCategoriaModel("categorias");
		//Utilizar un foreach para poder iterar un array e imprimir la consulta del modelo

		foreach ($respuesta as $row => $item) {
			echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td><a href="index.php?action=editarCategoria&id='.$item["id"].'"<button>Editar</button></a></td>
					<td><a href="index.php?action=categorias&idBorrar='.$item["id"].'"<button>Borrar</button></a></td>
					</tr>';
			} 


	}
		#EDITAR CATEGORIA
	public function editarCateogoriaController(){
		$datosController = $_GET["id"];
		//echo $datosController;

		$respuesta= Categoria::editarCategoriaModel($datosController,"categorias");

		#Diseñar la estructura de un formulario para que se muestren los datos de la consulta generada en el modelo

		echo ' <input type="hidden"  value="'.$respuesta["id"].'" name="idEditar">

				<input type="text" value="'.$respuesta["nombre"].'" name="categoriaEditar" required >

				<input type="submit" value="Guardar">

		';


	}

		#ACTUALIZAR CATEGORIA
		public function actualizarCategoriaController(){
			
			if(isset($_POST["idEditar"])){

				$datosController = array("id"=>$_POST["idEditar"],
											"nombre"=>$_POST["categoriaEditar"]
										);
				$respuesta=Categoria::actualizarCategoriaModel($datosController,"categorias");

			if($respuesta=="success"){
				//header("location:index.php?action=cambioCategoria");
				header("location:index.php?action=categorias");
			}else{
				echo("error");
			
			}
			

		}

	}

	#BORRAR CATEGORIA 
	public function borrarCategoriaController(){
		if(isset($_GET["idBorrar"])){
			$datosController=$_GET["idBorrar"];
			$respuesta=Categoria::borrarCategoriaModel($datosController,"categorias");
			if($respuesta == "success"){
				header("location:index.php?action=categorias");
			}
		}
	}


}



?>