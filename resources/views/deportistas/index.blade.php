@extends('layout.app')

@section('contenido')
<!DOCTYPE html>
<html>
<head>
    <title>Deportistas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Deportistas</h1>
        <a href="{{ route('deportistas.create') }}" class="btn btn-success mb-3">
            Crear Nuevo Deportista
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>País</th>
                    <th>Disciplina</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deportistas as $deportista)
                <tr>
                    <td>{{ $deportista->NombreDeportista }}</td>
                    <td>{{ $deportista->pais->NombrePais }}</td>
                    <td>{{ $deportista->disciplina->NombreDisciplina }}</td>
                    <td>
                        <a href="{{ route('deportistas.edit', $deportista->id) }}" class="btn btn-warning btn-sm"> <!-- AGREGADA RUTA -->
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