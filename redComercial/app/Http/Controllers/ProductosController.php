<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    public function get(Request $request, $id){
      return Productos::findOrFail($id);
    }
    
    public function list(Request $request){
      return Productos::get();
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'nombre' => 'required |max:191 ',
        'descripcion' => 'required |max:191 ',
        'precio' => 'required |max:5 ',
        'stock' => 'required |max:11 ',
        'id_categoria' => 'required |max:11 ',
        'id_empresa' => 'required |max:11 ',
      ],[
        'nombre.required' => 'nombre is a required field.',
        'nombre.max' => 'nombre can only be 191 characters.',
        'descripcion.required' => 'descripcion is a required field.',
        'descripcion.max' => 'descripcion can only be 191 characters.',
        'precio.required' => 'precio is a required field.',
        'precio.max' => 'precio can only be 5 characters.',
        'stock.required' => 'stock is a required field.',
        'stock.max' => 'stock can only be 11 characters.',
        'id_categoria.required' => 'id_categoria is a required field.',
        'id_categoria.max' => 'id_categoria can only be 11 characters.',
        'id_empresa.required' => 'id_empresa is a required field.',
        'id_empresa.max' => 'id_empresa can only be 11 characters.',
      ]);

        $productos = Productos::create($request->all());    
        return $productos;
    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'nombre' => 'required |max:191 ',
        'descripcion' => 'required |max:191 ',
        'precio' => 'required |max:5 ',
        'stock' => 'required |max:11 ',
        'id_categoria' => 'required |max:11 ',
        'id_empresa' => 'required |max:11 ',
      ],[
        'nombre.required' => 'nombre is a required field.',
        'nombre.max' => 'nombre can only be 191 characters.',
        'descripcion.required' => 'descripcion is a required field.',
        'descripcion.max' => 'descripcion can only be 191 characters.',
        'precio.required' => 'precio is a required field.',
        'precio.max' => 'precio can only be 5 characters.',
        'stock.required' => 'stock is a required field.',
        'stock.max' => 'stock can only be 11 characters.',
        'id_categoria.required' => 'id_categoria is a required field.',
        'id_categoria.max' => 'id_categoria can only be 11 characters.',
        'id_empresa.required' => 'id_empresa is a required field.',
        'id_empresa.max' => 'id_empresa can only be 11 characters.',
      ]);

        $productos = Productos::findOrFail($id);
        $input = $request->all();
        $productos->fill($input)->save();
        return $productos;
    }
    
    public function delete(Request $request, $id){
        $productos = Productos::findOrFail($id);
        $productos->delete();
    }
}
 ?>