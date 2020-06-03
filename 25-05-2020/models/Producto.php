<?php
class Producto
{

  // Atributos de la clase
  private $id;
  private $codigo;
  private $nombre;
  private $descripcion;
  private $cantidad;
  private $precio_compra;
  private $precio_venta;
  private $id_categoria;

  // Constructor
  function __construct($id, $codigo, $nombre, $descripcion, $cantidad, $precio_compra, $precio_venta, $id_categoria)
  {
    $this->setId($id);
    $this->setCodigo($codigo);
    $this->setNombre($nombre);
    $this->setDescripcion($descripcion);
    $this->setCantidad($cantidad);
    $this->setPrecioCompra($precio_compra);
    $this->setPrecioVenta($precio_venta);
    $this->setIdCategoria($id_categoria);
  }

  // Métodos accesores
  public function getId()
  {
    return $this->id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  public function getCantidad()
  {
    return $this->cantidad;
  }

  public function getPrecioCompra()
  {
    return $this->precio_compra;
  }

  public function getPrecioVenta()
  {
    return $this->precio_venta;
  }

  public function getIdCategoria()
  {
    return $this->id_categoria;
  }

  // Métodos modificadores
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;
  }

  public function setPrecioCompra($precio_compra)
  {
    $this->precio_compra = $precio_compra;
  }

  public function setPrecioVenta($precio_venta)
  {
    $this->precio_venta = $precio_venta;
  }

  public function setIdCategoria($id_categoria)
  {
    $this->id_categoria = $id_categoria;
  }

  // Operaciones CRUD
  public static function registrar($producto)
  {
    $db = Db::getConnect();

    $insert = $db->prepare('INSERT INTO Productos (codigo,nombre,descripcion,cantidad,precio_compra,precio_venta,id_categoria) VALUES (:codigo,:nombre,:descripcion,:cantidad,:precio_compra,:precio_venta,:id_categoria)');

    $insert->bindValue('codigo', $producto->getCodigo());
    $insert->bindValue('nombre', $producto->getNombre());
    $insert->bindValue('descripcion', $producto->getDescripcion());
    $insert->bindValue('cantidad', $producto->getCantidad());
    $insert->bindValue('precio_compra', $producto->getPrecioCompra());
    $insert->bindValue('precio_venta', $producto->getPrecioVenta());
    $insert->bindValue('id_categoria', $producto->getIdCategoria());

    $insert->execute();
  }

  public static function obtenerCategorias(){
    $db=Db::getConnect();

    $select=$db->query('SELECT id, nombre FROM CategoriasProducto');

    $filas = $select->fetchAll(\PDO::FETCH_ASSOC); 

    return $filas;
}

  // Método que recupera los todos registros de la tabla
  public static function obtenerProductos()
  {
    $db = Db::getConnect();
    $productos = [];

    $select = $db->query('SELECT id, codigo,nombre, descripcion, cantidad,precio_compra, precio_venta, id_categoria FROM Productos');

    foreach ($select->fetchAll() as $producto) {
      $productos[] = new Producto($producto['id'], $producto['codigo'], $producto['nombre'], $producto['descripcion'], $producto['cantidad'], $producto['precio_compra'], $producto['precio_venta'], $producto['id_categoria']);
    }

    return $productos;
  }

  // Método que recupera únicamente un registro de la tabla
  public static function obtenerProducto($id)
  {
    $db = Db::getConnect();
    $select = $db->prepare('SELECT id,codigo, nombre, descripcion,cantidad, precio_compra, precio_venta, id_categoria FROM Productos WHERE id=:id');

    $select->bindValue('id', $id);
    $select->execute();

    $productoDb = $select->fetch();

    $producto = new Producto($productoDb['id'], $productoDb['codigo'], $productoDb['nombre'], $productoDb['descripcion'], $productoDb['canttidad'], $productoDb['precio_compra'], $productoDb['precio_venta'], $productoDb['id_categoria']);
    return $producto;
  }

  // Método que actualiza la información de un producto
  public static function actualizar($producto)
  {
    $db = Db::getConnect();
    $update = $db->prepare('UPDATE Productos SET codigo=:codigo, nombre=:nombre, descripcion=:descripcion,cantidad=:cantidad, precio_compra=:precio_compra, precio_venta=:precio_venta,id_categoria=:id_categoria WHERE id=:id');

    $update->bindValue('codigo', $producto->getCodigo());
    $update->bindValue('nombre', $producto->getNombre());
    $update->bindValue('descripcion', $producto->getDescripcion());
    $update->bindValue('cantidad', $producto->getCantidad());
    $update->bindValue('precio_compra', $producto->getPrecioCompra());
    $update->bindValue('precio_venta', $producto->getPrecioVenta());
    $update->bindValue('id_categoria', $producto->getIdCategoria());

    $update->bindValue('id', $producto->getId());

    $update->execute();
  }

  // Método que elimina el registro de una categoría de producto
  public static function eliminar($id)
  {
    $db = Db::getConnect();

    $delete = $db->prepare('DELETE FROM Productos WHERE id=:id');
    $delete->bindValue('id', $id);
    $delete->execute();
  }
}