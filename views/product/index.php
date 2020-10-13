<?php require(ROOT . '/layouts/header/header.php') ?>
<main class="product">
    <div class="product__wrapper">
        <h1 class="product__title">
            <a href="<?php if ($productItems['cat_id'] === '1') {
                echo '/catalog/category/1/page-1';
            } elseif ($productItems['cat_id'] === '2') {
                echo '/catalog/category/2/page-1';
            }
            ?>" class="product__link"><?php echo $productItems['cat_names']; ?></a>
        </h1>
        <h2 class="product__subtitle product__theme-Arial-Bold"><?php echo $productItems['name'] ?></h2>
        <div class="product__content">
            <a href="../../template/img/products_pictures/<?php echo $productItems['pics'] . '_enl.jpg'; ?>" class="glightbox">
                <img src="../../template/img/products_pictures/<?php echo $productItems['pics'] . '_pic.jpg'; ?>" alt="<?php echo $product['name']; ?>" class="product__img">
            </a>

            <ul class="product__info-list product__theme-Arial-Bold">
                <li class="product__info-item">
                    <span class="product__item-text">Артикул: <?php echo ' ' . $productItems['articul'] ?></span>
                </li>
                <li class="product__info-item">
                    <span class="product__item-text">Производитель: <?php echo ' ' . $productItems['made'] ?></span>
                </li>
                <li class="product__info-item">
                    <span class="product__item-text">Узел: <?php echo ' ' . $productItems['knot'] ?></span>
                </li>
                <li class="product__info-item">
                    <span class="product__item-text">Тип: <?php echo ' ' . $productItems['type'] ?></span>
                </li>
                <li class="product__info-item">
                    <span class="product__item-text">Вес: <?php echo ' ' . $productItems['weight'] ?></span>
                </li>
                <li class="product__info-item product__form">
                    <button class="button__black modal__price">Запросить стоимость</button>
                </li>
            </ul>
        </div>
    </div>
</main>
<?php require(ROOT . '/layouts/footer/footer.php') ?>

