<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Iniciar Sesión</h2>
        <form action="?controller=usuario&action=validar" method="POST" class="auth-form">
            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-auth">Entrar</button>
        </form>
        <div class="auth-links">
            <a href="?controller=usuario&action=create">Crear una cuenta</a>
        </div>
    </div>
</div>