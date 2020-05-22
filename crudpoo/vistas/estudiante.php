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
                <!-- Poner oculto el campo de id, porque es autoincrementable -->
                <div class="form-group" style="visibility:hidden">
                    <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                    <div class="col-sm-10">
                <input type="text" class="form-control" name="txt_id" value="<?php echo $data['id']; ?>">
                    </div>
                    
                </div>
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
                        <input type="text" class="form-control" name="txt_edad" value="<?php echo $data['edad']; ?>">
                    </div>
                    
                </div>
                <!-- Campo fecha con calendario expandible -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_fecha">FECHA:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="txt_fecha" value="<?php echo $data['fecha']; ?>">
                    </div>
                    
                </div>
                <!-- Campo universidad -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_universidad">UNIVERSIDAD:</label>
                    <div class="col-sm-10">
                        <input type="select" class="form-control" name="txt_universidad" value="<?php echo $data['universidad_id']; ?>">
                    </div>
                    
                </div>
                <!-- Campo facultad -->
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_facultad">FACULTAD:</label>
                    <div class="col-sm-10">
                        <input type="select" class="form-control" name="txt_facultad" value="<?php echo $data['facultad_id']; ?>">
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