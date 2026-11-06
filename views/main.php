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
