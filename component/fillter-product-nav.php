<div class="product-container">
    <h3>
        <?php 
            if(isset($fillters)){
            foreach ($fillters as $title) :
                $categoryName = $title['categoryName'];
            endforeach;
            echo $categoryName;
            }
        ?>
    </h3>
    <div id="product-list">
        <?php
        if(isset($fillters)){
            foreach ($fillters as $product) :
            ?>
                <div class="product" data-filter="<?= $product['status'] ?>">
                    <a href="?page=details&id=<?= $product['id'] ?>">
                        <div class="product-image">
                            <img width="200px" src="./assets/image/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="information-product">
                            <div class="title"><?= $product['productName'] ?></div>
                            <div class="price">
                                <?php 
                                if($product['discount'] > 0){
                                    ?><del><?= $product['price'] ?> VNĐ</del><?php //HTML
                                    $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
                                    ?><span><?= number_format($price) ?> VNĐ</span><?php //HTML
                                }else{
                                    ?>
                                    <span><?= number_format($product['price']) ?>VNĐ</span>
                                    <?php //HTML
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php // HTML
            endforeach;
        }else{
            require_once './component/functionsHTML.php';
            messRed("Không có sản phẩm nào !!!");
        }
        ?>
    </div>
    <?php include './component/pagination-product.php' ?>
</div>
