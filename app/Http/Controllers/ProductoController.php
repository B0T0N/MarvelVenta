<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int $user_id
     */
    public function index()
    {
        $productos = Producto::paginate(2);

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('nombre','id');
        $usuario = User::pluck('name','id');
        return view('producto.create', compact('producto','categorias','usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Producto::$rules);

        // $producto = Producto::create($request->all());

        $datosProducto = request()->except('_token');

        if ($request->hasFile('imagen')) {
            $datosProducto['imagen']=$request->file('imagen')->store('uploads','public');
        }

        producto::insert($datosProducto);

        return redirect()->route('productos.index')
            ->with('success', 'Producto Añadido.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::pluck('nombre','id');
        $usuario = User::pluck('name','id');
        return view('producto.edit', compact('producto','categorias','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // request()->validate(Producto::$rules);

        // $producto->update($request->all());

        $datosProducto = request()->except(['_token','_method']);

        if ($request->hasFile('imagen')) {
            $producto=Producto::findOrFail($id);
            Storage::delete('public/'.$producto->imagen);
            $datosProducto['imagen']=$request->file('imagen')->store('uploads','public');
        }

        Producto::where('id','=', $id)->update($datosProducto);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);

        if (Storage::delete('public/'.$producto->imagen)) {

            producto::destroy($id);

        }

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado');
    }
}
