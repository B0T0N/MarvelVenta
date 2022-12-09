<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Compra;

use Illuminate\Http\Request;

class VistaController extends Controller
{
    public function index()
    {
        $vistas = Producto::paginate();

        return view('vista.index', compact('vistas'))
            ->with('i', (request()->input('page', 1) - 1) * $vistas->perPage());
    }

    public function store(Request $request)
    {

        request()->validate(Compra::$rules);

        $compra = Compra::create($request->all());

        return redirect()->route('vistas.index')
        ->with('success', 'Producto created successfully.');
    }

    public function show($id)
    {
        $vista = Producto::find($id);

        $compras = Compra::paginate();

        return view('vista.show', compact('vista', 'compras'))
            ->with('i', (request()->input('page', 1) - 1) * $compras->perPage());
    }
}
