@extends('layout.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="bi bi-flag"></i> Editar País</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('paises.update', $pais->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="NombrePais" class="form-label">Nombre del País:</label>
                        <input type="text" class="form-control" id="NombrePais" name="NombrePais" 
                               value="{{ old('NombrePais', $pais->NombrePais) }}" required
                               placeholder="Ej: Perú, Argentina, Brasil...">
                        @error('NombrePais')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-check-circle"></i> Actualizar País
                        </button>
                        <a href="{{ route('paises.index') }}" class="btn btn-secondary">
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