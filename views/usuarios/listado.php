<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="assets/css/global.css">
</head>
<body>
    <h2>Listado de Usuarios</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Rol</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= $u->getId() ?></td>
            <td><?= $u->getNombre() ?></td>
            <td><?= $u->getEmail() ?></td>
            <td><?= $u->getTelefono() ?></td>
            <td><?= $u->getRol() ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="?controller=home&action=index">Volver al inicio</a>
</body>
</html>