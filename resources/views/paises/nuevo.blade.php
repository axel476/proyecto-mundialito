@extends('layout.app')

@section('contenido')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-flag"></i> Nuevo País</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('paises.store') }}" method="POST" id="frm_nuevo_paises">
                    @csrf
                    <div class="mb-3">
                        <label for="NombrePais" class="form-label">Nombre del País:</label>
                        <input type="text" class="form-control" id="NombrePais" name="NombrePais" required 
                               placeholder="Ej: Perú, Argentina, Brasil...">
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Guardar País
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
<script>
  $("#frm_nuevo_paises").validate({
    rules: {
      NombrePais: {
        required: true,
        minlength: 3
      }
    },
    messages: {
      NombrePais: {
        required: "El nombre es obligatorio",
        minlength: "El nombre debe tener al menos 3 caracteres"
      }
    }
  });
</script>

@if(session('message'))
<script>
    Swal.fire({
        title: '¡Éxito!',
        text: '{{ session('message') }}',
        icon: 'success',
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: 'Error',
        text: '{{ session('error') }}',
        icon: 'error',
        timer: 3000
    });
</script>
@endif
@endsection