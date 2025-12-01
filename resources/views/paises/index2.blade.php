@extends('layout.app2')

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
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del País</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paises as $pais)
                <tr>
                    <td>{{ $pais->NombrePais }}</td>
                    
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