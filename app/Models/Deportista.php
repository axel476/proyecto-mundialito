<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'NombreDeportista',
        'FechaNacimiento',
        'EstaturaCM',
        'PesoKG',
        'IdPais',
        'IdDisciplina'

    ];


    // Relación con Disciplina

     public function pais()
    {
        return $this->belongsTo(Pais::class, 'IdPais');
    }

    // Relación con Disciplina
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'IdDisciplina');
    }
}
