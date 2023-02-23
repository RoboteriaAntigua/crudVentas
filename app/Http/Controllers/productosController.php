<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\producto;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;

class productosController extends Controller
{
    // Listar todos los productos en la vista principal
    public function index()
    {
        $productos = producto::all();
     return view('admin.productos.index', compact('productos'));
    }


    //Crear
    public function crear()
        {
            $producto = producto::all();
            return view('admin.productos.crear', compact('producto'));
        }


    // Proceso de Creación de un Registro
    public function store(ItemCreateRequest $request)
    {
        // Instancio al modelo producto que hace llamado a la tabla 'producto' de la Base de Datos
        $producto = new producto;

        // Recibo todos los datos del formulario de la vista 'crear.blade.php'
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;

        // Almacenos la imagen en la carpeta publica especifica, esto lo veremos más adelante
        $producto->img = $request->file('img')->store('/');

        // Guardamos la fecha de creación del registro
        //$producto->created_at = (new DateTime)->getTimestamp();

        // Inserto todos los datos en mi tabla 'producto'
        $producto->save();

        // Hago una redirección a la vista principal con un mensaje. El controlador manda a index. admin/productos es el name de la ruta
        return redirect('admin/productos')->with('message','Guardado Satisfactoriamente !');
    }


    // Leer Registro por 'id' (Read)
    public function show($id)
    {
        $producto = producto::find($id);
        return view('admin.productos.detalles', compact('producto'));
    }



    //  Actualizar un registro (Update), muestra la vista actualizar
    public function actualizar($id)
    {
        $producto = producto::find($id);
        return view('admin/productos.actualizar',['producto'=>$producto]);
    }



    // Proceso de Actualización de un Registro (Update), viene del formulario/vista actualizar (pasado por el web.php)
    public function update(ItemUpdateRequest $request, $id)
    {
        // Recibo todos los datos desde el formulario Actualizar
        $producto = producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;

        // Recibo la imagen desde el formulario Actualizar
        if ($request->hasFile('img')) {
            $producto->img = $request->file('img')->store('/');
        }

        // Guardamos la fecha de actualización del registro
        //$producto->updated_at = (new DateTime)->getTimestamp();

        // Actualizo los datos en la tabla 'producto'
        $producto->save();

       // Muestro un mensaje y redirecciono a la vista principal
       /* Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/productos');*/
        return redirect('admin/productos')->with('message','Guardado Satisfactoriamente !');

    }

        // Eliminar un Registro
    public function eliminar($id)
    {
        // Indicamos el 'id' del registro que se va Eliminar
        $producto = producto::find($id);

        // Elimino la imagen de la carpeta 'uploads', esto lo veremos más adelante
        $imagen = explode(",", $producto->img);
        //Storage::delete($imagen);

        // Elimino el registro de la tabla 'producto'
        producto::destroy($id);

        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes mantenerlo en
        // una tabla llamada por ejemplo 'productos_eliminados' y alli guardas su fecha de eliminación
        // $producto->deleted_at = (new DateTime)->getTimestamp();

        // Muestro un mensaje y redirecciono a la vista principal
        /*Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/index');*/
        return redirect('admin/productos')->with('message','Eliminado Satisfactoriamente !');
    }



}
