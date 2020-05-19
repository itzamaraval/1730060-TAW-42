<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>

<h1> PRODUCTOS </h1>

<a href="index.php?action=registrarProducto">Nuevo Producto</a>
<br><br>
	<table border="1">
		<thead>
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
		<body>
			<?php
				$vistaProducto = new ProductoController();
				$vistaProducto -> vistaProductoController();
				$vistaProducto -> borrarProductoController();
			?>			

		</body>
	</table>

	<?php
		if(isset($_GET["action"])){
			if($_GET["action"]=="cambio"){
				echo "cambio exitoso";
			}
		}
	?>



