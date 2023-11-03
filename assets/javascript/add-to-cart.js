/* ---------------- THÊM SẢN PHẨM TỪ TRANG SẢN PHẨM CHI TIẾT ---------------- */
/* <div class="product">
    <input type="text" class="productID" value="1">
    <button class="add-to-cart">Add to cart</button>
</div>
<div class="product">
    <input type="text" class="productID" value="2">
    <button class="add-to-cart">Add to cart</button>
</div> */
document.addEventListener("DOMContentLoaded", function () { // Giúp đồng bộ thống nhất với HTML
  var addToCart = document.getElementById("add-to-cart");
  var productId = document.getElementById("productId");
  var quantity = document.getElementById("quantity");
  addToCart.addEventListener('click', ()=>{
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../handles/add-to-cart.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function (){
        if (xhr.readyState === 4 && xhr.status === 200) {
            Swal.fire({
              icon: "success",
              title: "Success add to cart",
              showConfirmButton: false,
              timer: 1500,
            });
          }
      }
      xhr.send("product_Id=" + productId + "&quantity=" + quantity);
  });
});
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SẢN PHẨM CHI TIẾT ---------------- */
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SHOP (Thêm nhanh - Hover vào sản phẩm) ---------------- */
/* <input class="input" type="text" id="quantity" value="1">
<button id="add-to-cart">Add to cart</button> */
document.addEventListener('DOMContentLoaded', () => {
    var products = document.querySelectorAll(".product"); // Chọn hết tất cả sản phẩm
    products.forEach(function(product) { // Lặp qua từng sản phẩm
        var addToCart = product.querySelector(".add-to-cart"); // Lấy button của sản phẩm đó
        var productID = product.querySelector(".productID"); // Lấy id của sản phẩm đó
        addToCart.addEventListener("click", ()=> { 
            var xhr = new XMLHttpRequest(); // Tạo 1 đối tượng ajax mới
            xhr.open("POST", "../handles/add-to-cart.php", true); // Mở
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Cấu hình
            xhr.onreadystatechange = ()=>{
                if(xhr.readyState === 4 && xhr.status === 200){
                    Swal.fire({
                    icon: "success",
                    title: "Success add to cart" + productID.value,
                    showConfirmButton: false,
                    timer: 1500,
                    });
                }
            };
            xhr.send("productID=" + productID.value + "&quantity=" + "1"); // Gửi
        });
    });
});
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SHOP (Thêm nhanh - Hover vào sản phẩm) ---------------- */