<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;

class EmpresasController extends Controller
{
    public function get(Request $request, $id){
      return Empresas::findOrFail($id);
    }
    
    public function list(Request $request){
      return Empresas::get();
      return view('empleados.admin_empleados', compact('empleados'));
    }
    
    public function create(Request $request){
        
      $validatedData = $request->validate([
        'nombre' => 'required |max:191 ',
        'direccion' => 'required |max:191 ',
        'url' => 'required |max:191 ',
        'giro' => 'required |max:191 ',
        'rfc' => 'required |max:191 ',
        'status' => 'required |max:4 ',
        'id_ciudad' => 'required |max:11 ',
      ],[
        'nombre.required' => 'nombre is a required field.',
        'nombre.max' => 'nombre can only be 191 characters.',
        'direccion.required' => 'direccion is a required field.',
        'direccion.max' => 'direccion can only be 191 characters.',
        'url.required' => 'url is a required field.',
        'url.max' => 'url can only be 191 characters.',
        'giro.required' => 'giro is a required field.',
        'giro.max' => 'giro can only be 191 characters.',
        'rfc.required' => 'rfc is a required field.',
        'rfc.max' => 'rfc can only be 191 characters.',
        'status.required' => 'status is a required field.',
        'status.max' => 'status can only be 4 characters.',
        'id_ciudad.required' => 'id_ciudad is a required field.',
        'id_ciudad.max' => 'id_ciudad can only be 11 characters.',
      ]);

        $empresas = Empresas::create($request->all());    
        return view('empresas.alta_empresa',compact('ciudad'));
    }

    public function edit($id)
    {
        $empresas=Empresas::findOrFail($id);
        $ciudades = Ciudades::all();
        
        return view('empresas.edit',compact('empresas','ciudades'));

    }
    
    public function update(Request $request, $id){
      
      $validatedData = $request->validate([
        'nombre' => 'required |max:191 ',
        'direccion' => 'required |max:191 ',
        'url' => 'required |max:191 ',
        'giro' => 'required |max:191 ',
        'rfc' => 'required |max:191 ',
        'status' => 'required |max:4 ',
        'id_ciudad' => 'required |max:11 ',
      ],[
        'nombre.required' => 'nombre is a required field.',
        'nombre.max' => 'nombre can only be 191 characters.',
        'direccion.required' => 'direccion is a required field.',
        'direccion.max' => 'direccion can only be 191 characters.',
        'url.required' => 'url is a required field.',
        'url.max' => 'url can only be 191 characters.',
        'giro.required' => 'giro is a required field.',
        'giro.max' => 'giro can only be 191 characters.',
        'rfc.required' => 'rfc is a required field.',
        'rfc.max' => 'rfc can only be 191 characters.',
        'status.required' => 'status is a required field.',
        'status.max' => 'status can only be 4 characters.',
        'id_ciudad.required' => 'id_ciudad is a required field.',
        'id_ciudad.max' => 'id_ciudad can only be 11 characters.',
      ]);

        $empresas = Empresas::findOrFail($id);
        $input = $request->all();
        $empresas->fill($input)->save();
        return redirect('empleados');
    }
    
   
    public function delete(Request $request, $id){
        $empresas = Empresas::findOrFail($id);
        $empresas->delete();
        return redirect('empleados');
    }
}
 ?>