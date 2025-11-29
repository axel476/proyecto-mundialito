<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paises = Pais::all();
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('paises.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'NombrePais' => 'required|string|max:100|unique:pais'
        ]);

        // Crear el país
        Pais::create($request->all());

        return redirect()->route('paises.index')->with('message', 'País creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pais = Pais::find($id);
        return view('paises.editar', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pais = Pais::find($id);
        $pais->NombrePais = $request->NombrePais;
        $pais->save();
        return redirect()->route('paises.index')->with('message', 'País actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Pais::destroy($id);
        return redirect()->route('paises.index')->with('message', 'País eliminado correctamente');
    }
}
