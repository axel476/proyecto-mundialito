@extends('layout.app')

@section('contenido')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0"><i class="bi bi-person-gear"></i> Editar Deportista</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('deportistas.update', $deportista->id) }}" method="POST" id="frm_nuevo_deportista">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="NombreDeportista" class="form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" id="NombreDeportista" name="NombreDeportista" 
                                   value="{{ old('NombreDeportista', $deportista->NombreDeportista) }}" required
                                   placeholder="Ej: Juan Pérez García">
                            @error('NombreDeportista')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento" 
                                   value="{{ old('FechaNacimiento', $deportista->FechaNacimiento) }}" required>
                            @error('FechaNacimiento')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="EstaturaCM" class="form-label">Estatura (cm):</label>
                            <input type="number" class="form-control" id="EstaturaCM" name="EstaturaCM" 
                                   value="{{ old('EstaturaCM', $deportista->EstaturaCM) }}"
                                   placeholder="Ej: 175">
                            @error('EstaturaCM')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="PesoKG" class="form-label">Peso (kg):</label>
                            <input type="number" class="form-control" id="PesoKG" name="PesoKG" 
                                   value="{{ old('PesoKG', $deportista->PesoKG) }}"
                                   placeholder="Ej: 70">
                            @error('PesoKG')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="IdPais" class="form-label">País:</label>
                            <select class="form-control" id="IdPais" name="IdPais" required>
                                <option value="">Seleccionar País</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}" 
                                        {{ old('IdPais', $deportista->IdPais) == $pais->id ? 'selected' : '' }}>
                                        {{ $pais->NombrePais }}
                                    </option>
                                @endforeach
                            </select>
                            @error('IdPais')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if($paises->count() == 0)
                                <small class="text-danger">Primero debes crear un país</small>
                            @endif
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="IdDisciplina" class="form-label">Disciplina:</label>
                            <select class="form-control" id="IdDisciplina" name="IdDisciplina" required>
                                <option value="">Seleccionar Disciplina</option>
                                @foreach($disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}" 
                                        {{ old('IdDisciplina', $deportista->IdDisciplina) == $disciplina->id ? 'selected' : '' }}>
                                        {{ $disciplina->NombreDisciplina }}
                                    </option>
                                @endforeach
                            </select>
                            @error('IdDisciplina')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if($disciplinas->count() == 0)
                                <small class="text-danger">Primero debes crear una disciplina</small>
                            @endif
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('deportistas.index') }}" class="btn btn-secondary me-md-2">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle"></i> Actualizar Deportista
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


@if(session('message'))
    <script>
        Swal.fire({
            title: "CONFIRMACIÓN",
            text: "{{ session('message') }}",
            icon: "success",
        });
    </script>
@endif

@endsection