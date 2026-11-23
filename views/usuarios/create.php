<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Registro de Usuario</h2>
        <form action="?controller=usuario&action=save" method="POST" class="auth-form">
            <label>Nombre</label>
            <input type="text" name="nombre" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <label>Teléfono</label>
            <input type="text" name="telefono">

            <label>Dirección</label>
            <input type="text" name="direccion">

            <label>Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento">

            <button type="submit" class="btn-auth">Registrarse</button>
        </form>
        <div class="auth-links">
            <a href="?controller=usuario&action=login">Ya tengo cuenta</a>
        </div>
    </div>
</div>