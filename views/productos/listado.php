<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carta del Restaurante</title>
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Nuestra Carta</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="?controller=producto&action=create">Añadir Nuevo Producto</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $p): ?>
            <tr>
                <td><?= $p->getId() ?></td>
                <td><?= $p->getNombre() ?></td>
                <td><?= $p->getDescripcion() ?></td>
                <td><?= $p->getPrecio() ?> €</td>
                <td>
                    <a href="?controller=producto&action=show&id=<?= $p->getId() ?>">Ver detalles</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">No hay productos en la carta.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>