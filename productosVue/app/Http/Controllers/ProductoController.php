<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductoCollection;
use App\Producto;

class ProductoController extends Controller
{
    public function store(Request $request)
    {
      $producto = new Producto([
        'nombre' => $request->get('nombre'),
        'descripcion' => $request->get('descripcion'),
        'cantidad' => $request->get('cantidad'),
        'precio_venta' => $request->get('precio_venta'),
        'precio_compra' => $request->get('precio_compra')
      ]);

      $producto->save();

      return response()->json('Producto agrefado con exito.');
    }

    public function index()
    {
      return new ProductoCollection(Producto::all());
    }

    public function edit($id)
    {
      $producto = Producto::find($id);
      return response()->json($producto);
    }

    public function update($id, Request $request)
    {
      $producto = Producto::find($id);

      $producto->update($request->all());

      return response()->json('Prodcuto actualizado con exito.');
    }

    public function delete($id)
    {
      $producto = Producto::find($id);

      $producto->delete();

      return response()->json('Producto eliminado con exito.');
    }
}
