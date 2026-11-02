<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta del Restaurante - Yeahgermeister</title>
    <link rel="stylesheet" href="<?= url ?>assets/css/admin.css?v=<?= time() ?>">
</head>
<body>

<div class="admin-container">

    <div style="margin-bottom: 15px;">
        <a href="<?= url ?>">← Volver al Home</a>
    </div>

    <h1>NUESTRA CARTA</h1>

    <div style="margin: 20px 0;">
        <a href="<?= url ?>?controller=producto&action=create" class="btn-action">Añadir Nuevo Plato</a>
    </div>

    <?php 
        $listaPlatos = $productos ?? $camisetas ?? null; 
    ?>

    <table class="crud-table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Plato</th>
                <th>Descripción / Ingredientes</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($listaPlatos) && is_object($listaPlatos) && $listaPlatos->num_rows > 0): ?>
                <?php while ($plato = $listaPlatos->fetch_object()): ?>
                    <tr>
                        <td>
                            <?php $img = !empty($plato->imagen) ? $plato->imagen : 'default.png'; ?>
                            <img src="<?= url ?>assets/img/<?= $img ?>" alt="<?= htmlspecialchars($plato->nombre) ?>" width="50" height="50" style="object-fit: cover; border-radius: 8px;">
                        </td>
                        <td><strong><?= htmlspecialchars($plato->nombre) ?></strong></td>
                        <td><?= !empty($plato->descripcion) ? htmlspecialchars($plato->descripcion) : '-' ?></td>
                        <td><?= number_format($plato->precio, 2) ?> €</td>
                        <td>
                            <a href="<?= url ?>?controller=producto&action=show&id=<?= $plato->id ?>" class="btn-action btn-secondary" style="font-size: 11px; padding: 6px 12px;">Ver detalles</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">No hay platos añadidos en la carta todavía.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>