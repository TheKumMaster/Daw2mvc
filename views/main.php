<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeahgermeister - Restaurante</title>

    <link rel="stylesheet" href="<?= url ?>assets/css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= url ?>assets/css/admin.css?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= url ?>assets/css/Home.css?v=<?= time() ?>">
</head>
<body>

    <header class="main-header">
        <a href="<?= url ?>" class="brand-logo">
            <img src="<?= url ?>assets/img/logo yeahgermeister.jpg" alt="Logo Yeahgermeister" class="logo-img">
            <span>YEAHGERMEISTER</span>
        </a>

        <div class="header-right">
            <nav class="nav-links">
                <a href="<?= url ?>" class="nav-capsule">Menu</a>
                <a href="<?= url ?>?controller=producto&action=index" class="nav-capsule">Productos</a>
                <?php
                    $totalArticulos = 0;
                    if (!empty($_SESSION['carrito'])) {
                        foreach ($_SESSION['carrito'] as $item) {
                            $totalArticulos += $item['cantidad'];
                        }
                    }
                ?>
                <a href="<?= url ?>?controller=carrito&action=index" class="nav-capsule">
                    Carrito (<?= $totalArticulos ?>)
                </a>

            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="<?= url ?>?controller=usuario&action=show" class="nav-capsule">
                    <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
                </a>
            <?php else: ?>
                <a href="<?= url ?>?controller=usuario&action=login" class="user-icon-btn" aria-label="Perfil de Usuario">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="#FFFFFF">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </header>

    <main class="main-content">
        <?php 
            if (isset($vista) && file_exists($vista)) {
                require_once $vista;
            }
        ?>
    </main>

    <footer class="main-footer">
        <p>&copy; <?= date('Y') ?> Yeahgermeister. Todos los derechos reservados.</p>
    </footer>

</body>
</html>