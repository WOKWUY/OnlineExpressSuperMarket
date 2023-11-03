<form action="?action=checkout nè - sau đó xử lí và hiển thị sản phẩm đã chọn bên trang checkout " method="post">
    <input type="checkbox" name="selectedProducts[]" value="productID bảng cart"> Sản phẩm 1
    <input type="checkbox" name="selectedProducts[]" value="productID bảng cart"> Sản phẩm 2
    <input type="submit" name="checkout" value="Thanh toán">
</form>

<?php 
if (isset($_POST['checkout'])) {
    // Lấy dữ liệu từ ô checkbox với name là "selectedProducts"
    $selectedProducts = $_POST['selectedProducts'];
    
    // Duyệt qua mảng để xác định checkbox nào đã được chọn
    foreach ($selectedProducts as $productId) {
        // XỬ LÍ HIỂN THI DỮ LIỆU SẢN PHẨM CHECKOUT
        echo "Sản phẩm được chọn: " . $productId;
        // XỬ LÍ HIỂN THI DỮ LIỆU SẢN PHẨM CHECKOUT
    }
}
?>