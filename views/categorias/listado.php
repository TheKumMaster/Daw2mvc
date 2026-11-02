<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListadoCat</title>
    <link rel="stylesheet" href="<?= url ?>assets/css/global.css">
    <link rel="stylesheet" href="<?= url ?>assets/css/admin.css">
</head>
<body>
    <h2>Listado de Categorías</h2>

<a href="<?= url ?>?controller=categoria&action=create">Crear categoría</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php if (isset($categorias) && $categorias->num_rows > 0): ?>
        <?php while ($cat = $categorias->fetch_object()): ?>
            <tr>
                <td><?= $cat->id ?></td>
                <td><?= $cat->nombre ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">No hay categorías todavía.</td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>