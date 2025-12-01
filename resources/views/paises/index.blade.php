@extends('layout.app')

@section('contenido')

<!DOCTYPE html>
<html>
<head>
    <title>Países</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Países</h1>
        <a href="{{ route('paises.create') }}" class="btn btn-success mb-3">
            Crear Nuevo País
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paises as $pais)
                <tr>
                    <td>{{ $pais->NombrePais }}</td>
                    <td>
                        <a href="{{ route('paises.edit', $pais->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <form action="{{ route('paises.destroy', $pais->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
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

@if(session('error'))
<script>
    Swal.fire({
        title: 'Error',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonColor: '#3085d6'
    });
</script>
@endif
@endsection