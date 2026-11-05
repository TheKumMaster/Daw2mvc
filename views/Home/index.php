<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeahgermeister - Home</title>
    <link rel="stylesheet" href="<?= url ?>assets/css/global.css">
    <link rel="stylesheet" href="<?= url ?>assets/css/Home.css">
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container">

    <header>
        <div class="logo">YEAHGERMEISTER</div>
        <nav>
            <a href="<?= url ?>?controller=producto&action=index" class="nav-btn">Productos</a>
            <a href="<?= url ?>?controller=categoria&action=index" class="nav-btn">Categorías</a>

            <!-- BLOQUE DE USUARIO DINÁMICO -->
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="<?= url ?>?controller=usuario&action=show" class="nav-btn" style="background-color: #e9ecef; color: #333;">Mi Perfil</a>
                <a href="<?= url ?>?controller=usuario&action=logout" class="nav-btn" style="background-color: #dc3545; color: white;">Cerrar Sesión</a>
            <?php else: ?>
                <a href="<?= url ?>?controller=usuario&action=login" class="nav-btn">Iniciar Sesión</a>
                <a href="<?= url ?>?controller=usuario&action=create" class="nav-btn btn-primary">Registrarse</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="section-block">
        <h1>RESERVE UNA MESA CON PARKING!</h1>
        <p>Alimentos ricos en proteína y ecológicos.</p>
    </section>

    <section class="section-block">
        <h2>PLATOS DESTACADOS</h2>
        <p>[Espacio reservado para las tarjetas de productos destacados]</p>
    </section>

    <section class="section-block">
        <h2>VER LA CARTA COMPLETA</h2>
        <p>Aquí verás todos los productos que servimos tanto en menú como a la carta.</p>
        <br>
        <a href="<?= url ?>?controller=producto&action=index" class="nav-btn btn-primary">Ir a Menú</a>
    </section>

    <footer>
        <p>Sobre nosotros | © yeahgermeister</p>
    </footer>

</div>

</body>
</html>