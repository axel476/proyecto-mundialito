<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Pais;

use Illuminate\Http\Request;

class DisciplinaController extends Controller

{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $disciplinas = Disciplina::all();
        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('disciplinas.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validación
        $request->validate([
            'NombreDisciplina' => 'required|string|max:100|unique:disciplinas'
        ]);

        // Crear la disciplina
        Disciplina::create($request->all());

        return redirect()->route('disciplinas.index')->with('message', 'Disciplina creada correctamente');
        
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
        $disciplina = Disciplina::find($id);
        return view('disciplinas.editar', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $disciplina = Disciplina::find($id);
        $disciplina->NombreDisciplina = $request->NombreDisciplina;
        $disciplina->save();
        return redirect()->route('disciplinas.index')->with('message', 'Disciplina actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       try {
            Disciplina::destroy($id);
            return redirect()->route('disciplinas.index')->with('message', 'Disciplina eliminada correctamente');
            
        } catch (\Exception $e) {
            return redirect()->route('disciplinas.index')
                ->with('error', 'No se puede eliminar esta disciplina porque tiene deportistas asociados.');
        }
    }
}
