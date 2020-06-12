<?php 
	$ingreso = new MvcController();
	$ingreso-> ingresoUsuarioController();

	if(isset($_GET["action"])){
		if($_GET["action"]=="fallo"){
			echo "Fallo al ingresar";
		}
	} 

?>

<a href="index.php"><b>Sistema de </b>inventarios</a>

<form method="post">
<div class="row">
    <div class="col-md-6">
        <div class="card">
            
            <div class="card-body center">
				<br>
				<div class="input-group nb-3">
					<input type="text" name="usuarioIngreso" id="txtUser" class="form-control" placeholder="Usuario" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>		     
				<br>
				<input type="password" name="passwordIngreso" id="txtPassword" class="form-control" placeholder="Password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Iniciar sesión</button>
            </div>
        </div>
    </div>
</div>

</form>