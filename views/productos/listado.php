<div class="menu-catalog">

    <?php 
    require_once 'models/CategoriaDAO.php';
    require_once 'models/ProductoDAO.php';
    
    $categorias = CategoriaDAO::getAll(); 
    ?>

    <?php if (isset($categorias) && is_object($categorias) && $categorias->num_rows > 0): ?>
        <?php while ($cat = $categorias->fetch_object()): ?>
            
            <?php 
            $productosCat = ProductoDAO::getByCategoria($cat->id); 
            ?>

            <?php if (isset($productosCat) && is_object($productosCat) && $productosCat->num_rows > 0): ?>
                <section class="category-section">
                    <h2 class="category-title"><?= htmlspecialchars(strtoupper($cat->nombre)) ?></h2>

                    <div class="products-grid">
                        <?php while ($plato = $productosCat->fetch_object()): ?>
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
                    </div>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php else: ?>
        <p style="color: var(--color-blanco); text-align: center; margin-top: 40px;">No hay categorías disponibles.</p>
    <?php endif; ?>

</div>