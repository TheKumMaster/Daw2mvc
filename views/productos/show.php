<div class="product-show-container">

    <?php if (isset($producto) && !empty($producto)): ?>
        <div class="product-show-card">
            
            <div class="product-show-img-box">
                <?php $img = !empty($producto->imagen) ? $producto->imagen : 'default.png'; ?>
                <img src="<?= url ?>assets/img/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($producto->nombre) ?>" class="product-show-img">
            </div>

            <div class="product-show-info">
                <span class="product-show-subtitle">Detalles del Plato</span>
                <h1 class="product-show-title"><?= htmlspecialchars($producto->nombre) ?></h1>
                <p class="product-show-desc"><?= htmlspecialchars($producto->descripcion) ?></p>

                <div class="product-show-price">
                    <?= number_format($producto->precio, 2) ?> €
                </div>

                <form action="<?= url ?>?controller=carrito&action=add" method="POST">
                    <input type="hidden" name="producto_id" value="<?= $producto->id ?>">

                    <div class="ingredientes-container">
                        
                        <?php if (isset($ingredientesIncluidos) && $ingredientesIncluidos->num_rows > 0): ?>
                            <?php while ($ing = $ingredientesIncluidos->fetch_object()): ?>
                                <div class="ingrediente-row">
                                    <div class="ingrediente-badge">
                                        <?= htmlspecialchars($ing->nombre) ?>
                                    </div>
                                    <div class="qty-selector">
                                        <button type="button" class="qty-btn" onclick="decrement(<?= $ing->id ?>)">-</button>
                                        <input type="number" id="qty-<?= $ing->id ?>" name="incluidos[<?= $ing->id ?>]" value="1" min="0" max="1" readonly class="qty-input">
                                        <button type="button" class="qty-btn" onclick="increment(<?= $ing->id ?>, 1)">+</button>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php if (isset($ingredientesExtras) && $ingredientesExtras->num_rows > 0): ?>
                            <?php while ($ext = $ingredientesExtras->fetch_object()): ?>
                                <div class="ingrediente-row">
                                    <div class="ingrediente-badge is-extra">
                                        <?= htmlspecialchars($ext->nombre) ?> (+<?= number_format($ext->precio_extra, 2) ?> €)
                                    </div>
                                    <div class="qty-selector">
                                        <button type="button" class="qty-btn" onclick="decrement(<?= $ext->id ?>)">-</button>
                                        <input type="number" id="qty-<?= $ext->id ?>" name="extras[<?= $ext->id ?>]" value="0" min="0" max="2" readonly class="qty-input">
                                        <button type="button" class="qty-btn" onclick="increment(<?= $ext->id ?>, 2)">+</button>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                    <div class="product-show-actions">
                        <button type="submit" class="btn-add-cart">Añadir al Carrito</button>
                        <a href="<?= url ?>?controller=producto&action=index" class="btn-back-menu">← Volver al Menú</a>
                    </div>
                </form>
            </div>

        </div>
    <?php else: ?>
        <div class="product-not-found">
            <h2>Lo sentimos, el producto solicitado no existe o no está disponible.</h2>
            <br>
            <a href="<?= url ?>?controller=producto&action=index">Volver al menú principal</a>
        </div>
    <?php endif; ?>

</div>

<script>
function increment(id, max) {
    const input = document.getElementById('qty-' + id);
    let val = parseInt(input.value);
    if (val < max) {
        input.value = val + 1;
    }
}
function decrement(id) {
    const input = document.getElementById('qty-' + id);
    let val = parseInt(input.value);
    if (val > 0) {
        input.value = val - 1;
    }
}
</script>