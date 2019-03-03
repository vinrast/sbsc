<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title> SBSC | Actualización de Email</title>
</head>
<body>
    <p>Hola! Se ha actualizado el correo electronico para el usuario {{ $user->name }}.</p>
    <p>Estos son los datos del nuevo correo:</p>
    <ul>
        <li>Email Anterior: {{ $user->email }}</li>
        <li>Nuevo Email: {{ $new_email}}</li>
        <li>Contraseña: {{ $password }}</li>
        <li>Departamento: {{ $user->department->name }}</li>
        <li>Rol:@foreach($user->roles as $role)
                  {{ $role->name }}
                @endforeach
        </li>
    </ul>
    <p>Le recomendamos cambiar la contraseña genérica por una personalizada!!</p>
</body>
</html>
