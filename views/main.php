<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$totalArticulos = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $totalArticulos += $item['cantidad'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeahgermeister - Restaurante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= url ?>assets/css/global.css?v=<?= time() ?>">
    <link rel="stylesheet" href="<?= url ?>assets/css/Home.css?v=<?= time() ?>">
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark main-header px-3 px-lg-5 py-3">
        <div class="container-fluid">
            <a href="<?= url ?>" class="navbar-brand d-flex align-items-center gap-2 fw-bold">
                <div class="logo-circle">
                    <img src="<?= url ?>\assets\img\logo yeahgermeister.svg" alt="Logo Yeahgermeister">
                </div>
                <span>YEAHGERMEISTER</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarYeahger">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarYeahger">
                <div class="navbar-nav align-items-lg-center gap-2 mt-3 mt-lg-0">
                    <a href="<?= url ?>" class="nav-capsule text-decoration-none">Menu</a>
                    <a href="<?= url ?>?controller=producto&action=index" class="nav-capsule text-decoration-none">Productos</a>
                    <a href="<?= url ?>?controller=carrito&action=index" class="nav-capsule text-decoration-none">
                        Carrito (<?= $totalArticulos ?>)
                    </a>

                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <a href="<?= url ?>?controller=usuario&action=show" class="nav-capsule text-decoration-none">
                            <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
                        </a>
                    <?php else: ?>
                        <a href="<?= url ?>?controller=usuario&action=login" class="user-icon-btn d-inline-flex align-items-center justify-content-center" aria-label="Perfil de Usuario">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="#FFFFFF">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        <?php 
            if (isset($vista) && file_exists($vista)) {
                require_once $vista;
            }
        ?>
    </main>

    <footer class="main-footer text-center py-3 mt-auto">
        <p class="mb-0">&copy; <?= date('Y') ?> Yeahgermeister. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>