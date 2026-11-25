<div class="cart-container">
    <h1 class="cart-title">Tu Carrito</h1>

    <?php if (empty($carrito)): ?>
        <div class="cart-empty">
            <p>Tu carrito está vacío.</p>
            <a href="<?= url ?>?controller=producto&action=index" class="btn-add-cart">Ver la Carta</a>
        </div>
    <?php else: ?>
        <?php $subtotal = 0; ?>
        <div class="cart-list">
            <?php foreach ($carrito as $index => $item): ?>
                <?php
                    $lineaTotal = $item['precio_unitario'] * $item['cantidad'];
                    $subtotal += $lineaTotal;
                    $img = !empty($item['imagen']) ? $item['imagen'] : 'default.png';
                ?>
                <div class="cart-item">
                    <img src="<?= url ?>assets/img/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>" class="cart-item-img">

                    <div class="cart-item-info">
                        <h3><?= htmlspecialchars($item['nombre']) ?></h3>
                        <?php if (!empty($item['modificaciones'])): ?>
                            <ul class="cart-mods">
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
                        <span class="cart-unit-price"><?= number_format($item['precio_unitario'], 2) ?> € / ud</span>
                    </div>

                    <div class="cart-item-qty">
                        <a href="<?= url ?>?controller=carrito&action=down&index=<?= $index ?>" class="qty-btn">-</a>
                        <span><?= $item['cantidad'] ?></span>
                        <a href="<?= url ?>?controller=carrito&action=up&index=<?= $index ?>" class="qty-btn">+</a>
                    </div>

                    <div class="cart-item-subtotal">
                        <?= number_format($lineaTotal, 2) ?> €
                    </div>

                    <a href="<?= url ?>?controller=carrito&action=remove&index=<?= $index ?>" class="cart-remove-btn">✕</a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php
            $iva = $subtotal * 0.10;
            $total = $subtotal + $iva;
        ?>

        <div class="cart-summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <span><?= number_format($subtotal, 2) ?> €</span>
            </div>
            <div class="summary-row">
                <span>IVA (10%)</span>
                <span><?= number_format($iva, 2) ?> €</span>
            </div>
            <div class="summary-row summary-total">
                <span>Total</span>
                <span><?= number_format($total, 2) ?> €</span>
            </div>

            <div class="cart-actions">
                <a href="<?= url ?>?controller=carrito&action=clear" class="btn-back-menu">Vaciar Carrito</a>
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <a href="<?= url ?>?controller=pedido&action=confirmar" class="btn-add-cart">Finalizar Compra</a>
                <?php else: ?>
                    <a href="<?= url ?>?controller=usuario&action=login" class="btn-add-cart">Inicia sesión para comprar</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>