<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title> SBSC | Registro</title>
</head>
<body>
    <p>Hola! Se ha registrado un nuevo usuario en el sistema para este correo electrónico.</p>
    <p>Estos son los datos del nuevo usuario:</p>
    <ul>
        <li>Nombre: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
        <li>Departamento: {{ $user->department->name }}</li>
        <li>Rol:
          @foreach($user->roles as $role)
            {{ $role->name }}
          @endforeach
        </li>
    </ul>
    <p>Para poder ingresar debe restablecer su Contraseña en el siguiente enlace:</p>
    <p><a href="{{ url('password/reset') }}">Ir a SBSC</a></p>
</body>
</html>
