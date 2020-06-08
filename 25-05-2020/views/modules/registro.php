<?php 
    $registro = new MvcController();
    
    $registro -> registroUsuarioController();

    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo '
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <span>USUARIO REGISTRADO CON ÉXITO.</span>
                </div>
            ';
        }

        if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }
    }
?>
<h1>Registrar</h1>

<form method="post">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Registrar Usuario</h5>
            </div>
            
            <div class="card-body">
                
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" placeholder="Usuario" name="usuarioRegistro" required>
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Password" name="passwordRegistro" required>
                    <label for="">Correo electrónico</label>
                    <input type="email" class="form-control" placeholder="Email" name="emailRegistro" required>
                
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

</form>