<?php

    $registro = new ProductoController();
    
    $registro -> registroProductoController();

    $select_categoria = $registro -> obtenerSelectCategorias();

    if(isset($_GET["action"])){
        if($_GET["action"] == "okProducto"){
            echo "<h2>PRODUCTO REGISTRADO CON ÉXITO !</h2>";
        }
        /*if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }*/
    }
?>
<h1>Registrar Producto</h1>

    <form method="post">
    
        <input type="text" placeholder="Nombre" name="nombreProductoRegistro" required>
        <textarea name="descripcionRegistro" cols="30" rows="10" placeholder="Descripción..."></textarea>
        <input type="text" type="number" placeholder="Precio venta" name="precio_ventaRegistro" required>
        <input type="text" type="number" placeholder="Precio compra" name="precio_compraRegistro" required>
        <input type="text" type="number" placeholder="Inventario" name="inventarioRegistro" required>
        
        <label for="">Categoria</label>
        <select name="categoria_id" id="">
            <?php
                foreach ($select_categoria as $row => $item) {
                    echo '<option value="'.$item["id"].'">'.$item["nombre"].'</option>';
                }
            ?>
        </select>
        <input type="submit" value="Guardar">
    
    </form>

    