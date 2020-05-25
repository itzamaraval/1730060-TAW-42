<div class="container">
    <div class="jumbotron">
        <h2>Formulario registro de Usuario</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?usuario=get_datos" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?usuario=get_datos&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <!-- Formulario para el registro de usuario -->
                <!-- Campo usuario -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_usuario">USUARIO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_usuario" value="<?php echo $data['usuario']; ?>">
                    </div>
                    
                </div>
                <!-- Campo password -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_password">CONTRASEÑA:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="txt_password" value="<?php echo $data['password']; ?>">
                    </div>
                    
                </div>

                <!-- Campo email -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_email">EMAIL:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="txt_email" value="<?php echo $data['email']; ?>">
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