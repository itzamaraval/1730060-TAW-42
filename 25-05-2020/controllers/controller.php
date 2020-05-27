<?php
/*Clase para crear los controles que utilizara el usuario mientras navega en el sitio web
*/
class MvcController{
		/*Metodo funcion que sirve para devolver la estructura base del sistema*/
		public function plantilla(){
			include "views/template.php";
		}
		/*METODO/FUNCION que sirve para mostrarle al usuario la plantilla correspondiente a la accion que ha seleccionado*/
		public function enlacesPaginasController(){
			if(isset($_GET['action'])){
				$enlacesController = $_GET['action'];
			}else{
				$enlacesController = "index";
			}
			$respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
			include $respuesta;
		}
//CONTROLES PARA LOS USUARIOS
		/*Este controller a partir de la funcion password_verify compara por hash la contraseña ingresada con la que esta en la base de datos si es correcta guarda en el arreglo sesion los datos del usuario y manda al inventario o marcara mensaje de error */
		public function ingresoUsuarioController(){
			if(isset($_POST["txtUser"])&&isset($_POST["txtPassword"])){
				//Guardar en el array los valores de los text de la vista (usuario  y contraseña)
				$datosController=array("user"=>$_POST["txtUser"],"password"=>$_POST["txtPassword"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController,"users");
				//Validar la respuesta del modelo para ver si es  un usuario correcto
				//RESPUESTA DEL MODELO
				if($respuesta["usuario"]==$_POST["txtUser"]&& password_verify($_POST["txtPassword"],$respuesta["contraseña"])){
					session_start();
					$_SESSION["validar"]=true;
					$_SESSION["nombre_usuario"]=$respuesta["nombre_usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("location:index.php?action=tablero");
				}else{
					header("location:index.php?action=fallo&res=fallo");
				}
			}
		}
/*Controlador para cargar todos los datos de los usuarios, la contraseña no se puede cargar debido a que independientemente de si se muestra o no, esta encriptada*/
		public function vistaUsersController(){
			$respuesta=Datos::vistaUsersModel("users");
			foreach ($respuesta as $row => $item) {
				echo '
				<tr>
					<td>
						<a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
					</td>
					<td>
						<a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
					</td>
					<td>'.$item["firstname"].'</td>
					<td>'.$item["lastname"].'</td>
					<td>'.$item["user_name"].'</td>
					<td>'.$item["user_email"].'</td>
					<td>'.$item["date_added"].'</td>
				</tr>
				';
			}
		}
#ESTE CONTROLADOR MOSTRARA EL FORMULARIO DE REGISTRO
		public function registrarUserController(){
			?>
			<div class="col-md-6 mt-3">
		    	<div class="card card-primary">
		    		<div class="card-header">
		    			<h4><b>Registro</b> de Usuarios</h4>
		    		</div>
		    		<div class="card-body">
		    			<form method="post" action="index.php?action=usuarios">
		    				<div class="form-group">
		    					<label for="nusuariotxt">Nombre</label>
		    					<input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required="">
		    				</div>
		    				<div class="form-group">
		    					<label for="ausuariotxt">Apellido</label>
		    					<input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el Apellido" required="">
		    				</div>
		    				<div class="form-group">
		    					<label for="usuariotxt">Usuario</label>
		    					<input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el usuario" required="">
		    				</div>

		    				<div class="form-group">
		    					<label for="ucontratxt">Contraseña</label>
		    					<input class="form-control" type="text" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required="">
		    				</div>
		    				<div class="form-group">
		    					<label for="uemailtxt">Correo Electrónico</label>
		    					<input class="form-control" type="text" name="uemailtxt" id="uemailtxt" placeholder="Ingrese el correo electrónico" required="">
		    				</div>
		    				<button class="btn btn-primary" type="submit">AGREGAR</button>
		    			</form>
		    		</div>

		    	</div>
		    </div>
		   <?php

		}


		public function insertarUserController(){
			if(isset($_POST["nusuariotxt"])){

				$_POST["ucontratxt"]=password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);


				$datosController = array("nusuario"=>$_POST["nusuariostxt"],"ausuariotxt"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"]);

				$respuesta=Datos::insertarUserModel($datosController,"users");

				if($respuesta=="success"){
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success" alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									EXITO
								</h5>
								Usuario agregado con exito.
							</div>
						</div>
					';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger" alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									ERROR
								</h5>
								Se ha producido un error al momento de agregar el usuario, trate de nuevo.
							</div>
						</div>

						';
				}
			}
		}


	public function editarUserController() { 
		$datosController = $_GET["idUserEditar"]; //envío de datos al mododelo 

		$respuesta = Datos::editarUserModel($datosController,"users");

		 ?> 
		 <div class="col-md-6 mt-3">
		   <div class="card card-warning"> 
		   		<div class="card-header">
		   			 <h4><b>Editor</b> de Usuarios</h4> 
		   		</div>
		   	<div class="card-body"> 
		   		<form method="post" action="index.php?action=usuarios">
		   			 <div class="form-group"> 
		   			 	<input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required> 
		   			 </div>

			<div class="form-group"> 
				<label for="nusuariotxtEditar">Nombre: </label> 
					<input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required> 
			</div>

			<div class="form-group"> 
				<label for="ausuariotxtEditar">Apellido: </label>
					 <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required> 
			</div>
			<div class="form-group"> 
				<label for="usuariotxtEditar">Usuario: </label>
					 <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required> 
			</div>

			<div class="form-group"> 
				<label for="contratxtEditar">Contraseña: </label> 
					<input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required> 
			</div>

			<div class="form-group">
				 <label for="uemailtxtEditar">Correo Electrónico: </label> 
				 	<input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required> 
			</div> 
				<button class="btn btn-primary" type="submit">Editar</button>
		</form> 
			</div>
		</div> 
	</div> 

	<?php 
	}


	public function actualizarUserController(){
		if(isset($_POST["nusuariotxtEditar"])){

				$_POST["contratxtEditar"]=password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);


				$datosController = array("id"=>$_POST["idUserEditar"],"nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST["ausuariotxtEditar"],"Usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["contratxtEditar"],"email"=>$_POST["uemailtxtEditar"]);

				$respuesta=Datos::actualizarUserModel($datosController,"users");

				if($respuesta=="success"){
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success" alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									EXITO
								</h5>
								Usuario editado con exito.
							</div>
						</div>
					';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger" alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									ERROR
								</h5>
								Se ha producido un error al momento de editar el usuario, trate de nuevo.
							</div>
						</div>

						';
				}
			}
		}



	

	}

 

?>