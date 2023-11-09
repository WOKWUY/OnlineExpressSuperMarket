<main>
    <div id="product-details">
        <div class="image-pdts">
            <div class="image-main-pdts">
                <img id="imageMain" src="./assets/image/<?= $product['image'] ?>" alt="">
            </div>
        </div>
        <div class="information-pdts">
            <div class="infor-top">
                <div class="title-pdts">
                    <?= $product['productName'] ?>
                </div>
                <div class="quantity-sold-commment-pdts">
                    <span>
                        Quantity Comment:
                        <?php
                        $db = include './config/database.php';
                        $commentController = new Comment_Controller($db);
                        echo $commentController->quantityComment();
                        ?>
                    </span>
                    |<span> 500 Sold</span>
                </div>
                <div class="discount-pdts">
                    Discount: <?= $product['discount'] ?> %
                </div>
                <div class="quantity-sold-commment-pdts keclass">Insurance: Mobile device insurance</div>
                <div class="quantity-sold-commment-pdts keclass">Transport: Free shipping</div>
                <div class="price-pdts">
                    <span class="cost-pdts">$<?= $product['price'] ?> </span>
                    <span class="price-pdts-end"> $5555</span>
                </div>
                <form action="" method="POST" onsubmit="return false">
                    <div class="control-quantity">
                        <input type="hidden" id="productId" value="<?= (isset($_GET["id"])) ? $_GET["id"] : "" ?>">
                        <button type="button" id="down-qtt"><i class="fa-solid fa-minus"></i></button>
                        <input type="number" value="1" id="quantity_add_cart">
                        <button type="button" id="up-qtt"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <button type="submit" id="add-to-cart">Add to cart</button>
                </form>
            </div>
            <div class="sub-image-pdts">
                <?php 
                $db = include './config/database.php';
                $productController = new Product_Controller($db);
                $images = $productController->showListImageWeb();
                if(!is_null($images)){
                    $idDOM = 1;
                    $totalIdDOM = 0;
                    foreach($images as $image){
                        $number = $idDOM++;
                        ?>
                        <div class="box-subimage">
                            <img id="nextImageMore<?= $number ?>" onmouseover="nextImage(<?= $number ?>)" src="./assets/image/<?= $image['image'] ?>" alt="">
                        </div>
                        <?php // HTML
                        $totalIdDOM++;
                    }
                }
                ?>
                <!-- SỐ LƯỢNG ẢNH -->
                <input type="hidden" value="<?= $totalIdDOM ?>" id="quantitySubImage">
                <!-- SỐ LƯỢNG ẢNH -->
            </div>
        </div>
    </div>
    <div class="infor-more">
        <div class="detais-description-pdts">
            <div class="title-details-description-pdts">
                Product Description
            </div>
            <div class="content-details-description-pdts">
                <?= $product['details'] ?>
            </div>
            <div class="title-details-description-pdts">
                Product Details
            </div>
            <div class="content-details-description-pdts">
                <?= $product['description'] ?>
            </div>
            <!-- /* ------------------------------- ALL PRODUCT ------------------------------ */ -->
            <?php 
            $commentController = new Comment_Controller($db);
            $productController = new Product_Controller($db);
            $commentController->showListCommentForProduct();
            $productController->showProductListWeb();
            ?>
            <!-- /* ------------------------------- ALL PRODUCT ------------------------------ */ -->
        </div>
        <!-- /* ---------------------------------- CODE DISCOUNT --------------------------------- */ -->
        <div class="all-discounts">
            <?php 
                for($i = 0; $i<9;$i++){
                    ?>
                        <div class="item-code-discount">
                            <div class="infor-item-code">
                                <span>Sale 10%</span>
                                <span>Minium order 10$</span>
                                <span>Minimize 30$</span>
                                <span class="hsd">2023-12-10</span>
                            </div>
                            <div class="add-code-discount">
                                <button>Get Code</button>
                            </div>
                        </div>
                        <?php //HTML
                }
                ?>
        </div>
        <!-- /* ---------------------------------- CODE DISCOUNT --------------------------------- */ -->
    </div>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/add-to-cart.js"></script>
<script src="./assets/javascript/quantity-actions.js"></script>
<script src="./assets/javascript/comment.js"></script>
<script src="./assets/javascript/delete-comment.js"></script>
<script src="./assets/javascript/product-detail.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->