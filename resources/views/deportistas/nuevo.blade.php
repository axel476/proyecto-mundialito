
@extends('layout.app')

@section('contenido')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-person-plus"></i> Nuevo Deportista</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('deportistas.store') }}" method="POST" id="frm_nuevo_deportista">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="NombreDeportista" class="form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" id="NombreDeportista" name="NombreDeportista" required
                                   placeholder="Ej: Juan Pérez García">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="EstaturaCM" class="form-label">Estatura (cm):</label>
                            <input type="number" class="form-control" id="EstaturaCM" name="EstaturaCM" 
                                   placeholder="Ej: 175">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="PesoKG" class="form-label">Peso (kg):</label>
                            <input type="number" class="form-control" id="PesoKG" name="PesoKG" 
                                   placeholder="Ej: 70">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="IdPais" class="form-label">País:</label>
                            <select class="form-control" id="IdPais" name="IdPais" required>
                                <option value="">Seleccionar País</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}">{{ $pais->NombrePais }}</option>
                                @endforeach
                            </select>
                            @if($paises->count() == 0)
                                <small class="text-danger">Primero debes crear un país</small>
                            @endif
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="IdDisciplina" class="form-label">Disciplina:</label>
                            <select class="form-control" id="IdDisciplina" name="IdDisciplina" required>
                                <option value="">Seleccionar Disciplina</option>
                                @foreach($disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->NombreDisciplina }}</option>
                                @endforeach
                            </select>
                            @if($disciplinas->count() == 0)
                                <small class="text-danger">Primero debes crear una disciplina</small>
                            @endif
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('deportistas.index') }}" class="btn btn-secondary me-md-2">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary" >
                            <i class="bi bi-check-circle"></i> Guardar Deportista
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
  $("#frm_nuevo_deportista").validate({
    rules: {
      NombreDeportista: {
        required: true,
        minlength: 3
      },
      FechaNacimiento: {
        required: true
      },
      EstaturaCM: {
        required: true,
      },
      
      PesoKG:{
        required: true,
      },
      IdPais: {
        required: true
      },
      IdDisciplina: {
        required: true
      }
    },
    messages: {
      NombreDeportista: {
        required: "El nombre es obligatorio",
        minlength: "El nombre debe tener al menos 3 caracteres"
      },
      FechaNacimiento: {
        required: "La fecha es obligatoria",
      },
      EstaturaCM: {
        required: "La estatura es obligatoria",
      },
      PesoKG: {
        required: "El peso es obligatoria"
      },
      IdPais: {
        required: "EL pais es obligatoria"
      },
      IdDisciplina: {
        required: "La Disciplina es obligatoria"
      }
    }
  });
</script>
@endsection