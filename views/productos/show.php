<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
</head>
<body>
    <h2>Detalles de: <?= $producto->getNombre() ?></h2>
    
    <?php if ($producto): ?>
        <ul>
            <li><strong>ID:</strong> <?= $producto->getId() ?></li>
            <li><strong>Categoría ID:</strong> <?= $producto->getCategoriaId() ?></li>
            <li><strong>Nombre:</strong> <?= $producto->getNombre() ?></li>
            <li><strong>Descripción:</strong> <?= $producto->getDescripcion() ?></li>
            <li><strong>Precio:</strong> <?= $producto->getPrecio() ?> €</li>
            <li><strong>Imagen:</strong> <?= $producto->getImagen() ?></li>
            <li><strong>Estado:</strong> <?= $producto->getActivo() ? 'Activo' : 'Inactivo' ?></li>
        </ul>
    <?php else: ?>
        <p style="color: red;">Producto no encontrado.</p>
    <?php endif; ?>

    <br>
    <a href="?controller=producto&action=index">Volver a la carta</a>
</body>
</html>