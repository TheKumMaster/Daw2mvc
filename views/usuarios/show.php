<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Mis Datos Personales</h2>
        <form action="?controller=usuario&action=update" method="POST" class="auth-form">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($usuario->getNombre()) ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario->getEmail()) ?>" required>

            <label>Teléfono</label>
            <input type="text" name="telefono" value="<?= htmlspecialchars($usuario->getTelefono()) ?>">

            <label>Dirección</label>
            <input type="text" name="direccion" value="<?= htmlspecialchars($usuario->getDireccion()) ?>">

            <label>Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($usuario->getFechaNacimiento()) ?>">

            <button type="submit" class="btn-auth">Actualizar datos</button>
        </form>
        <div class="auth-links">
            <a href="?controller=usuario&action=logout">Cerrar sesión</a>
        </div>
    </div>
</div>