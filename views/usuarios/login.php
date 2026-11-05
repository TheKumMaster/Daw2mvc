<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/global.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="?controller=usuario&action=validar" method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>
    <br>
    <a href="?controller=usuario&action=create">Crear una cuenta</a> | 
    <a href="?controller=home&action=index">Volver al inicio</a>
</body>
</html>