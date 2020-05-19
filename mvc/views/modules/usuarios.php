<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>
<?php
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

<div class="card ">
	<div class="card-header">
		<h4 class="card-title">
			<a href="index.php?action=registro" class="btn btn-fill btn-primary">Nuevo Usuario</a>
		</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table tablesorter " id="">
				<thead class="text-primary">
					<tr>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>Email</th>				
					<th>¿Editar?</th>
					<th>¿Eliminar?</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$vistaUsuario= new MvcController();
						$vistaUsuario -> vistaUsuariosController();
						$vistaUsuario -> borrarUsuarioController();
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

