<div class="container-fluid px-4 px-lg-5 my-5">

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
                <section class="mb-5 pb-3">
                    <div class="d-flex justify-content-between align-items-baseline mb-4">
                        <h2 class="text-uppercase fw-bold text-white mb-0 tracking-wide">
                            <?= htmlspecialchars(strtoupper($cat->nombre)) ?>
                        </h2>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                        <?php while ($plato = $productosCat->fetch_object()): ?>
                            <div class="col">
                                <a href="<?= url ?>?controller=producto&action=show&id=<?= $plato->id ?>" class="text-decoration-none d-block jager-card">
                                    <div class="jager-img-box rounded-4 overflow-hidden position-relative d-flex align-items-center justify-content-center p-4">
                                        <?php $img = !empty($plato->imagen) ? $plato->imagen : 'default.png'; ?>
                                        <img src="<?= url ?>assets/img/<?= htmlspecialchars($img) ?>" 
                                            class="jager-img" 
                                            alt="<?= htmlspecialchars($plato->nombre) ?>">

                                        <span class="jager-bag-icon d-flex align-items-center justify-content-center rounded-circle">
                                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="pt-3 text-start">
                                        <h6 class="text-uppercase fw-bold text-white mb-1 lh-sm">
                                            <?= htmlspecialchars($plato->nombre) ?>
                                        </h6>
                                        <p class="text-white-50 fw-semibold small mb-0">
                                            €<?= number_format($plato->precio, 2, ',', '.') ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-white text-center mt-5">No hay categorías disponibles.</p>
    <?php endif; ?>

</div>