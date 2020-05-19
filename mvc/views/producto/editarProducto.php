<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>

<h1>Editar Producto</h1>
<form method="post">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Editar un producto</h5>
            </div>
            
            <div class="card-body">
				<?php
					$editarProducto = new ProductoController();
					$editarProducto -> editarProductoController();
					$editarProducto -> actualizarProductoController();
				?>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>