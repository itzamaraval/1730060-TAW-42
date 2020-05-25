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
        <h2>Registro de Usuarios</h2>
        <br>
        <a href="index.php?usuario=usuario" class="btn btn-primary btn-lg">Nuevo</a>
    </div>
    <div class="container">
    <!-- Creación de la tabla donde se muestra la información de los estudiantes -->
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <!-- Foreach para mostrar los registros -->
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['usuario']; ?></th>
                        <th><?php echo $data['email']; ?></th>
                        <th>
                            <!-- Botones para editar y eliminar  -->
                            <a href="index.php?usuario=usuario&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?usuario=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>