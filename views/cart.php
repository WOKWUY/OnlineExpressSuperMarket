<main>
    <?php 
    include './config/database.php';
    $productController = new Product_Controller($db);
    if(isset($result)){
        ?>
        <div id="cart">
            <div class="main-cart">
                <div class="all-cart">
                    <h1>My Cart</h1>
                    <table id="all-cart">
                        <tr>
                            <th>PRD Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        <?php 
                        //Tổng tiền
                        $total = 0;
                        //Tổng tiền
                        foreach ($result as $cart):
                            ?>
                            <tr class="aCartItem">
                                <td class="infc-product">
                                    <img src="./assets/image/<?= $cart['image'] ?>" width="100px" alt="">
                                    <span><?= $cart['productName'] ?></span>
                                </td>
                                <td>$<?= $cart['price'] ?></td>
                                <td>
                                    <div class="control-quantity" id="ctrQttCart">
                                        <button type="button" class="down-qtt-cart"><i class="fa-solid fa-minus"></i></button>
                                        <input type="number" min="1" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                                        <button type="button" class="up-qtt-cart"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </td>
                                <td>$   
                                    <!-- dữ liệu ẩn gốc  -->
                                    <input type="hidden" value="<?= $cart['price'] ?>" class="defaultTotalPrice">
                                    <!-- dữ liệu ẩn gốc  -->
                                    <!-- dữ liệu ẩn sau khi thao tác -->
                                    <input type="hidden" value="<?= $cart['price'] * $cart['quantity'] ?>" class="afterTotalPrice">
                                    <!-- dữ liệu ẩn sau khi thao tác -->
                                    <div class="totalPrice">
                                        <?php
                                            $subTotal = $cart['price'] * $cart['quantity'];
                                            echo $subTotal;
                                        ?>
                                    </div>
                                </td>
                                <th>
                                    <button class="delete-cart">
                                        <!-- dữ liệu ẩn  -->
                                        <input type="hidden" class="productId" value="<?= $cart['productId'] ?>">
                                        <!-- dữ liệu ẩn  -->
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </th>
                            </tr>
                            <?php //HTML
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                            $total += $subTotal;
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                        endforeach
                        ?>
                    </table>
                </div>
            </div>
            <div class="sub-cart">
                <div class="box-sub-cart">
                    <div class="title-sub-cart">
                        Order Summary
                    </div>
                    <div class="row-infor">
                        <span>Subtotal</span>
                        <span id="subTotal">$<?= $total ?></span>
                    </div>
                    <div class="row-infor">
                        <span>Shipping</span>
                        <span><span id="totalShip">Free</span></span>
                    </div>
                    <div class="title-sub-cart">
                        <span>Total</span>
                        <span id="total">$<?= $total ?></span>
                    </div>
                </div>
                <button class="checkout-btn">
                    <a href="?page=checkout">Checkout</a>
                </button>
            </div>
        </div>
        <?php // HTML
        $productController->noFilterOrSearch("./component/maylike.php");
    }else{
        ?>
        <div class="empty-cart">
            <img src="./assets/image/empty-cart.png" width="100px" alt="">
            <span>Empty your cart</span>
            <a href="?page=home">Buy now</a>
        </div>
        <?php // HTML
        $productController->noFilterOrSearch("./component/maylike.php");
    }
    ?>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/update-quantity-cart.js"></script>
<script src="./assets/javascript/delete-cart.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->