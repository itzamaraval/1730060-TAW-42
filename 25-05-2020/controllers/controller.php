<?php

	class MvcController{
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

		#REGISTRO DE USUARIOS
		public function registroUsuarioController(){

			if(isset($_POST["usuarioRegistro"])){
				#Recibe a traves del método post el name(html) de usuario,contraseña y email, se almacenan los datos en una propiedad de tipo array asociativo con sus respectivas propiedades (usuario,contraseña, email).

				$datosController = array("usuario"=>$_POST["usuarioRegistro"],"password"=>$_POST["passwordRegistro"],"email"=>$_POST["emailRegistro"]);


				#Se le dice al modelo models/crud.php (Datos::regostroUsuarioModel),que en modelo Datos el metodo registroUsuariosModel reciba en sus parametros los valores $datosController y el nombre de la tabla a la cual debe conectarse(usuarios)

				$respuesta = Datos::registroUsuariosModel($datosController,"usuarios");

				#Se imprime la respuesta en la vista

				if($respuesta== "success"){
					header("location:index.php?action=ok");
				} else{
					header("location:index.php");

				}

			}
		}

		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){

				$datosController=array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);

				$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

				//Validar la respuesta del modelo para ver si es  un usuario correcto
				if($respuesta["usuario"]==$_POST["usuarioIngreso"]&& $respuesta["password"]== $_POST["passwordIngreso"]){
					session_start();
					$_SESSION["validar"]=true;
					header("location:index.php?action=usuarios");
				}else{
					header("location:index.php?action=fallo");
				}


			}
		}

		//VISTA DE USUARIOS
		public function vistaUsuariosController(){

			$respuesta=Datos::vistaUsuarioModel("usuarios");
			//Utilizar un foreach para poder iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
			 	echo '<tr>
			 		  <td>'.$item["usuario"].'</td>
			 		  <td>'.$item["password"].'</td>
			 		  <td>'.$item["email"].'</td>
			 		  <td><a href="index.php?action=editar&id='.$item["id"].'" class="btn btn-secondary btn-sm">Editar</a></td>
			 		  <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm">Borrar</a></td>
				 	  </tr>';
			 } 


		}
			#EDITAR USUARIO
		public function editarUsuarioController(){
			$datosController = $_GET["id"];
			//echo $datosController;

			$respuesta= Datos::editarUsuarioModel($datosController,"usuarios");

			#Diseñar la estructura de un formulario para que se muestren los datos de la consulta generada en el modelo

			echo '
				<input type="hidden"  value="'.$respuesta["id"].'" name="idEditar">
				
				<label>Usuario</label>
				<input type="text" class="form-control" value="'.$respuesta["usuario"].'" name="usuarioEditar" required >

				<label>Contraseña</label>
				<input type="text" class="form-control" value="'.$respuesta["password"].'" name="passwordEditar" required>
				
				<label>Correo electrónico</label>
				<input type="text" class="form-control" value="'.$respuesta["email"].'" name="emailEditar" required>

			';


		}

			#ACTUALIZAR USUARIO
			public function actualizarUsuarioController(){
				echo "ENTRA ACTUALIZAR";
				if(isset($_POST["idEditar"])){
					echo "ENTRA POST";

					$datosController = array("id"=>$_POST["idEditar"],
										      "usuario"=>$_POST["usuarioEditar"],
										      "password"=>$_POST["passwordEditar"],
											  "email"=>$_POST["emailEditar"]);
					$respuesta=Datos::actualizarUsuarioModel($datosController,"usuarios");

				if($respuesta=="success"){
					header("location:index.php?action=cambio");
				}else{
					echo("error");
				
				}
				

			}

		}

		#BORRAR USUARIO 
		public function borrarUsuarioController(){
			if(isset($_GET["idBorrar"])){
				$datosController=$_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");
				if($respuesta == "success"){
					header("location:index.php?action=usuarios");
				}
			}
		}


		# FUNCION DEL CONTROLADOR PARA CONTAR EN EL TABLERO
		public function contarTablero($tabla){
			$respuesta = Datos::contarTablero($tabla);
			return $respuesta;
		}

	}



?>