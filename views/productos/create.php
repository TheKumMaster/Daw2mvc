<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
</head>
<body>
    <h2>Añadir Nuevo Producto a la Carta</h2>
    <form action="?controller=producto&action=save" method="POST">
        
        <label for="categoria_id">ID de Categoría (ej: 1 para Hamburguesas):</label><br>
        <input type="number" id="categoria_id" name="categoria_id" required><br><br>

        <label for="nombre">Nombre del producto:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="precio">Precio (€):</label><br>
        <input type="number" step="0.01" id="precio" name="precio" required><br><br>

        <label for="imagen">Nombre de la imagen (ej: burger.jpg):</label><br>
        <input type="text" id="imagen" name="imagen" value="default.png"><br><br>

        <button type="submit">Guardar Producto</button>
    </form>
    <br>
    <a href="?controller=producto&action=index">Volver a la carta</a>
</body>
</html>