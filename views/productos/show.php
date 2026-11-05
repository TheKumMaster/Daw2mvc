<div class="product-show-container">

    <div style="margin-bottom: 20px;">
        <a href="<?= url ?>?controller=producto&action=index">← Volver a la carta</a>
    </div>

    <?php if ($producto): ?>
        <div class="product-card-hero">
            <div class="img-wrapper">
                <?php $img = !empty($producto->imagen) ? $producto->imagen : 'default.png'; ?>
                <img src="<?= url ?>assets/img/<?= $img ?>" alt="<?= htmlspecialchars($producto->nombre) ?>">
            </div>

            <div class="content-wrapper">
                <span class="subtitle">Detalles del Plato</span>
                <h1><?= htmlspecialchars($producto->nombre) ?></h1>
                
                <p class="description">
                    <?= !empty($producto->descripcion) ? htmlspecialchars($producto->descripcion) : 'Ingredientes y preparación seleccionados especialmente para nuestra carta.' ?>
                </p>

                <div class="price"><?= number_format($producto->precio, 2) ?> €</div>
            </div>
        </div>
    <?php else: ?>
        <p>El producto no existe.</p>
    <?php endif; ?>

</div>