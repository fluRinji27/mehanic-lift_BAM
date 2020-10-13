<?php require(ROOT . "/layouts/header/header.php") ?>
<main class='main__catalog'>
<div class="filter">
  <?php $url = $_SERVER['REQUEST_URI'];?>
                    <a  href="/catalog/category/1" <?php
                    $url = $_SERVER['REQUEST_URI'];
                    if ($url == "/catalog/category/1" || $url == "/catalog/category/1/page-1") {
                        echo 'class=" filter__item button__black-active"';
                    }else {
                    echo 'class=" filter__item button__black"';
                    } ?>>Запасные части для лифтов</a>
                    <a  href="/catalog/category/2" <?php $url = $_SERVER['REQUEST_URI'];
                    if ($url == "/catalog/category/2" || $url == "/catalog/category/2/page-1") {
                        echo 'class="filter__item button__black-active"';
                    }else {
                    echo 'class=" filter__item button__black"';
                    } ?>>Запасные части для эскалаторов</a>
</div>
<div class="catalog catalog__wrapp">
    <?php foreach ($categoryes as $product) : ?>
        <div class="catalog__item">
            <a href="/product/<?php echo $product['id']; ?>" class="catalog__link-img">
            <img class="catalog__img" src="/template/img/products_pictures/<?php echo $product['pics'] . '_pic.jpg'; ?>" alt="<?php echo $product['name']; ?>"></a>
            <div class="catalog__link">
                <a class='catalog__link' href="/product/<?php echo $product['id']; ?>">
                    <p class="catalog__title product__theme-Arial-Bold" ><?php echo $product['name']; ?></p>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<?php echo $pagination->get(); ?>
</main>
<?php require(ROOT . "/layouts/footer/footer.php") ?>