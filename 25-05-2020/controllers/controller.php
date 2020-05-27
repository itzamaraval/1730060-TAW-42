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
		//$respuesta = Datos::
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


	public function editarUserController() { $datosController = $_GET["idUserEditar"]; //envío de datos al mododelo $respuesta = Datos::editarUserModel($datosController,"users"); ?> <div class="col-md-6 mt-3"> <div class="card card-warning"> <div class="card-header"> <h4><b>Editor</b> de Usuarios</h4> </div> <div class="card-body"> <form method="post" action="index.php?action=usuarios"> <div class="form-group"> <input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required> </div>08:32
		<div class="form-group"> <label for="nusuariotxtEditar">Nombre: </label> <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required> </div> <div class="form-group"> <label for="ausuariotxtEditar">Apellido: </label> <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required> </div>08:33
		<div class="form-group"> <label for="usuariotxtEditar">Usuario: </label> <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required> </div> <div class="form-group"> <label for="contratxtEditar">Contraseña: </label> <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required> </div>08:33
		<div class="form-group"> <label for="uemailtxtEditar">Correo Electrónico: </label> <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required> </div> <button class="btn btn-primary" type="submit">Editar</button> </form> </div>08:33
		</div> </div> <?php }


}

?>
