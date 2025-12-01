<!-- formulario de inicio de sesion-->
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Autenticación</title>

    <!-- Importando jquery validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" ></script>
    <!-- Importando SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Importando archivos js de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importar css de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importando iconos de font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery y jQuery Validation -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .auth-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .form-container {
            padding: 40px;
        }
        
        .form-title {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        .form-group input:focus {
            border-color: #4285f4;
            outline: none;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: #4285f4;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .btn:hover {
            background: #3367d6;
        }
        
        .toggle-form {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .toggle-form a {
            color: #4285f4;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div id="login-form" class="form-container">
            <h2 class="form-title">Iniciar Sesión</h2>

            {{-- Mostrar errores y mensajes --}}
            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('info'))
                <div class="alert alert-success">{{ session('info') }}</div>
            @endif

            {{-- FORMULARIO LOGIN --}}
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="form-group">
                    <label for="correoUsuario">Correo Electrónico</label>
                    <input type="text" class="form-control" id="correoUsuario" name="correoUsuario" required>
                </div>
                <div class="form-group">
                    <label for="passwordUsuario">Contraseña</label>
                    <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario" required>
                </div>
                <button type="submit" class="btn">Ingresar</button>
            </form>

            <div class="toggle-form">
                ¿No tienes cuenta? <a onclick="toggleForm('register')">Regístrate aquí</a>
            </div>
        </div>

        {{-- FORMULARIO REGISTRO --}}
        <div id="register-form" class="form-container hidden">
            <h2 class="form-title">📩Formulario de Registro📩</h2>

            {{-- Mensajes de validación --}}
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul style="padding-left: 20px; text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('registro') }}">
                @csrf
                <div class="form-group">
                    <label for="regNombreUsuario">Nombre</label>
                    <input type="text" class="form-control" id="regNombreUsuario" name="nombreUsuario" required>
                </div>
                <div class="form-group">
                    <label for="regCorreoUsuario">Correo Electrónico</label>
                    <input type="email" class="form-control" id="regCorreoUsuario" name="correoUsuario" required>
                </div>
                <div class="form-group">
                    <label for="regPasswordUsuario">Contraseña</label>
                    <input type="password" class="form-control" id="regPasswordUsuario" name="passwordUsuario" minlength="6" required>
                    <div class="password-hint" style="font-size:12px; color:#666; margin-top:5px;">
                        Mínimo 6 caracteres
                    </div>
                </div>
                <button type="submit" class="btn">Registrarse</button>
            </form>

            <div class="toggle-form">
                ¿Ya tienes cuenta? <a onclick="toggleForm('login')">Inicia sesión aquí</a>
            </div>
        </div>

        {{-- FORMULARIO VERIFICACIÓN --}}
        <div id="verify-form" class="form-container hidden">
            <h2 class="form-title">Verifica tu correo</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verify.process') }}">
                @csrf
                <div class="form-group">
                    <label for="verification_code">Código de verificación</label>
                    <input type="text" class="form-control" id="verification_code" name="verification_code" >
                </div>
                <button type="submit" class="btn">Verificar</button>
            </form>
        </div>
    </div>

    <script>
        function toggleForm(formType) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            const verifyForm = document.getElementById('verify-form');

            loginForm.classList.add('hidden');
            registerForm.classList.add('hidden');
            verifyForm.classList.add('hidden');

            if (formType === 'register') {
                registerForm.classList.remove('hidden');
            } else if (formType === 'verify') {
                verifyForm.classList.remove('hidden');
            } else {
                loginForm.classList.remove('hidden');
            }
        }

        // Mostrar verify si viene redirigido tras registro
        @if (session('success') === 'Se ha enviado el código a tu correo')

        @endif
    </script>
</body>
</html>


<script>
    $(document).ready(function () {
            $("form").each(function () {
                $(this).validate({
                    errorClass: 'text-danger',
                    errorElement: 'div',
                    rules: {
                        correoUsuario: {
                            required: true,
                            email: true
                        },
                        passwordUsuario: {
                            required: true,
                            minlength: 6
                        },
                        nombreUsuario: {
                            required: true
                        },
                        verification_code: {
                            required: true,
                            digits: true,
                            minlength: 6,
                            maxlength: 6
                        }
                    },
                    messages: {
                        correoUsuario: {
                            required: "El correo es obligatorio.",
                            email: "El correo no es válido."
                        },
                        passwordUsuario: {
                            required: "La contraseña es obligatoria.",
                            minlength: "Debe tener al menos 6 caracteres."
                        },
                        nombreUsuario: {
                            required: "El nombre es obligatorio."
                        },
                        verification_code: {
                            required: "El código es obligatorio.",
                            digits: "Solo números.",
                            minlength: "Debe tener 6 dígitos.",
                            maxlength: "Debe tener 6 dígitos."
                        }
                    }
                });
            });
        });
</script>