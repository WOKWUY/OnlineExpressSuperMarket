<?php
$db = include './config/database.php';
$categoryController = new Category_Controller($db);
$productController = new Product_Controller($db);
$bannerController = new Banner_Controller($db);
?>
<main>
    <div id="home">
        <?= $categoryController->showCategoriesAside() ?>
        <article>
            <?= $bannerController->showBannerListWeb() ?>
            <?= $productController->showProductListWeb() ?>
            <?= $productController->noFilterOrSearch("./component/maylike.php") ?>
        </article>
    </div>
</main>