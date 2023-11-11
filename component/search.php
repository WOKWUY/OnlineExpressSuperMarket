<div class="product-container">
    <h3>
        <?php
        $title = (isset($_GET["title"])) ? $_GET["title"] : "ALL PRODUCTS";
        if($title === 'search'){
            messGreen("Result");
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
                            <!-- /* ------------------------------ QUANTITY SOLD ----------------------------- */ -->
                            <div class="sold">
                                <?php 
                                $db = require '../config/database.php';
                                $productController = new Product_Controller($db);
                                $quantityOld = $productController->quantityOld($product['id']);
                                $quantity = $product['quantity'];
                                if($quantityOld >= $quantity){
                                    messRed("Sold old");
                                }else{
                                    echo "Sold: " . $quantityOld;
                                }
                                ?>
                            </div>
                            <!-- /* ------------------------------ QUANTITY SOLD ----------------------------- */ -->
                        </div>
                    </a>
                </div>
            <?php // HTML
            endforeach;
        }else{
            require_once '../component/functionsHTML.php';
            messRed("Empty Product !!!");
        }
        ?>
    </div>
</div>
