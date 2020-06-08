<?php 
    $registro = new CategoriaController();
    
    $registro -> registroCategoriaController();

    if(isset($_GET["action"])){
        if($_GET["action"] == "okCategoria"){
            echo '
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <span>CATEGORIA REGISTRADA CON ÉXITO !</span>
                </div>
            ';
        }
        /*if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }*/
    }
?>
    
<h1>Registrar Categoria</h1>
<form method="post">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Registrar una Categoria</h5>
            </div>
            
            <div class="card-body">
                
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" name="categoriaRegistro" required>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>