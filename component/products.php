<div class="product-container">
    <h3>
        <?php
        $title = (isset($_GET["title"])) ? $_GET["title"] : "ALL PRODUCTS";
        if($title === 'search'){
            ?><span class="span-green">Results</span><?php // HTML
        }else{
            echo ucfirst($title);
        }
        ?>
    </h3>
    <div id="product-list">
        <?php
        if(isset($products)){
            foreach ($products as $product) :
            ?>
                <div class="product">
                    <a href="?page=details&id=<?= $product['id'] ?>">
                        <div class="product-image">
                            <img width="200px" src="./assets/image/<?= $product['image'] ?>" alt="">
                        </div>
                        <div class="information-product">
                            <div class="title"><?= $product['productName'] ?></div>
                            <div class="price">
                                <del>$<?= $product['price'] ?></del>
                                <span>$391</span>
                            </div>
                            <div class="quantity">Quantity: <?= $product['quantity'] ?></div>
                            <div class="sold">Sold: 239</div>
                        </div>
                    </a>
                </div>
            <?php // HTML
            endforeach;
        }else{
            ?><span class="span-red">Empty</span><?php // HTML
        }
        ?>
    </div>
</div>