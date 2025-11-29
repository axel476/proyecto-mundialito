<?php

namespace App\Http\Controllers;

use App\Models\Deportista;
use App\Models\Pais;
use App\Models\Disciplina;

use Illuminate\Http\Request;

class DeportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deportistas = Deportista::all();
        return view('deportistas.index', compact('deportistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $paises = Pais::all();
        $disciplinas = Disciplina::all();
        return view('deportistas.nuevo', compact('paises', 'disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validación
        $request->validate([
            'NombreDeportista' => 'required|string|max:150',
            'FechaNacimiento' => 'required|date',
            'EstaturaCM' => 'nullable|integer|min:100|max:250',
            'PesoKG' => 'nullable|integer|min:30|max:200',
            'IdPais' => 'required|exists:pais,id',
            'IdDisciplina' => 'required|exists:disciplinas,id'
        ]);

        // Crear el deportista
        $datos = [
            'NombreDeportista' => $request->NombreDeportista,
            'FechaNacimiento' => $request->FechaNacimiento,
            'EstaturaCM' => $request->EstaturaCM,
            'PesoKG' => $request->PesoKG,
            'IdPais' => $request->IdPais,
            'IdDisciplina' => $request->IdDisciplina,
        ];

        Deportista::create($datos);

        return redirect()->route('deportistas.index')->with('message', 'Deportista creado correctamente');
        
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
        $deportista = Deportista::find($id);
        $paises = Pais::all();
        $disciplinas = Disciplina::all();
        return view('deportistas.editar', compact('deportista', 'paises', 'disciplinas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $deportista = Deportista::find($id);
        $deportista->NombreDeportista = $request->NombreDeportista;
        $deportista->FechaNacimiento = $request->FechaNacimiento;
        $deportista->EstaturaCM = $request->EstaturaCM;
        $deportista->PesoKG = $request->PesoKG;
        $deportista->IdPais = $request->IdPais;
        $deportista->IdDisciplina = $request->IdDisciplina;
        $deportista->save();
        return redirect()->route('deportistas.index')->with('message', 'Deportista actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Deportista::destroy($id);
        return redirect()->route('deportistas.index')->with('message', 'Deportista eliminado correctamente');
    }
}
