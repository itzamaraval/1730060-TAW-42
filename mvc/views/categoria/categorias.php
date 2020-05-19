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
			echo "cambio exitoso";
		}
	}
?>

<h1> CATEGORIAS </h1>

<div class="card ">
	<div class="card-header">
		<h4 class="card-title">
			<a href="index.php?action=registrarCategoria" class="btn btn-fill btn-primary">Nueva Categoria</a>
		</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table tablesorter " id="">
				<thead class="text-primary">
					<tr>
						<th>Nombre</th>				
						<th>¿Editar?</th>
						<th>¿Eliminar?</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$vistaCategoria = new CategoriaController();
						$vistaCategoria -> vistaCategoriaController();
						$vistaCategoria -> borrarCategoriaController();
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>