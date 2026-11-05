<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="assets/css/global.css">
</head>
<body>
    <h2>Mis Datos Personales</h2>
    <form action="?controller=usuario&action=update" method="POST">
        <input type="hidden" name="id" value="<?= $usuario->getId() ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $usuario->getNombre() ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $usuario->getEmail() ?>" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="<?= $usuario->getTelefono() ?>"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="<?= $usuario->getDireccion() ?>"><br><br>

        <label>Fecha de nacimiento:</label><br>
        <input type="date" name="fecha_nacimiento" value="<?= $usuario->getFechaNacimiento() ?>"><br><br>

        <button type="submit">Actualizar datos</button>
    </form>
    <br>
    <a href="?controller=home&action=index">Volver al inicio</a> | 
    <a href="?controller=usuario&action=logout">Cerrar sesión</a>
</body>
</html>