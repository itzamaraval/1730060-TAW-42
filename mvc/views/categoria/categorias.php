<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>

<h1> CATEGORIAS </h1>

<a href="index.php?action=registrarCategoria">Nueva Categoria</a>
<br><br>
	<table border="1">
		<thead>
			<tr>
				<th>Nombre</th>				
				<th>¿Editar?</th>
				<th>¿Eliminar?</th>

			</tr>
		</thead>
		<body>
			<?php
				$vistaCategoria = new CategoriaController();
				$vistaCategoria -> vistaCategoriaController();
				$vistaCategoria -> borrarCategoriaController();
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



