/* ---------------- THÊM SẢN PHẨM TỪ TRANG SẢN PHẨM CHI TIẾT ---------------- */
document.addEventListener("DOMContentLoaded", function () { // Giúp đồng bộ thống nhất với HTML
    let maxQtt = parseInt(document.getElementById("max-qtt").value); // Số lượng sản phẩm tối đa trên database
    let maxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value); // Số lượng sản phẩm đã thêm vào cart
    var addToCart = document.getElementById("add-to-cart");
    var productId = document.getElementById("productId");
    var quantity = document.getElementById("quantity_add_cart");
    addToCart.addEventListener('click', ()=>{
        if(quantity.value > maxQtt){ // Nếu SL thêm lớn hơn SL tồn kho
            Swal.fire({icon: 'error',title: 'Oops...',text: 'There are only ' + maxQtt + ' left of the product!',});
        }else{
            let newMaxQttOnCart = parseInt(document.getElementById("max-qtt-on-cart").value); // SL của sản phẩm đã được thêm lần trước (được cập nhật sau khi thêm lần trước)
            if((parseInt(quantity.value) + maxQttOnCart) > maxQtt){ // Nếu SL muốn mua cộng với SL đã có bên cart lớn hơn SL trên database thì báo lỗi
                Swal.fire({icon: 'error',title: 'Oops...',text: 'There are only ' + maxQtt + ' left of the product and you already have ' + maxQttOnCart + ' of these products in your cart!',});
            }else{
                if(parseInt(quantity.value) + newMaxQttOnCart  > maxQtt){ // Nếu SL muốn mua cộng với SL đã thêm vào cart lần trước(được cập nhật sau khi thêm lần trước) lớn hơn SL trên database thì báo lỗi (Tránh trường hợp thêm lại sản phẩm với SL max - *Nhân đôi)
                    Swal.fire({icon: 'error',title: 'Oops...',text: 'There are only ' + maxQtt + ' left of the product and you already have ' + newMaxQttOnCart + ' of these products in your cart!',});
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "./handles/add-to-cart.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function (){
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            let result = xhr.responseText;
                        if(result === "Thành công"){
                            Swal.fire({
                                icon: "success",
                                title: "Success add to cart",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            // Cập nhật hiển thị số lượng cart
                            let quantityCartOld = parseInt(document.getElementById("quantityCartOld").value); 
                            document.getElementById("quantityCart").innerText = quantityCartOld + 1;
                            // Cập nhật hiển thị số lượng cart
                            // QUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUu
                            document.getElementById("max-qtt-on-cart").value = parseInt(parseInt(document.getElementById("quantity_add_cart").value) + parseInt(document.getElementById("max-qtt-on-cart").value)); // Cập nhật số lượng đã thêm bên giỏ hàng nhưng hiển thị bên trang này
                            // QUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUu
                        }else if(result === "Bạn chưa đăng nhập"){
                            Swal.fire({icon: 'error',title: 'Oops...',text: 'You not login!', allowOutsideClick: false,confirmButtonText: "Go to login"}).then((result) => { if (result.isConfirmed) {window.location.href = './auth/?auth=login';}});;
                        }else{
                            Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
                        }
                      }
                  }
                  xhr.send("productId=" + productId.value + "&quantity=" + quantity.value);
                }
            }
        }
  });
});
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SẢN PHẨM CHI TIẾT ---------------- */
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SHOP (Thêm nhanh - Hover vào sản phẩm) ---------------- */
/* <input class="input" type="text" id="quantity" value="1">
<button id="add-to-cart">Add to cart</button> */
// document.addEventListener('DOMContentLoaded', () => {
//     var products = document.querySelectorAll(".product"); // Chọn hết tất cả sản phẩm
//     products.forEach(function(product) { // Lặp qua từng sản phẩm
//         var addToCart = product.querySelector(".add-to-cart"); // Lấy button của sản phẩm đó
//         var productID = product.querySelector(".productID"); // Lấy id của sản phẩm đó
//         addToCart.addEventListener("click", ()=> { 
//             var xhr = new XMLHttpRequest(); // Tạo 1 đối tượng ajax mới
//             xhr.open("POST", "../handles/add-to-cart.php", true); // Mở
//             xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Cấu hình
//             xhr.onreadystatechange = ()=>{
//                 if(xhr.readyState === 4 && xhr.status === 200){
//                     Swal.fire({
//                     icon: "success",
//                     title: "Success add to cart" + productID.value,
//                     showConfirmButton: false,
//                     timer: 1500,
//                     });
//                 }
//             };
//             xhr.send("productID=" + productID.value + "&quantity=" + "1"); // Gửi
//         });
//     });
// });
/* ---------------- THÊM SẢN PHẨM TỪ TRANG SHOP (Thêm nhanh - Hover vào sản phẩm) ---------------- */