<?php
    include_once "controllers/controller.php";
    $registro = new MvcController();
    $registro -> registroUsuarioController();
?>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registrar</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                     <input class="form-control form-control-user" type="text" placeholder="Usuario" name="usuarioRegistro" required>
                  </div>
                  <div class="col-sm-6">
                    <input class="form-control form-control-user" type="password" placeholder="password" name="passwordRegistro" required>
                  </div>
                </div>
                <div class="form-group">
                  <input class="form-control form-control-user" type="email" placeholder="email" name="emailRegistro" required>
                </div>
                </div>
                <input class="btn btn-primary btn-user btn-block" id="sendMessageButton" type="submit" value="Registrar">
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Olvidaste la contraseña?</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php?action=ingresar">¿Ya tienes una cuenta? Ingresa!</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!--<h1> REGISTRO </h1>

    <form method="POST">
        <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
        <input type="password" placeholder="password" name="passwordRegistro" required>
        <input type="email" placeholder="email" name="emailRegistro" required>
        <input type="submit" value="Enviar">
    </form>
-->
<?php
    if (isset($_GET["action"])) {
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }else{
            echo "Error en el registro";
        }
    }

?>
