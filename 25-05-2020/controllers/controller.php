<?php 

class MvcController{
	public function plantilla(){
		include "views/template.php";
	}

	public function enlacesPaginasController(){
		if (isset($_GET['action'])) {
			$enlaces = $_GET['action'];
		} else {
			$enlaces = 'index';
		}
		//Es el momento en que el controlador invoca el modelo enlacesPaginaModel para que muestre el listado de paginas
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	public function registroUsuarioController(){
		if (isset($_POST['usuarioRegistro'])) {
			// Recibe a través del método post el name (html) de usuario, password y email, se almacenan los datos en una variable o propiedad de tipo array asociativo con sus respectivas propiedades (usuario, password, email)

			$datosController = array("usuario" => $_POST["usuarioRegistro"],
									"password" => $_POST["passwordRegistro"],
									"email" => $_POST["emailRegistro"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuariosModel), que en modelo Datos el método registroUsuariosModel reciba en sus parametros los valores de $datosController y el nombre de la tabla de la base de datos a la cual debe de conectarse (usuarios)
			$respuesta = Datos::registroUsuariosModel($datosController, "usuarios");

			if ($respuesta == "success") {
				header("location:index.php?action=ok");
			} else {
				header("location:index.php");
			}
		}
	}

	public function ingresoUsuarioController(){
		if (isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {
			$datosController = array("usuario"=>$_POST["txtUsuario"],"password"=>$_POST["txtPassword"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			//Validar la respuesta modelo para ver si el usuario es correcto

			if ($respuesta["usuario"] == $_POST["usuarioIngreso"]  && password_verify($_POST["txtPassword"], $respuesta["contrasena"])) {
				session_start();
				$_SESSION["validar"] = true;
				$_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
				$_SESSION["id"] = $respuesta["id"];
				header("location:index.php?action=tablero");
				
			} else {
				header("location:index.php?action=fallo&res=fallo");
			}

		}
	}

	public function vistaUsuarioController(){
		$respuesta = Datos::vistaUsuarioModel();
		foreach ($respuesta as $row => $item) {
			echo '
				<tr>
					<td>
						<a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
					</td>
					<td>
						<a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Elimianr" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
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

	public function registrarUserController(){
		?>
		<div class="col-md-6 mt-3">
			<div class="card card-primary">
				<div class="card-header">
					<h4><b>Registro</b> de Usuarios</h4>
				</div>
			</div>
			<div class="clad-body">
				<form method="post" action="index.php?action=usuarios">
					<div class="form-group">
						<label for="nusuariostxt">Nombre</label>
						<input class="form-control" type="text" name="nusuariostxt" id="nusuariostxt" placeholder="Ingrese el nombre" required>
					</div>
					<div class="form-group">
						<label for="napellidoptxt">Apellido</label>
						<input class="form-control" type="text" name="napellidotxt" id="napellidotxt" placeholder="Ingrese el apellido" required>
					</div>
					<div class="form-group">
						<label for="napellidoptxt">Usuario</label>
						<input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el usuario" required>
					</div>
					<div class="form-group">
						<label for="napellidoptxt">Contraseña</label>
						<input class="form-control" type="password" name="ncontratxt" id="ncontratxt" placeholder="Ingrese la contraseña" required>
					</div>
					<div class="form-group">
						<label for="napellidoptxt">Correo electrónico</label>
						<input class="form-control" type="email" name="ncorreotxt" id="ncorreotxt" placeholder="Ingrese el correo" required>
					</div>
					<button class="btn btn-primary" type="submit">Agregar</button>
				</form>

			</div>
		</div>
		<?php
	}

	public function insertarUserController(){
		if (isset($_POST["nusuariotxt"])) {
			
			$_POST["ucontratxt"] = password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);

			$datosController = array("nusuario" => $_POST["nusuariotxt"], "ausuario" => $_POST["ausuariotxt"], "usuaio" => $_POST["usuariotxt"], "contra" => $_POST["ucontratxt"], "email" => $_POST["uemailtxt"]);

			$respuesta = Datos::insertaUserModel($datosController, "users");

			if ($respuesta == "success") {
				echo '
				<div class="col-md-6 mt-3">
					<div class="alert alert-succes alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
						<h5>
							<i class="icon fas fa-check"></i>
							Exito
						</h5>
						Usuario agregado con exito.
					</div>
				</div>
				';
			} else {
				echo '
				<div class="col-md-6 mt-3">
					<div class="alert alert-danger alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
						<h5>
							<i class="icon fas fa-ban"></i>
							Error!
						</h5>
						Se ha producido un error al momento de agregar al usuario, trate de nuevo
					</div>
				</div>
				';
			}
		}

		public function editarUserController(){
			$datosController = $_GET["idUserEditar"];

			$respuesta = Datos::editarUserModel
		}
		public function editarUserController() { 
			$datosController = $_GET["idUserEditar"]; 
			//envío de datos al mododelo 
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

		public function actualizarUsuarioController() {
			if (isset($_POST["nusuariotxtEditar"])) {
				$_POST["contratxtEditar"] = password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);

				$datosController = array("id" => $_POST["idUserEditar"], "nusuario" => $_POST["nusuariotxtEditar"], "ausuario" => $_POST["ausuariotxtEditar"], "usuario" =>$_POST["usuariotxtEditar"], "contra" => $_POST["contratxtEditar"], "email" => $_POST["uemailtxtEditar"]);

				$respuesta = Datos::actualizarUsuarioModel();

				if ($respuesta == "success") {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-succes alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								Exito
							</h5>
							Usuario editado con exito.
						</div>
					</div>
					';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-ban"></i>
								Error!
							</h5>
							Se ha producido un error al momento de editar al usuario, trate de nuevo
						</div>
					</div>
					';
				}

			}
		}

		public function eliminarUsuarioController() {
			if (isset($_GET["idBorrar"])) {
				$datosController = $_GET["idBorrar"];

				$respuesta = Datos::eliminarUserModel($datosController, "users");

				if ($respuesta == "sucess") {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-succes alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-check"></i>
								Exito
							</h5>
							Usuario editado con exito.
						</div>
					</div>
					';
				} else {
					echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
							<h5>
								<i class="icon fas fa-ban"></i>
								Error!
							</h5>
							Se ha producido un error al momento de eliminar al usuario, trate de nuevo
						</div>
					</div>
					';
				}
			}
		}

	}
}

?>