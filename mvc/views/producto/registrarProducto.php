<?php

    $registro = new ProductoController();
    
    $registro -> registroProductoController();

    $select_categoria = $registro -> obtenerSelectCategorias();

    if(isset($_GET["action"])){
        /*if($_GET["action"] == "okProducto"){
            echo '
                <div class="alert alert-success">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                  <span>PRODUCTO REGISTRADO CON ÉXITO !</span>
                </div>
            ';
        }*/
        /*if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }*/
    }
?>

<h1>Registrar Producto</h1>
<form method="post">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Registrar un producto</h5>
            </div>
            
            <div class="card-body">
                <label for="">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombreProductoRegistro" required>
                <label for="">Descripción</label>
                <textarea class="form-control" name="descripcionRegistro" cols="30" rows="10" placeholder="Descripción..."></textarea>
                <label for="">Precio de venta</label>
                <input type="number" class="form-control" placeholder="Precio venta" name="precio_ventaRegistro" required>
                <label for="">Precio de compra</label>
                <input type="number" class="form-control" placeholder="Precio compra" name="precio_compraRegistro" required>
                <label for="">Inventario</label>
                <input type="number" class="form-control" placeholder="Inventario" name="inventarioRegistro" required>

                <label for="">Categoria</label>
                <select name="categoria_id" id="" class="form-control">
                    <?php
                        foreach ($select_categoria as $row => $item) {
                            echo '<option value="'.$item["id"].'">'.$item["nombre"].'</option>';
                        }
                    ?>
                </select>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>