<?php 

class MvcController{
	public function pagina(){
		include "views/template";
	}

	public function enlacesPaginaController(){
		if (isset($_GET['action'])) {
			$enlaces = $_GET['action'];
		} else {
			$enlaces = 'index';
		}
		//Es el momento en que el controlador invoca el modelo enlacesPaginaModel para que muestre el listado de paginas
		$respuesta = Paginas::enlacesPaginaModel('enlaces');
		include $respuesta;
	}
//registro usuarios
	public function regristroUsuarioController(){
		if (isset($_POST["usuarioRegistro"])) {
			// Recibe a través del método post el name (html) de usuario, password y email, se almacenan los datos en una variable o propiedad de tipo array asociativo con sus respectivas propiedades (usuario, password, email)

			$datosController = array("usuario" => $_POST["usuarioRegistro"],
									"password" => $_POST["passwordRegistro"],
									"email" => $_POST["emailRegistro"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuariosModel), que en modelo Datos el método registroUsuariosModel reciba en sus parametros los valores de $datosController y el nombre de la tabla de la base de datos a la cual debe de conectarse (usuarios)
			$respuesta = Datos::registroUsuariosModel($datosController, "usuarios");

			if ($respuesta == "success"){
				header("location:index.php?action=ok");
			} else {
				header("location:index.php");
			}
		}
	}

	//ingreso usuarrios
	public function ingresoUsuarioController(){
		if(isset($_POST["usuarioIngreso"])){
			$datosController=array ("usuario"=>$_POST["usuarioIngreso", 
									"password"=>$_POST["passwordIngreso"]);
			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

			//validar la respuesta del modelo para ver si es un usuario correcto
			if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]){
				session_start();
				$_SESSION["validar"]=true;
				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}

	//vista de usuarios
	public function vistaUsuariosController(){
		$respuesta = Datos::vistaUsuarioModel("usuarios");
		//usar foreach para iterar un array e imprimir la consulta del modelo
		foreach($respuesta as $row => $item){
			echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].
				'"<button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].
				'"<button>Borrar</button></a></td>
				</tr>';
		}
	}

}

 ?>