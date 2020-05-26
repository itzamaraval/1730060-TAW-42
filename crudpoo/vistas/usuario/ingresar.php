<?php
	if(isset($_GET["exito"])){
		if($_GET["exito"] == 0){
            echo '
                <center>
                <div class="alert alert-danger">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <span>ERROR: REVISE LOS DATOS DE ACCESO.</span>
                </div>
                </center>
            ';
		}
    }
    
    $data =0;
?>

<div class="container">
    

    <div class="col-md-6 col-md-offset-3">
        <h1>Iniciar Sesión</h1>
        <br>
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?usuario=get_login" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?usuario=get_login&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <!-- Formulario para el registro de usuario -->
                <!-- Campo usuario -->
                <div class="form-group">
                    <label class=" col-sm-4 control-label" for="txt_usuario">USUARIO:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_usuario">
                    </div>
                    
                </div>
                <!-- Campo password -->
                <div class="form-group">
                    <label class=" col-sm-4 control-label" for="txt_password">CONTRASEÑA:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="txt_password">
                    </div>
                    
                </div>
 
                
                
                <!-- Botones para actualizar y registrar -->
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Inciar Sesión">
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