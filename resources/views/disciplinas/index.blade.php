@extends('layout.app')

@section('contenido')

<!DOCTYPE html>
<html>
<head>
    <title>Disciplinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Disciplinas</h1>
        
        <a href="{{ route('disciplinas.create') }}" class="btn btn-success mb-3">
            Crear Nueva Disciplina
        </a>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Disciplina</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->NombreDisciplina }}</td>
                    <td>
                        <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <form action="" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

<!-- Mostrar mensaje de confirmación -->
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