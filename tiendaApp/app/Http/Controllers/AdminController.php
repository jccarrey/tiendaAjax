<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Producto;
use App\Data\Chart;

class AdminController extends Controller {
    
       public function index(Request $request){

        
         $column = $request->input('column', 'id'); // Columna por defecto para ordenar
        $order = $request->input('order', 'asc'); // Orden por defecto
    
        // Obtener productos paginados en lugar de todos los productos
        $productos = Producto::orderBy($column, $order)->paginate(10); // Cambia el número 10 por la cantidad deseada de productos por página

        $productos = Producto::all();
        if (session('verificado') != null) {
             return view('admin.admin', ['productos' => $productos, 'column' => $column, 'order' => $order]);
        } else {
           return redirect('login');
        }

        
     
      
    }
    
    public function sort($column, $order)
{
    // Validar que la columna y el orden sean válidos
    $validColumns = ['id', 'nombre', 'precio','talla'];
    $validOrders = ['asc', 'desc'];

    if (!in_array($column, $validColumns) || !in_array($order, $validOrders)) {
        dd($column);
        return redirect()->route('admin.index');
    }

    return redirect()->route('admin.index', ['column' => $column, 'order' => $order]);
}


    public function create()
    {
    if (session('verificado') != null) {
           return view('admin.create');
    } else {
        return redirect('login');
    }
      
    }

    public function store(Request $request)
{
    // dd($request);
    $this->validate($request, [
        'Nombre' => 'required|max:255',
        'Precio' => 'required|numeric|max:255',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        'Talla' => 'required|in:L,XS,S,XL', // Validación de la talla
    ]);

    try {
        $producto = new Producto();
        $producto->nombre = $request->input('Nombre');
        $producto->precio = $request->input('Precio');
        $producto->talla = $request->input('Talla');
    
        if ($request->hasFile('imagen')) {
            
            $image = $request->file('imagen');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            // dd(public_path('images'));
            $image->move(public_path('images'), $imageName);
            
            $producto->imagen = $imageName;
            
        }

        $producto->save();

        return redirect('admin')->with(['message' => 'The product has been saved.']);
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['message' => 'The product has not been saved.']);
    }
}
     public function edit($code)
    { 
        
        $pais = Producto::find($code);
      return view('admin.edit', ['producto' => $pais]);
    }

    public function update(Request $request, $id)
{
    // dd($producto);
    $this->validate($request, [
        'Nombre' => 'required|max:255',
        'Precio' => 'required|numeric|max:255',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        'talla' => 'required|in:L,XS,S,XL', // Validación de la talla
        
    ]);

    try {
        $producto = Producto::find($id);
        $producto->nombre = $request->input('Nombre');
        $producto->precio = $request->input('Precio');
        $producto->talla = $request->input('talla');
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            $producto->imagen = $imageName;
        }

        $producto->save();
        return redirect('admin')->with(['message' => 'The game has been updated']);
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['message' => 'The game has not been updated']);
    }
}

    public function destroy($code)
    {
    $pais = Producto::find($code);
        try {
            $pais->delete();
            return redirect('admin')->with(['message' => 'The product has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The product has not been deleted.']);
}
        
    }
    
}