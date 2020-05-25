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
        <h2>Formulario registro de Carrera</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?carrera=get_datos" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?carrera=get_datos&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <!-- Formulario para el registro de la carrera -->
                
                <!-- Campo Universidad Select -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="universidad_id">UNIVERSIDAD:</label>
                    <div class="col-sm-10">
                        <select name="universidad_id" id="" class="form-control">
                            
                            <?php foreach($queryUniversidades as $uni): ?>
                                <?php
                                    if($data['universidad_id'] == $uni['id'] ){
                                        echo "<option value='".$uni['id']."' selected>".$uni['nombre']."</option>";        
                                    }else{
                                        echo "<option value='".$uni['id']."' >".$uni['nombre']."</option>";
                                    }
                                ?>
                                
                            <?php endforeach; ?>
                        </select>

                    </div>
                    
                </div>
                
                <!-- Campo nombre -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <!-- Campo direccion -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_contenidos">CONTENIDOS:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="txt_contenidos" id="" cols="30" rows="10"><?php echo $data['contenidos']; ?></textarea>
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