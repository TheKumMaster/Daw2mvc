<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Plato - Yeahgermeister</title>
    <link rel="stylesheet" href="<?= url ?>assets/css/admin.css?v=<?= time() ?>">
</head>
<body>

<div class="admin-container">
    
    <div style="margin-bottom: 15px;">
        <a href="<?= url ?>?controller=producto&action=index">← Volver a la carta</a>
    </div>
    
    <h2>AÑADIR NUEVO PLATO</h2>

    <form action="<?= url ?>?controller=producto&action=save" method="POST" enctype="multipart/form-data" class="crud-form">
        
        <label for="nombre">Nombre del plato:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Ej: Yeahgerburger" required>

        <label for="descripcion">Descripción / Ingredientes:</label>
        <textarea name="descripcion" id="descripcion" rows="3" placeholder="Hamburguesa de ternera a la parrilla con pepinillos, queso..."></textarea>

        <label for="categoria_id">ID de Categoría (opcional):</label>
        <input type="number" name="categoria_id" id="categoria_id" placeholder="1">

        <label for="precio">Precio (€):</label>
        <input type="number" step="0.01" name="precio" id="precio" placeholder="11.95" required>

        <label for="imagen">Imagen del plato:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">

        <button type="submit" class="btn-action">Guardar Plato</button>
    </form>

</div>

</body>
</html>