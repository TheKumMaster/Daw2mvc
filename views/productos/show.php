<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $producto ? htmlspecialchars($producto->nombre) : 'Producto' ?> - Yeahgermeister</title>
    <link rel="stylesheet" href="<?= url ?>assets/css/admin.css?v=<?= time() ?>">
    <style>
        .product-show-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .product-card-hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            background-color: var(--color-fondo, #092D17);
            padding: 20px;
            border-radius: 20px;
        }

        .product-card-hero .img-wrapper {
            width: 100%;
            height: 380px;
            border-radius: 16px;
            overflow: hidden;
        }

        .product-card-hero .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .product-card-hero .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: #FFFFFF;
        }

        .product-card-hero .subtitle {
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--color-acento, #C35317);
            margin-bottom: 8px;
        }

        .product-card-hero h1 {
            font-size: 38px;
            font-weight: 800;
            text-transform: uppercase;
            line-height: 1.1;
            margin-bottom: 15px;
        }

        .product-card-hero .description {
            font-size: 15px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .product-card-hero .price {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .actions-group {
            display: flex;
            gap: 15px;
        }

        @media (max-width: 768px) {
            .product-card-hero {
                grid-template-columns: 1fr;
            }
            .product-card-hero .img-wrapper {
                height: 260px;
            }
        }
    </style>
</head>
<body>

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

                <div class="actions-group">
                    <a href="<?= url ?>?controller=producto&action=delete&id=<?= $producto->id ?>" 
                       class="btn-action" 
                       onclick="return confirm('¿Estás seguro de que deseas eliminar este plato?');">
                       Eliminar Producto
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>El producto no existe.</p>
    <?php endif; ?>

</div>
    

</body>
</html>