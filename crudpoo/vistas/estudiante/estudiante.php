<?php

	session_start();

	if(!$_SESSION["validar"]){
		header("location:index.php?usuario=login");
		exit();
	}
	
?>

<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?m=get_datosE" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?m=get_datosE&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <!-- Formulario para el registro de los estudiantes -->
                
                <!-- Campo cédula -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_cedula">CÉDULA:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_cedula" value="<?php echo $data['cedula']; ?>">
                    </div>
                    
                </div>
                <!-- Campo nombre -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <!-- Campo apellidos -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_apellidos">APELLIDOS:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_apellidos" value="<?php echo $data['apellidos']; ?>">
                    </div>
                    
                </div>
                <!-- Campo promedio -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_promedio">PROMEDIO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_promedio" value="<?php echo $data['promedio']; ?>">
                    </div>
                    
                </div>
                <!-- Campo edad -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_edad">EDAD:</label>
                    <div class="col-sm-10">
                        <input type="number" min="18" class="form-control" name="txt_edad" value="<?php echo $data['edad']; ?>">
                    </div>
                    
                </div>

                <!-- Campo Oculto de el ID de universidad -->
                <input type="hidden" name="universidad_id" value="<?php echo $_REQUEST['universidad_id']; ?>">

                <!-- Campo Carreras Select -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="carrera_id">CARRERA:</label>
                    <div class="col-sm-10">
                        <select name="carrera_id" id="" class="form-control">
                            
                            <?php foreach($select_carreras as $carrera): ?>
                                <?php
                                    if($data['carrera_id'] == $carrera['id'] ){
                                        echo "<option value='".$carrera['id']."' selected>".$carrera['nombre']."</option>";        
                                    }else{
                                        echo "<option value='".$carrera['id']."' >".$carrera['nombre']."</option>";
                                    }
                                ?>
                                
                            <?php endforeach; ?>
                        </select>

                    </div>
                    
                </div>

               
                
                <!-- Botones para actualizar y registrar -->
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
                    <?php }  ?>
                    <?php if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>