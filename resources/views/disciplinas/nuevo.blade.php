@extends('layout.app')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="bi bi-trophy"></i> Nueva Disciplina</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('disciplinas.store') }}" method="POST" id="frm_nuevo_dc">
                    @csrf
                    <div class="mb-3">
                        <label for="NombreDisciplina" class="form-label">Nombre de la Disciplina:</label>
                        <input type="text" class="form-control" id="NombreDisciplina" name="NombreDisciplina" required
                               placeholder="Ej: Fútbol, Atletismo, Natación...">
                        @error('NombreDisciplina')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-check-circle"></i> Guardar Disciplina
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

<script>
  $("#frm_nuevo_dc").validate({
    rules: {
      NombreDisciplina: {
        required: true,
        minlength: 3
      }
    },
    messages: {
      NombreDisciplina: {
        required: "El nombre es obligatorio",
        minlength: "El nombre debe tener al menos 3 caracteres"
      }
    },
    submitHandler: function(form) {
        Swal.fire({
            title: '¿Crear disciplina?',
            text: "¿Estás seguro de crear esta disciplina?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, crear',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
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