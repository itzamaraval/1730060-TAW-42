<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}

	if(isset($_GET["action"])){
		if($_GET["action"]=="cambio"){
			echo "cambio exitoso";
		}
		
		if($_GET["action"] == "okProducto"){
            echo '
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <span>PRODUCTO REGISTRADO CON ÉXITO !</span>
                </div>
            ';
        }
	}
	
?>

<h1> PRODUCTOS </h1>

<div class="card ">
	<div class="card-header">
		<h4 class="card-title">
			<a href="index.php?action=registrarProducto" class="btn btn-fill btn-primary">Nuevo Producto</a>
		</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table tablesorter " id="">
				<thead class="text-primary">
					<tr>
					  <th>Nombre</th>
					  <th>Precio venta</th>
					  <th>Precio compra</th>
					  <th>Inventario</th>
					  <th>Categoria</th>				
					  <th>¿Editar?</th>
					  <th>¿Eliminar?</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$vistaProducto = new ProductoController();
						$vistaProducto -> vistaProductoController();
						$vistaProducto -> borrarProductoController();
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
