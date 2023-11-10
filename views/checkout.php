<link rel="stylesheet" href="./assets/css/checkout.css">
<main>
    <div id="checkout">
        <div class="main-cart">
            <div class="all-cart">
                <h1>Checkout</h1>
                <table id="all-cart">
                    <tr>
                        <th>PRD Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
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
                                <span>
                                    <?= $cart['productName'] ?>
                                </span>
                            </td>
                            <td>$
                                <?= $cart['price'] ?>
                            </td>
                            <td class="quantity-checkout">
                                <input type="number" min="1" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                            </td>
                            <td>$
                                <!-- dữ liệu ẩn gốc  -->
                                <input type="hidden" value="<?= $cart['price'] ?>" class="defaultTotalPrice">
                                <!-- dữ liệu ẩn gốc  -->
                                <!-- dữ liệu ẩn sau khi thao tác -->
                                <input type="hidden" value="<?= $cart['price'] * $cart['quantity'] ?>"
                                    class="afterTotalPrice">
                                <!-- dữ liệu ẩn sau khi thao tác -->
                                <div class="totalPrice">
                                    <?php
                                    $subTotal = $cart['price'] * $cart['quantity'];
                                    echo $subTotal;
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php //HTML
                            /* -------------------------------- TỔNG TIỀN ------------------------------- */
                            $total += $subTotal;
                        /* -------------------------------- TỔNG TIỀN ------------------------------- */
                    endforeach
                    ?>
                </table>
            </div>
            <input id="total" type="hidden" value="<?= $total ?>">
            <span class="quantity-checkout">Total: $<?= $total ?></span>
        </div>
        <div class="information-checkout">
            <!-- /* -------------------------------- DATA OLD -------------------------------- */ -->
            <?php 
            $db = require './config/database.php';
            $userController = new User_Controller($db);
            $dataOld = $userController->showInformationUserOld();
            ?>
            <!-- /* -------------------------------- DATA OLD -------------------------------- */ -->
            <div><span class="title-inff">INFORMATION FORM</span></div>
            <div>
                <label for="fullName">Full Name</label>
                <input type="text" name="full-name" id="fullname" placeholder="Enter Full Name" value="<?= (!is_null($dataOld)) ? $dataOld['fullName'] : "" ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" value="<?= (!is_null($dataOld)) ? $dataOld['email'] : "" ?>">
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter Address" value="<?= (!is_null($dataOld)) ? $dataOld['address'] : "" ?>">
            </div>
            <div>
                <label for="numberphone">Number Phone</label>
                <input type="text" name="numberphone" id="numberphone" placeholder="Enter Number Phone" value="<?= (!is_null($dataOld)) ? $dataOld['numberphone'] : "" ?>">
            </div>
            <div>
                <label for="note">Note</label>
                <input type="text" name="note" id="note" placeholder="Enter Note">
            </div>
            <button id="CHECKOUT" class="btn-53">
                <div class="original">Checkout</div>
                <div class="letters">
                    <span>C</span>
                    <span>H</span>
                    <span>E</span>
                    <span>C</span>
                    <span>K</span>
                    <span>O</span>
                    <span>U</span>
                    <span>T</span>
                </div>
            </button>
        </div>
    </div>
</main>
<!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
<script src="./assets/javascript/checkout.js"></script>
<!-- /* --------------------------------- SCRIPT --------------------------------- */ -->