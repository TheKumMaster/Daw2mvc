<div class="container my-5">
    <h1 class="text-uppercase fw-bold text-white mb-4">Tu Carrito</h1>

    <?php if (empty($carrito)): ?>
        <div class="card bg-white text-yeahger border-0 rounded-4 shadow-sm text-center p-5">
            <p class="fs-5 fw-bold mb-4">Tu carrito está vacío.</p>
            <div>
                <a href="<?= url ?>?controller=producto&action=index" class="btn btn-yeahger rounded-pill px-4 py-2 fw-bold">
                    Ver la Carta
                </a>
            </div>
        </div>
    <?php else: ?>
        <?php $total = 0; ?>

        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="d-flex flex-column gap-3">
                    <?php foreach ($carrito as $index => $item): ?>
                        <?php
                            $lineaTotal = $item['precio_unitario'] * $item['cantidad'];
                            $total += $lineaTotal;
                            $img = !empty($item['imagen']) ? $item['imagen'] : 'default.png';
                        ?>
                        <div class="card bg-white text-yeahger border-0 rounded-4 shadow-sm p-3">
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                                <img src="<?= url ?>assets/img/<?= htmlspecialchars($img) ?>"
                                     alt="<?= htmlspecialchars($item['nombre']) ?>"
                                     class="rounded object-fit-cover"
                                     width="80" height="80">

                                <div class="flex-grow-1">
                                    <h5 class="fw-bold mb-1"><?= htmlspecialchars($item['nombre']) ?></h5>
                                    <?php if (!empty($item['modificaciones'])): ?>
                                        <ul class="list-unstyled small fw-semibold mb-1">
                                            <?php foreach ($item['modificaciones'] as $mod): ?>
                                                <li>
                                                    <?= $mod['accion'] === 'quitar' ? 'Sin ' : '+ ' ?>
                                                    <?= htmlspecialchars($mod['nombre']) ?>
                                                    <?php if ($mod['precio_extra'] > 0): ?>
                                                        (+<?= number_format($mod['precio_extra'], 2) ?> €)
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <span class="small opacity-75 fw-semibold">
                                        <?= number_format($item['precio_unitario'], 2) ?> € / ud
                                    </span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between justify-content-sm-end gap-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="<?= url ?>?controller=carrito&action=down&index=<?= $index ?>"
                                           class="btn btn-yeahger btn-sm rounded-circle fw-bold d-flex align-items-center justify-content-center"
                                           style="width: 30px; height: 30px;">-</a>
                                        <span class="fw-bold px-1"><?= $item['cantidad'] ?></span>
                                        <a href="<?= url ?>?controller=carrito&action=up&index=<?= $index ?>"
                                           class="btn btn-yeahger btn-sm rounded-circle fw-bold d-flex align-items-center justify-content-center"
                                           style="width: 30px; height: 30px;">+</a>
                                    </div>

                                    <span class="fw-bold fs-5 text-end" style="min-width: 75px;">
                                        <?= number_format($lineaTotal, 2) ?> €
                                    </span>

                                    <a href="<?= url ?>?controller=carrito&action=remove&index=<?= $index ?>"
                                       class="btn btn-outline-danger btn-sm border-0 fw-bold">
                                        ✕
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card product-card border-0 text-white rounded-4 p-4">
                    <h4 class="fw-bold text-uppercase mb-3">Resumen</h4>

                    <div class="d-flex justify-content-between fs-4 fw-bold text-warning mb-4">
                        <span>Total</span>
                        <span><?= number_format($total, 2) ?> €</span>
                    </div>

                    <div class="d-grid gap-2">
                        <?php if (isset($_SESSION['usuario_id'])): ?>
                            <a href="<?= url ?>?controller=pedido&action=confirmar" class="btn btn-yeahger rounded-pill py-2 fw-bold">
                                Finalizar Compra
                            </a>
                        <?php else: ?>
                            <a href="<?= url ?>?controller=usuario&action=login" class="btn btn-yeahger rounded-pill py-2 fw-bold">
                                Inicia sesión para comprar
                            </a>
                        <?php endif; ?>

                        <a href="<?= url ?>?controller=carrito&action=clear" class="btn btn-outline-light rounded-pill py-2">
                            Vaciar Carrito
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>