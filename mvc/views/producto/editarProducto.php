<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>


<h1>Editar Producto</h1>
		<form method="post">
			<?php
				$editarProducto = new ProductoController();
				$editarProducto -> editarProductoController();
				$editarProducto -> actualizarProductoController();
			?>
		</form>
		