<?php require(ROOT . "/layouts/header/header.php") ?>
<div class="filter">
    <a href="/catalog/category/1">Запасные части для лифтов</a>
    <a href="/catalog/category/2">Запасные части для эскалаторов</a>
</div>
<div class="products">
    <?php foreach ($products as $product) : ?>
        <div class="product">
            <a href="/product/<?php echo $product['id']; ?> ">
            <img src="/template/img/products_pictures/<?php echo $product['pics'] . '_thm.jpg'; ?>" alt="<?php echo $product['name']; ?>"></a>
            <div class="link">
                <a href="/product/<?php echo $product['id']; ?>">
                    <h2><?php echo $product['name']; ?></h2>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<?php echo $pagination->get(); ?>
<?php require(ROOT . "/layouts/footer/footer.php") ?>