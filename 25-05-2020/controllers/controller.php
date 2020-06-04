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
			if(isset($_POST["txtUser"]) && isset($_POST["txtPassword"])){
				//Guardar en el array los valores de los text de la vista (usuario  y contraseña)
				$datosController = array("user"=>$_POST["txtUser"],"password"=>$_POST["txtPassword"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController,"users");
				//Validar la respuesta del modelo para ver si es  un usuario correcto
				//RESPUESTA DEL MODELO
				if($respuesta["usuario"]==$_POST["txtUser"] && password_verify($_POST["txtPassword"],$respuesta["contraseña"])){
					session_start();
					$_SESSION["validar"]=true;
					$_SESSION["nombre_usuario"]=$respuesta["nombre_usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("Location:index.php?action=tablero");
				}else{
					header("Location:index.php?action=fallo&res=fallo");
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

		/*Este controlador se encarga de mostrar el formulario al usuario para registrarse*/
		public function registrarUserController(){
			?>
				<div class="col-md-6 mt-3">
					<div class="card card-primary">
						<div class="card-header">
							<h4><b>Registro</b></h4>
						</div>
						<div class="card-body">
							<form method="post" action="index.php?action=usuarios">
								<div class="form-group">
									<label for="nusuariotxt">Nombre:</label>
									<input class="form-control" type="text" name="nusuariotxt" id="nusuariotxt" placeholder="Ingrese el nombre" required>
								</div>
								
								<div class="form-group">
									<label for="ausuariotxt">Apellido:</label>
									<input class="form-control" type="text" name="ausuariotxt" id="ausuariotxt" placeholder="Ingrese el apellido" required>
								</div>

								<div class="form-group">
									<label for="usuariotxt">Usuario:</label>
									<input class="form-control" type="text" name="usuariotxt" id="usuariotxt" placeholder="Ingrese el usuario" required>
								</div>

								<div class="form-group">
									<label for="ucontratxt">Contraseña:</label>
									<input class="form-control" type="password" name="ucontratxt" id="ucontratxt" placeholder="Ingrese la contraseña" required>
								</div>

								<div class="form-group">
									<label for="uemailtxt">Correo Electronico:</label>
									<input class="form-control" type="email" name="uemailtxt" id="uemailtxt" placeholder="Ingrese el correo electronico" required>
								</div>
								<button class="btn btn-primary" type="submit">Agregar</button>

							</form>
						</div>
					</div>
				</div>
				<?php
		}
/*Este controlador sirve para insertar el usuario que se acaba de ingresar y notifica si se realizo dicha actividad o si hubo algun error, en el caso de la contraseña, primero que nada se tendra ue encriptar mediante el algoritmo hash y la funcion password_hash y se guarda para posteriormente realizar la inserccion*/
				public function insertarUserController(){
					if(isset($_POST["nusuariotxt"])){
						//encriptar la contraseña
						$_POST["ucontratxt"]=password_hash($_POST["ucontratxt"], PASSWORD_DEFAULT);
						//Alamacenar en un array los valores de los text del metodo "registrarUserController"
						$datosController= array("nusuario"=>$_POST["nusuariotxt"], "ausuario"=>$_POST["ausuariotxt"], "usuario"=>$_POST["usuariotxt"], "contra"=>$_POST["ucontratxt"], "email"=>$_POST["uemailtxt"]);
						//Se envia los datos al modelo
						$respuesta=Datos::insertarUserModel($datosController, "users");
						//Respuesta del Modelo
						if($respuesta =="success"){
							echo '
								<div class="col-md-6 mt-3">
                            		<div class="alert alert-success alert-dismissible">
                                		<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                		<h5>
                                    		<i class="icon fas fa-check"></i>
                                    		¡Éxito!
                                		</h5>
                                		Usuario agregado con éxito.
                            		</div>
                        		</div>
							';
						}else{
							echo '
								<div class="col-md-6 mt-3">
									<div class="alert alert-danger alert-dismissible">
										<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
										<h5>
											<i class="icon fas fa-ban"></i>
											¡Error!
										</h5>
										Se ha producido un error al momento de agregar el usuario, trate de nuevo.
									</div>
								</div>
							';
						}
					}
				}
/*Este controlador se encarga de mostrar el formulario al usuario para editar sus datos la contraseña no se carga debido a que como esta encriptada, no es optimo mostrarle al usuario su contraseña como una cadena de caracteres y se deja en blano, pero se verifica al momento de hacer una modificacion que haya ingresado una contraseña, si no es el caso entonces no se podra ejecutar la modificacion y cada que se quiere hacer una modificacion a un determinado usuario, se debera ingresar tambien una nueva contraseña*/

		public function editarUserController() {
            $datosController = $_GET["idUserEditar"];
            //envío de datos al modelo
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
/*Este controlador sirve para actualizar el usuario que se acaba de ingresar y notifica si se realizo dicha actividad o si hubo algun error */
        public function actualizarUserController(){
		if(isset($_POST["nusuariotxtEditar"])){
				$_POST["contratxtEditar"]=password_hash($_POST["contratxtEditar"], PASSWORD_DEFAULT);
				$datosController = array("id"=>$_POST["idUserEditar"],"nusuario"=>$_POST["nusuariotxtEditar"],"ausuario"=>$_POST["ausuariotxtEditar"],"usuario"=>$_POST["usuariotxtEditar"],"contra"=>$_POST["contratxtEditar"],"email"=>$_POST["uemailtxtEditar"]);
				//Enviar datos al modelo
				$respuesta=Datos::actualizarUserModel($datosController,"users");
				if($respuesta=="success"){
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									¡Exito!
								</h5>
								Usuario editado con exito.
							</div>
						</div>
					';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de editar el usuario, trate de nuevo.
							</div>
						</div>
					';
				}
			}
		}
/*Este controlador sirve para eliminar el usuario que se acaba de ingresar y notifica si se realizo dicho actividad o si hubo algun error*/
        public function eliminarUserController(){
        	if(isset($_GET["idBorrar"])){
        		$datosController=$_GET["idBorrar"];
        		
        		//Manda parametros al modelo
        		$respuesta=Datos::eliminarUserModel($datosController,"users");
        		//Se recibe respuesta del modelo
        		if($respuesta=="success"){
        			echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									¡Exito!
								</h5>
								Usuario eliminado con exito.
							</div>
						</div>
					';
       			}else{
       				echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de eliminar el usuario, trate de nuevo.
							</div>
						</div>
					';
       			}
        	}
        }
//CONTROLADORES PARA LOS PRODUCTOS
        //Este controlador permite mostrar de un foreach y un modelo una tabla donde se muestran los productos que contiene la tabla de productos 
        public function vistaProductsController(){
        	$respuesta=Datos::vistaProductsModel("products");
        	foreach ($respuesta as $row => $item) {
        		echo '
        			<tr>
        				<td>
        					<a href="index.php?action=inventario&idProductEditar='.$item["id"].'" class=btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
        			</td>

        			<td>
        				<a href="index.php?action=inventario&idBorrar='.$item["id"].'" class="btn btn-danger btn-sm btn-icon"
        				title="Eliminar" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
        			</td>

        			<td>'.$item["id"].'</td>
        			<td>'.$item["codigo"].'</td>
        			<td>'.$item["producto"].'</td>
        			<td>'.$item["fecha"].'</td>
        			<td>'.$item["precio"].'</td>
        			<td>'.$item["stock"].'</td>
        			<td>'.$item["categoria"].'</td>
        			<td>
        				<a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn btn-warning btn-sm btn-icon"
        				title="Agregar Stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
        			</td>

        			<td>
        				<a href="index.php?action=inventario&idProductDel='.$item["id"].'" class="btn btn-warning btn-sm btn-icon"
        				title="Quitar de Stock" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
        			</td> </td>
        		</tr>
        		';
        		# code...
        	}
        }

        //esta funcion permite llamar al formulario que mandara a traves del metodo post, controlador y el modelo insertara dicho producto
        public function registroProductController(){
        	//se cierra el php 
        	?>
        	<div class="col-md-6 mt-3">
        		<div class="card card-primary">
        			<div class="card-header">
        				<h4><b>Registro</b>de Productos</h4>
        			</div>
        			<div class="card-body">
        				<form method="post" action="index.php?action=inventario">
        					<div class="form-group">
        						<label for="codigotxt">Codigo:</label>
        						<input class="form-control" name="codigotxt" id="codigotxt" type="text" required placeholder="Codigo del producto">
        					</div>

        					<div class="form-group">
        						<label for="nombretxt">Nombre:</label>
        						<input class="form-control" name="nombretxt" id="nombretxt" type="text" required placeholder="Nombre del producto">
        					</div>

        					<div class="form-group">
        						<label for="preciotxt">Precio:</label>
        						<input class="form-control" name="preciotxt" id="preciotxt" type="number" min="1" required placeholder="Precio del producto">
        					</div>

        					<div class="form-group">
        						<label for="ucontratxt">Stock:</label><!--DUDA-->
        						<input class="form-control" name="stocktxt" id="stocktxt" type="number" min="1" required placeholder="Cantidad de stock del producto">
        					</div>

        					<div class="form-group">
        						<label for="referenciatxt">Motivo:</label><!--DUDA-->
        						<input class="form-control" name="referenciatxt" id="referenciatxt" type="text" required placeholder="Referencia del producto">
        					</div>

        					<div class="form-group">
        						<label for="uemailtxt">Categoria:</label><!--DUDA-->
        						<select name="categoria" id="categoria" class="form-control">
        							<?php
        								$respuesta_categoria=Datos::obtenerCategoryModel("categories");
        								foreach ($respuesta_categoria as $row => $item) {
        							?>
        									<option value="<?php echo $item ["id"]; ?>"><?php echo $item ["categoria"]; ?></option>
        							<?php
        								}
        							?>
        						</select>
        					</div>
        					<button class="btn btn-primary" type="submit">Agregar</button>
        				</form>
        			</div>
        		</div>
        	</div>
        	<?php //se abre el php
        }

        /*-- Esta funcion permite insertar productos llamando al modelo  que se encuentra en  elarchivo crud de modelos confirma con un isset que la caja de texto del codigo este llena y procede a llenar en una variable llamada datos controller este arreglo se manda como parametro aligual que elnombre de la tabla,una vez se obtiene una respuesta de la funcion del modelo de inserccion 
        tenemos que checar si la respuesta fue afirmativa hubo un error y mostrara los respectivas alerta,para insertar datos en la tabla de historial se tiene que mandar a un modelollamado ultimoproductmodel este traera el ultimo dato insertado que es el id del producto que se manda en elarray de datoscontroller2 junto al nombre de la tabla asi insertando los datos en la tabla historial --*/
        public function insertarProductController(){
        	if(isset($_POST["codigotxt"])){
        		$datosController=array("codigo"=>$_POST["codigotxt"], "precio"=>$_POST["preciotxt"], "stock"=>$_POST["stocktxt"], "categoria"=>$_POST["categoria"], "nombre"=>$_POST["nombretxt"]); 
        		$respuesta=Datos::insertarProductsModel($datosController, "products");
        		if ($respuesta=="success"){
        			$respuesta3=Datos::ultimoProductsModel("products");
        			$datosController2=array("user"=>$_SESSION["id"], "cantidad"=>$_POST["stocktxt"], "producto"=>$respuesta3["id"], "note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxt"]);
        			$respuesta2 =Datos::insertarHistorialModel($datosController2, "historial");
        			echo '
						<div class="col-md-6 mt-3">
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                	<h5>
                                    	<i class="icon fas fa-check"></i>
                                    		¡Éxito!
                                	</h5>
                                	Producto agregado con éxito.
                            </div>
                        </div>
							';
						}else{
							echo '
								<div class="col-md-6 mt-3">
									<div class="alert alert-danger alert-dismissible">
										<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
										<h5>
											<i class="icon fas fa-ban"></i>
											¡Error!
										</h5>
										Se ha producido un error al momento de agregar el producto, trate de nuevo.
									</div>
								</div>
        					';
        				}
        			}
        		}
        //Esta funcion permite editar los datos de la tabla productos seleccionado del boton editar abre un formulario llenando la informacion correspondiente y empezando a editar dichos campos a partir de los formularios el array de datos solo guarda el get del boton editar que en este caso es el id del producto y se envia el modelo de ediccion y se pasa por el metodo form al igual que los demas datos

        public function editarProductController(){
        	$datosController=$_GET["idProductEditar"];
        	$respuesta=Datos::editarProductsModel($datosController, "products");
       		?>
       		<div class="col-md-6 mt-3">
        		<div class="card card-warning">
        			<div class="card-header">
        			<h4><b>Editor</b>de Productos</h4>
        		</div>
        		<div class="card-body">
        			<form method="post" action="index.php?action=inventario">
        				<div class="form-group">
        					<input type="hidden" name="idProductEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
        				</div>

        				<div class="form-group">
        					<label for="codigotxtEditar">Codigo:</label>
        					<input class="form-control" name="codigotxteditar" id="codigotxteditar" type="text" value="<?php echo $respuesta["codigo"]; ?>" required placeholder="Codigo de producto">
        				</div>

        				<div class="form-group">
        					<label for="nombretxteditar">Nombre:</label>
        					<input class="form-control" name="nombretxteditar" id="nombretxteditar" type="text" value="<?php echo $respuesta["nombre"]; ?>" required placeholder="Nombre de producto">
        				</div>

        				<div class="form-group">
        					<label for="preciotxteditar">Precio:</label>
        					<input class="form-control" name="preciotxteditar" id="preciotxteditar" type="number" min="1" value="<?php echo $respuesta["precio"]; ?>" required placeholder="Precio de producto">
        				</div>
        				
        				<div class="form-group">
        					<label for="stocktxteditar">Stock:</label>
        					<input class="form-control" name="stocktxteditar" id="stocktxteditar" type="number" min="1" value="<?php echo $respuesta["stock"]; ?>" required placeholder="Cantidad de stock del producto">
        				</div>

        				<div class="form-group">
        					<label for="referenciatxteditar">Motivo:</label>
        					<input class="form-control" name="referenciatxteditar" id="referenciatxteditar" type="text" required placeholder="Referencia del producto">
        				</div>

        				<div class="form-group">
        					<label for="categoriaeditar">Categoria:</label>
        					<select name="categoriaeditar" id="categoriaeditar" class="form-control">
        						<?php
        						$respuesta_categoria =Datos::obtenerCategoryModel("categories");
        						foreach ($respuesta_categoria as $row => $item) {
        							?>
        							<option value="<?php echo $item ["id"]; ?>"><?php echo $item ["categoria"]; ?></option>
        						<?php
        							}
        						?>
        					</select>
        				</div>
        				<button class="btn btn-primary" type="submit">Editar</button>
        			</form>
        		</div>
        	</div>
        </div>
        <?php
        }
//Esta funcion permite actualizar los datos en la tabla de productos a partir del metodo form anterior mandando a traves del modelo del crud a traves del arreglo y con la variables respuesta mandamos dichos datos porque se llama al modelo actualizarproductsmodel si en el modelo se realizo correctamente entonces mandara una alerta de correcto y pasara a llenar dichos datos en el modelo de insertar historial model en caso contrario no se hara nada y mostrara mensaje de error
public function actualizarProductController(){
	if(isset($_POST["codigotxteditar"])){
		$datosController=array("id"=>$_POST["idProductEditar"], "codigo"=>$_POST["codigotxteditar"], "precio"=>$_POST["preciotxteditar"], "stock"=>$_POST["stocktxteditar"], "categoria"=>$_POST["categoriaeditar"], "nombre"=>$_POST["nombretxteditar"]);
		$respuesta=Datos::actualizarProductsModel($datosController, "products");
		if($respuesta=="success"){
			$datosController2=array("user"=>$_SESSION["id"], "cantidad"=>$_POST["stocktxteditar"], "producto"=>$_POST["idProductEditar"], "note"=>$_SESSION["nombre_usuario"]."agrego/compro", "reference"=>$_POST["referenciatxteditar"]);
			$respuesta2=Datos::insertarHistorialModel($datosController2, "historial");
			echo '
				<div class="col-md-6 mt-3">
					<div class="alert alert-success alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
						<h5>
							<i class="icon fas fa-check"></i>
							Exito!
						</h5>
						Producto actualizado con exito.
					</div>
				</div>
			';
			}else {
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de actualizar el producto, trate de nuevo.
						</div>
					</div>
        		';				
			} 
		}
	}
//Esta funcion permite eliminar datos a partir del id seleccionado en la tabla a traves del boton mandando el id al modelo y la tabla una vez se borra mostrara un mensaje de error o de correcto dependiendo del caso
public function eliminarProductController(){
	if(isset($_GET["idBorrar"])){
        		$datosController=$_GET["idBorrar"];
        		$respuesta=Datos::eliminarProductsModel($datosController,"products");
        		if($respuesta=="success"){
        			echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-check"></i>
									¡Exito!
								</h5>
								Producto eliminado con exito.
							</div>
						</div>
					';
       			}else{
       				echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-danger alert-dismissible">
								<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de eliminar el Producto, trate de nuevo.
							</div>
						</div>
					';
       			}
        	}
		}
//Esta funcion permite agregar productos al stock a traves del boton y un formulario para agregar dicha cantidad al producto se llama al modelo correspondiente para asi pasar al controlador que actualiza dicho modelo

public function addProductController(){
	$datosController=$_GET["idProductAdd"];
	$respuesta=Datos::editarProductsModel($datosController, "products");
	?>
	<div class="col-md-6 mt-3">
		<div class="card card-warning">
			<div class="card-header">
				<h4><b>Agregar</b>stock al producto</h4>
			</div>
		
			<div class="card-body">
				<form method="post" action="index.php?action=inventario">
					<div class="form-group">
						<input type="hidden" name="idProductAdd" class="form-control" value="<?php echo $respuesta ["id"]; ?>" required>
					</div>

				<div class="form-group">
					<label for="codigotxtEditar">Stock:</label>
					<input class="form-control" name="addstocktxt" id="addstocktxt" type="number" min="1" value="1" required placeholder="Stock del producto">
				</div>
				
				<div class="form-group">
					<label for="referenciatxtadd">Motivo:</label>
					<input class="form-control" name="refereciatxtadd" id="refereciatxtadd" type="text" required placeholder="Referencia del producto">
				</div>

				<button class="btn btn-primary" type="submit">Realizar Cambio</button>
				</form>
			</div>
		</div>
	</div
<?php
}

//Esta funcion actualiza y llama al modelo de la tabla producto a su vez inserta una nueva fila a la tabla historial, si el update sale correcto y agrega los productos del stock entonces insertara la actualizacion en la tabla historial, si todo sale bien mostrara un mensaje de error o de correcto dependiendo de la respuesta
public function actualizarStockController(){
	if(isset($_POST["addstocktxt"])){
		$datosController=array("id"=>$_POST["idProductAdd"], "stock"=>$_POST["addstocktxt"]);
		$respuesta=Datos::pushProductsModel($datosController, "products");
		if($respuesta=="success"){
			$datosController2=array("user"=>$_SESSION["id"], "cantidad"=>$_POST["addstocktxt"], "producto"=>$_POST["idProductAdd"], "note"=>$_SESSION["nombre_usuario"]."agrego/compro", "reference"=>$_POST["referenciatxtadd"]);
			$respuesta2=Datos::insertarHistorialModel($datosController2, "historial");
			echo '
				<div class="col-md-6 mt-3">
					<div class="alert alert-success alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
						<h5>
							<i class="icon fas fa-check"></i>
							¡Exito!
						</h5>
						Stock actualizado con exito.
					</div>
				</div>
			';
			}else {
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de modificar el stock del producto, trate de nuevo.
						</div>
					</div>
        		';				
			} 
		}
	}
//Esta funcion actualiza y llama al modelo de la tabla producto a su vez inserta una nueva fila a la tabla Historial, si el update sale correcto y elimina los productos del stock entonces insertara la actualizacion en la tabla Historial, si todo sale bien mostrara un mensaje de errror o de correcto dependiendo de la respuesta
public function actualizar2StockController(){
	if(isset($_POST["delstocktxt"])){
		$datosController=array("id"=>$_POST["idProductDel"], "stock"=>$_POST["delstocktxt"]);
		$respuesta=Datos::pullProductsModel($datosController, "products");
		if($respuesta=="success"){
			$datosController2=array("user"=>$_SESSION["id"], "cantidad"=>$_POST["delstocktxt"], "producto"=>$_POST["idProductDel"], "note"=>$_SESSION["nombre_usuario"]."quito", "reference"=>$_POST["referenciatxtdel"]);
			$respuesta2=Datos::insertarHistorialModel($datosController2, "historial");
			echo '
				<div class="col-md-6 mt-3">
					<div class="alert alert-success alert-dismissible">
						<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
						<h5>
							<i class="icon fas fa-check"></i>
							¡Exito!
						</h5>
						Stock modificado con exito.
					</div>
				</div>
			';
			}else {
				echo '
					<div class="col-md-6 mt-3">
						<div class="alert alert-danger alert-dismissible">
							<button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
								<h5>
									<i class="icon fas fa-ban"></i>
									¡Error!
								</h5>
								Se ha producido un error al momento de modificar el stock del producto, trate de nuevo.
						</div>
					</div>
        		';				
			} 
		}
	}

//Esta funcion permite quitar productos al stock a traves del boton y un formulario para agregar dicha cantidad al producto se llama al modelo correspondiente para asi pasar al controlador que actualiza dicho modelo
public function delProductController(){
	$datosController=$_GET["idProductDel"];
	$respuesta=Datos::editarProductsModel($datosController, "products");
	?>
	<div class="col-md-6 mt-3">
		<div class="card card-warning">
			<div class="card-header">
				<h4><b>Eliminar</b>stock al producto</h4>
			</div>
		
			<div class="card-body">
				<form method="post" action="index.php?action=inventario">
					<div class="form-group">
						<input type="hidden" name="idProductDel" class="form-control" value="<?php echo $respuesta ["id"]; ?>" required>
					</div>

				<div class="form-group">
					<label for="codigotxtEditar">Stock:</label>
					<input class="form-control" name="delstocktxt" id="delstocktxt" type="number" min="1" max="<?php echo $respuesta ["stock"]; ?>" value="<?php echo $respuesta ["stock"]; ?>" required placeholder="Stock del producto">
				</div>
				
				<div class="form-group">
					<label for="referenciatxtdel">Motivo:</label>
					<input class="form-control" name="referenciatxtdel" id="referenciatxtdel" type="text" required placeholder="Referencia del producto">
				</div>

				<button class="btn btn-primary" type="submit">Realizar Cambio</button>
				</form>
			</div>
		</div>
	</div
<?php
}
//CONTROLADORES PARA EL HISTORIAL
//Este controlador funciona para mostrar los datos de la tabla Historial al usuario
public function vistaHistorialController(){
	$respuesta= Datos::vistaHistorialModel("historial");
	foreach ($respuesta as $row => $item) {
		echo '
			<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["producto"].'</td>
				<td>'.$item["nota"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>'.$item["referencia"].'</td>
				<td>'.$item["fecha"].'</td>
			</tr>
		';
	}
}
//CONTROLADORES PARA LAS CATEGORIAS


 //CONTROLADORES PARA EL TABLERO
        //Este controlador sirve para mostrarle al usuario las cajas donde se tiene informacion sobre los usuarios, productos y ventas registradas, asi como los movimientos que se tienen en  el historial (altas/bajas de productos) y las ganancias que se tienen de acuerdo a todas las ventas
        public function contarFilas(){
        	$respuesta_users =Datos::contarFilasModel("users");
        /*	$respuesta_products =Datos::contarFilasModel("products");
        	$respuesta_categories =Datos::contarFilasModel("categories");
        	$respuesta_historial =Datos::contarFilasModel("historial");
        	$respuesta_ventas =Datos::contarFilasModel("sales");
        	$respuesta_totales =Datos::contarFilasModel("sales");*/
			echo '
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_users["filas"].'</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
<!--
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_products["filas"].'</h3>
                            <p>Total de Productos</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

		        <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_categories["filas"].'</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=categorias">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_historial["filas"].'</h3>
                            <p>Total de </p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=inventario">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_ventas["filas"].'</h3>
                            <p>Total de Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=ventas">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_totales["filas"].'</h3>
                            <p>Total de Ganancia Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=ventas&todas">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> -->
 			';
        }
    }
?>

