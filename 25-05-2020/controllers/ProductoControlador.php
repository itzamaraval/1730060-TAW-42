<?php

class ProductoControlador{
    
  function __construct(){
  }

  // Envia a la vista de registro
  function registrar(){
    $categorias = Producto::obtenerCategorias();

    require_once('Views/Productos/registrar.php');
  }
  
  // Envía los campos ingresados en el formulario de registro a un método en el modelo para añadirlos a la base de datos
  function guardar(){
    $producto= new Producto( null, $_POST['txtCodigo'],$_POST['txtNombre'], $_POST['txtDescripcion'],$_POST['txtCantidad'], $_POST['txtCompra'], $_POST['txtVenta'], $_POST['txtCategoria'] );

    Producto::registrar($producto);
  }

  // Envia a la vista de mostrar
  function mostrar(){
    $productos = Producto::obtenerProductos();

		require_once('Views/Productos/mostrar.php');
  }
  
  // Envia a la vista de actualizar
  function actualizarProducto(){
		$id = $_GET['id']; // Obtiene el id extraído de la url a través del método GET
    $producto = Producto::obtenerProducto($id); // Crea una instancia de la clase del modelo e invoca un método que recupera los atributos de la instancia llamada con un id
    $categorias = Producto::obtenerCategorias();

    // Llama a la vista actualizar con los datos previamente recuperados de la instancia en cuestión
    require_once('Views/Productos/actualizar.php');
  }
  
  // Actualiza los campos ingresados en el formulario a un método en el modelo para modificarlos en la base de datos
  function actualizar(){
		$producto = new Producto( $_POST["txtId"], $_POST['txtCodigo'],$_POST['txtNombre'], $_POST['txtDescripcion'],$_POST['txtCantidad'],$_POST['txtCompra'], $_POST['txtVenta'], $_POST['txtCategoria'] );
    
    Producto::actualizar($producto);
		$this->mostrar();
	}
  
  // Método para llamar al método eliminar dentro del modelo
  function eliminar(){
		$id=$_GET['id']; // Obtiene el id extraído de la url a través del método GET
    
    Producto::eliminar($id);
		$this->mostrar();
	}
}