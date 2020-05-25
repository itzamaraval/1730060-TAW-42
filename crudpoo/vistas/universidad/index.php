<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	if(!$_SESSION["validar"]){
		header("location:index.php?usuario=login");
		exit();
	}
	
?>

<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>Registro de Universidades</h2>
        <br>
        <a href="index.php?universidad=universidad" class="btn btn-primary btn-lg">Nuevo</a>
    </div>
    <div class="container">
    <!-- Creación de la tabla donde se muestra la información de los estudiantes -->
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <!-- Foreach para mostrar los registros -->
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['nombre']; ?></th>
                        <th><?php echo $data['direccion']; ?></th>
                        <th><?php echo $data['telefono']; ?></th>
                        <th>
                            <!-- BOTON PARA REGISTRAR A UN ALUMNO EN ESTA UNIVERSIDAD -->
                            <a href="index.php?m=estudiante&universidad_id=<?php echo $data['id']?>" class="btn btn-success">INSCRIBIR ALUMNO</a>

                            <!-- Botones para editar y eliminar  -->
                            <a href="index.php?universidad=universidad&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?universidad=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>