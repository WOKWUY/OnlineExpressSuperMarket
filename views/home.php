<main>
    <div id="home">
        <?php
        $db = include './config/database.php';
        $categoryController = new Category_Controller($db);
        $productController = new Product_Controller($db);
        $categoryController->showCategoriesAside();
        ?>
        <article>
            <?php include './layout/banner.php' ?> 
            <!-- BANNER SAU NÀY THÊM SAU (CÀI ĐẶT TRANG WEB) -->
            <?= $productController->showProductListWeb() ?>
            <?= $productController->noFilterOrSearch("./component/maylike.php") ?>
        </article>
    </div>
</main>