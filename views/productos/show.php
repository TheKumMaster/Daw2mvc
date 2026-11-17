<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="product-show-container">

    <?php if (isset($producto) && !empty($producto)): ?>
        <div class="product-show-card">
            
            <!-- Imagen del producto -->
            <div class="product-show-img-box">
                <?php 
                $img = !empty($producto->imagen) ? $producto->imagen : 'default.png'; 
                ?>
                <img src="<?= url ?>assets/img/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($producto->nombre) ?>" class="product-show-img">
            </div>

            <div class="product-show-info">
                <span class="product-show-subtitle">Detalles del Plato</span>
                
                <h1 class="product-show-title"><?= htmlspecialchars($producto->nombre) ?></h1>
                
                <p class="product-show-desc">
                    <?= htmlspecialchars($producto->descripcion) ?>
                </p>

                <div class="product-show-price">
                    <?= number_format($producto->precio, 2) ?> €
                </div>

                <div>
                    <a href="<?= url ?>?controller=producto&action=index" class="btn-back-menu">
                        ← Volver al Menú
                    </a>
                </div>
            </div>

        </div>
    <?php else: ?>
        <div class="product-not-found">
            <h2>Lo sentimos, el producto solicitado no existe o no está disponible.</h2>
            <br>
            <a href="<?= url ?>?controller=producto&action=index" style="color: #a3e4d7;">Volver al menú principal</a>
        </div>
    <?php endif; ?>

</div>