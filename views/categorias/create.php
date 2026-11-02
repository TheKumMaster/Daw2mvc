<h2>Crear nueva categoría</h2>

<a href="<?= url ?>?controller=categoria&action=index">Volver al listado</a>
<br><br>

<form action="<?= url ?>?controller=categoria&action=save" method="POST">
    <label for="nombre">Nombre de la categoría:</label><br>
    <input type="text" name="nombre" id="nombre" required><br><br>

    <button type="submit">Guardar</button>
</form>