@extends('layout.app2')

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
                </tr>
            </thead>
            <tbody>
                @foreach($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->NombreDisciplina }}</td>
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