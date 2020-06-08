<?php 
	$ingreso = new MvcController();
	$ingreso-> ingresoUsuarioController();

	if(isset($_GET["action"])){
		if($_GET["action"]=="fallo"){
			echo "Fallo al ingresar";
		}
	}

?>
<h1>INGRESAR</h1>

<form method="post">
<div class="row">
    <div class="col-md-6">
        <div class="card">
            
            <div class="card-body center">
				<br>
				<input type="text" class="form-control" placeholder="Usuario" name="usuarioIngreso" required >		     
				<br>
				<input type="password" class="form-control" placeholder="password" name="passwordIngreso" required >	
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Iniciar sesión</button>
            </div>
        </div>
    </div>
</div>

</form>