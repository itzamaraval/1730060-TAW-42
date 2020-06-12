<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}

	if(isset($_GET["action"])){
		if($_GET["action"]=="cambio"){
			echo '
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <span>USUARIO ACTUALIZADO CON ÉXITO.</span>
                </div>
            ';
		}
	}
	
?>
<h1> USUARIOS </h1>
<div class="container-fluid">
	<div class="row mb-3"></div>
	<div class="card card-secondary">
		<div class="card-header">
			<h3 class="card-title">Usuarios</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-6">
					<a href="index.php?action=usuarios&registrar" class="btn btn-info">Agregar nuevo usuario</a>
				</div>
			</div>
			<div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12"></div>
					<table id="example1" class="table table-hover n-0 table-bordered table-striped">
						<thead class="table-info">
							<tr>
								<th>¿Editar?</th>
								<th>Eliminar?</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Usuario</th>
								<th>Correo electrónico</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								/* Se llama al controlador que muestra todas las categorias que existen*/
								$vistaUsuario= new MvcController();
								$vistaUsuario -> vistaUsuariosController();
								$vistaUsuario -> borrarUsuarioController();
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


