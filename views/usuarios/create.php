<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="assets/css/global.css">
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="?controller=usuario&action=save" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion"><br><br>

        <label>Fecha de nacimiento:</label><br>
        <input type="date" name="fecha_nacimiento"><br><br>

        <button type="submit">Registrarse</button>
    </form>
    <br>
    <a href="?controller=usuario&action=login">Ya tengo cuenta</a>
</body>
</html>