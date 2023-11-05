<tr>
    <th>PRD Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th></th>
</tr>
<?php
foreach ($result as $cart) :
?>
    <tr class="aCartItem" id="all-cart">
        <td class="infc-product">
            <img src="./assets/image/<?= $cart['image'] ?>" width="100px" alt="">
            <span><?= $cart['productName'] ?></span>
        </td>
        <td>$<?= $cart['price'] ?></td>
        <td>
            <div class="control-quantity">
                <input type="hidden" class="productId" value="<?= $cart['productId'] ?>">
                <button type="button" class="down-qtt-cart"><i class="fa-solid fa-minus"></i></button>
                <input type="number" value="<?= $cart['quantity'] ?>" readonly class="update_quantity_cart">
                <button type="button" class="up-qtt-cart"><i class="fa-solid fa-plus"></i></button>
            </div>
        </td>
        <td>$<?= $cart['price'] * $cart['quantity'] ?></td>
        <th>
            <button class="delete-cart">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </th>
    </tr>
<?php //HTML
endforeach
?>