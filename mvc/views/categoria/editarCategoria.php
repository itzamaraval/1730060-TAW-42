<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	
?>


<h1>Editar Categoria</h1>
		<form method="post">
			<?php
				$editarCateogoria = new CategoriaController();
				$editarCateogoria -> editarCateogoriaController();
				$editarCateogoria -> actualizarCategoriaController();
			?>
		</form>
		