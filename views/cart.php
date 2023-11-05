<main>
    <?php 
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
                        // var_dump($result);
                        foreach ($result as $cart):
                            ?>
                            <tr class="aCartItem">
                                <td class="infc-product">
                                    <img src="./assets/image/<?= $cart['image'] ?>" width="100px" alt="">
                                    <span><?= $cart['productName'] ?></span>
                                </td>
                                <td>$<?= $cart['price'] ?></td>
                                <td>
                                    <div class="control-quantity">
                                        <button type="button" class="down-qtt-cart"><i class="fa-solid fa-minus"></i></button>
                                        <input type="number" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                                        <button type="button" class="up-qtt-cart"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </td>
                                <td>$<?= $cart['price'] * $cart['quantity'] ?></td>
                                <th>
                                    <button class="delete-cart">
                                        <input type="hidden" class="productId" value="<?= $cart['productId'] ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </th>
                            </tr>
                            <?php //HTML
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
                        <span>$418</span>
                    </div>
                    <div class="row-infor">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="title-sub-cart">
                        <span>Total</span>
                        <span>$999</span>
                    </div>
                </div>
                <button class="checkout-btn">
                    <a href="?room=checkout">Checkout</a>
                </button>
            </div>
        </div>
        <?php // HTML
    }else{
        ?><span class="span-red">EMPTY CART</span><?php //HTML
    }
    ?>
</main>