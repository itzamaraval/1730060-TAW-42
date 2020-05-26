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
        <h2>Registro de Estudiantes</h2>
        <br>
        <!--<a href="index.php?m=m" class="btn btn-primary btn-lg">Nuevo</a>-->
    </div>
    <div class="container">
    <!-- Creación de la tabla donde se muestra la información de los estudiantes -->
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Alumno</th>
                    <th>Edad</th>
                    <th>Promedio</th>
                    <th>Universidad</th>
                    <th>Carrera</th>
                    <th>Fecha de registro</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            <!-- Foreach para mostrar los registros -->
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['cedula']; ?></th>
                        <th><?php echo $data['alumno']; ?></th>
                        <th><?php echo $data['edad']; ?></th>
                        <th><?php echo $data['promedio']; ?></th>
                        <th><?php echo $data['universidad']; ?></th>
                        <th><?php echo $data['carrera']; ?></th>
                        <th><?php echo $data['fecha_reg']; ?></th>
                        <th>
                            <!-- Botones para editar y eliminar  -->
                            <a href="index.php?m=estudiante&id=<?php echo $data['id']?>&universidad_id=<?php echo $data['universidad_id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?m=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>