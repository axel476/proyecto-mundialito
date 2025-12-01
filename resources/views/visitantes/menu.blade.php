@extends('layout.app2')

@section('contenido')
<!DOCTYPE html>
<html>
<head>
    <title>Visitante - Vista de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Bienvenido Visitante (Solo Lectura)</h1>
        <p>Usuario: {{ Session::get('nombre_usuario') }}</p>
        
        <a href="{{ route('logout') }}" class="btn btn-secondary mb-3">Cerrar Sesión</a>
        
        <!-- Aquí muestra las tablas en modo SOLO LECTURA -->
        <h3>Deportistas</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>País</th>
                    <th>Disciplina</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Deportista::with(['pais', 'disciplina'])->get() as $deportista)
                <tr>
                    <td>{{ $deportista->NombreDeportista }}</td>
                    <td>{{ $deportista->pais->NombrePais }}</td>
                    <td>{{ $deportista->disciplina->NombreDisciplina }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Puedes agregar más tablas de solo lectura aquí -->
    </div>
</body>
</html>


@endsection