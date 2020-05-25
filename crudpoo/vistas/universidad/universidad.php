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

<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro de Universidad</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?universidad=get_datos" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?universidad=get_datos&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <!-- Formulario para el registro de los estudiantes -->
                <!-- Campo nombre -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <!-- Campo direccion -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_direccion">DIRECCIÓN:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="txt_direccion" id="" cols="30" rows="10"><?php echo $data['direccion']; ?></textarea>
                    </div>
                    
                </div>

                <!-- Campo telefono -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_telefono">TELEFONO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_telefono" value="<?php echo $data['telefono']; ?>">
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