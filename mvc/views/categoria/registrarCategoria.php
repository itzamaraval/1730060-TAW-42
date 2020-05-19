<h1>Registrar Categoria</h1>

    <form method="post">
    
        <input type="text" placeholder="Nombre" name="categoriaRegistro" required>

        <input type="submit" value="Guardar">
    
    </form>

    <?php 
        $registro = new CategoriaController();
        
        $registro -> registroCategoriaController();

        if(isset($_GET["action"])){
            if($_GET["action"] == "okCategoria"){
                echo "<h2>CATEGORIA REGISTRADA CON ÉXITO !</h2>";
            }
            /*if($_GET["action"] == "fallo"){
                echo "Fallo al ingresar";
            }*/
        }
    ?>