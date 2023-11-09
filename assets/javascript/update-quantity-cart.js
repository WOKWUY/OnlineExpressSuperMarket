document.addEventListener("DOMContentLoaded", ()=>{
    let carts = document.querySelectorAll(".aCartItem");
    carts.forEach((cart) => {
        let productId = cart.querySelector(".productId");
        let downQttCart = cart.querySelector(".down-qtt-cart");
        let upQttCart = cart.querySelector(".up-qtt-cart");
        let quantityUpdate = cart.querySelector(".update_quantity_cart");
        let valid = quantityUpdate.value;
        let qtt = parseInt(quantityUpdate.value);
        
        downQttCart.addEventListener('click', ()=>{
            let xhr = new XMLHttpRequest();
                xhr.open(
                    "POST",
                    "./handles/update-quantity-cart.php",
                    true
                );
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = ()=>{
                    let result = xhr.responseText; // Số lượng mới được trả từ PHP
                    quantityUpdate.value = result; // Hiển thị lại số lượng mới
                    let price_default = cart.querySelector(".defaultTotalPrice").value; // Giá gốc của từng sản phẩm
                    cart.querySelector(".totalPrice").innerHTML = price_default * result; // Hiển thị total mới
                    cart.querySelector(".afterTotalPrice").value = price_default * result; // Lưu lại giá trị total mới 
                    let listAfterTotalPrice = document.querySelectorAll(".afterTotalPrice"); // Lấy list input ẩn mang total sau khi đã thao tác
                    let subTotal = 0;
                    listAfterTotalPrice.forEach((nghia) => {
                        subTotal += parseInt(nghia.value); // Cộng dồn tổng giá của từng cart
                    });
                    document.getElementById("subTotal").innerHTML = "$" + subTotal; // Cập nhật lại giá tổng đơn hàng
                    let totalShip = parseInt(document.getElementById("totalShip").innerText); // Lấy giá trị của tiền Ship
                    document.getElementById("total").innerHTML = "$" + (subTotal + totalShip); // Cập nhật lại giá tổng đơn hàng cuối
                    if(result == "0"){
                        let cut = cart.closest(".aCartItem");
                        if(cut){
                            cut.remove();
                        }
                    }
                }
                xhr.send("productId=" + productId.value + "&action=down");
        });
        upQttCart.addEventListener('click', () => {
            let xhr = new XMLHttpRequest();
            xhr.open(
                "POST",
                "./handles/update-quantity-cart.php",
                true
            );
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = ()=>{
                if(xhr.readyState === 4 && xhr.status === 200){
                    let result = xhr.responseText; // Số lượng mới được trả từ PHP
                    quantityUpdate.value = result; // Hiển thị lại số lượng mới
                    let price_default = cart.querySelector(".defaultTotalPrice").value; // Giá gốc của từng sản phẩm
                    cart.querySelector(".totalPrice").innerHTML = price_default * result; // Hiển thị total mới
                    cart.querySelector(".afterTotalPrice").value = price_default * result; // Lưu lại giá trị total mới 
                    let listAfterTotalPrice = document.querySelectorAll(".afterTotalPrice"); // Lấy list input ẩn mang total sau khi đã thao tác
                    let subTotal = 0;
                    listAfterTotalPrice.forEach((nghia) => {
                        subTotal += parseInt(nghia.value); // Cộng dồn tổng giá của từng cart
                    });
                    document.getElementById("subTotal").innerHTML = "$" + subTotal; // Cập nhật lại giá tổng đơn hàng tạm thời
                    let totalShip = parseInt(document.getElementById("totalShip").innerText); // Lấy giá trị của tiền Ship
                    document.getElementById("total").innerHTML = "$" + (subTotal + totalShip); // Cập nhật lại giá tổng đơn hàng cuối
                }
            }
            xhr.send("productId=" + productId.value + "&action=up");
        });
    });
});
