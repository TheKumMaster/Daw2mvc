<div class="menu-catalog">

    <section class="category-section">
        <h2 class="category-title">HAMBURGUESAS</h2>

        <div class="products-grid">
            <?php if (isset($productos) && is_object($productos) && $productos->num_rows > 0): ?>
                <?php while ($plato = $productos->fetch_object()): ?>
                    <div class="product-card-item">
                        <div class="img-box">
                            <?php $img = !empty($plato->imagen) ? $plato->imagen : 'default.png'; ?>
                            <img src="<?= url ?>assets/img/<?= $img ?>" alt="<?= htmlspecialchars($plato->nombre) ?>">
                        </div>

                        <div class="product-name"><?= htmlspecialchars($plato->nombre) ?></div>
                        <div class="product-price"><?= number_format($plato->precio, 2) ?> €</div>

                        <a href="<?= url ?>?controller=producto&action=show&id=<?= $plato->id ?>" class="btn-card-action">
                            Ver detalles
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p style="color: var(--color-blanco);">No hay platos disponibles en este momento.</p>
            <?php endif; ?>
        </div>
    </section>

</div>