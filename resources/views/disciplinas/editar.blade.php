@extends('layout.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="bi bi-trophy"></i> Editar Disciplina</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('disciplinas.update', $disciplina->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="NombreDisciplina" class="form-label">Nombre de la Disciplina:</label>
                        <input type="text" class="form-control" id="NombreDisciplina" name="NombreDisciplina" 
                               value="{{ old('NombreDisciplina', $disciplina->NombreDisciplina) }}" required
                               placeholder="Ej: Fútbol, Atletismo, Natación...">
                        @error('NombreDisciplina')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-check-circle"></i> Actualizar Disciplina
                        </button>
                        <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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