<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
</head>
<body>
<?php require './get_products.php'; ?>

<h1>Добро пожаловать!</h1>
<h1>Выберите ваш продукт</h1>
<div class="container">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <div class="effect-1"></div>
            <div class="effect-2"></div>
            <div class="content">
                <?php if ($product['image']): ?>
                    <div class="product-image" style="background-image: url('images/<?= htmlspecialchars($product['image']) ?>')"></div>
                <?php endif; ?>
            </div>
            <span class="title">
            <?= htmlspecialchars($product['name']) ?>
            <span><?= number_format($product['price'], 2) ?> р</span>
        </span>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>

<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        justify-content: center;
    }

    .product {
        position: relative;
        width: 250px;
        height: 300px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    .product:hover {
        transform: translateY(-10px);
    }

    .effect-1,
    .effect-2 {
        position: absolute;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        filter: blur(30px);
    }

    .effect-1 {
        width: 150px;
        height: 150px;
        top: -50px;
        right: -50px;
    }

    .effect-2 {
        width: 100px;
        height: 100px;
        bottom: -30px;
        left: -30px;
    }

    .content {
        position: relative;
        height: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .product-image {
        width: 160px;
        height: 160px;
        background-size: cover;
        background-position: center;
        border-radius: 50%;
        z-index: 2;
    }

    .title {
        display: block;
        text-align: center;
        padding: 15px 0;
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .title span {
        display: block;
        font-size: 14px;
        font-weight: normal;
        color: #666;
        margin-top: 5px;
    }
</style>