<a href="?room=orders" class="back"><i class="fa-solid fa-left-long"></i></a>
<table>
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price ($)</th>
                <th>Total ($)</th>
                <th>Action</th>
            </tr>
        <?php // HTML
        foreach ($result as $orderDetails) :
            ?>
            <tr>
                <td><?= $orderDetails['orderId'] ?></td>
                <td><?= $orderDetails['productId'] ?></td>
                <td><?= $orderDetails['quantity'] ?></td>
                <td><?= $orderDetails['price'] ?></td>
                <td><?= $orderDetails['total'] ?></td>
                <td class="actions">
                    <form action="" method="POST">
                        <button onclick="return confirmDelete('?room=order-details&action=delete-order-details&id=<?= $orderDetails['productId'] ?>&orderId=<?= $_GET['orderId'] ?>')" name="deleteOrderDetails" class="red">Delete</button>
                    </form>
                </td>
            </tr>
            <?php // HTML
        endforeach;
    }else{
        if(!isset($alertDelete)){
            ?><span class="span-red">Empty</span><?php // HTML
        }
    }
    ?>
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Deleted successfully',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=orders';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->