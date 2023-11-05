document.addEventListener("DOMContentLoaded", ()=>{
    let carts = document.querySelectorAll(".aCartItem");
    carts.forEach((cart) => {
        let productId = cart.querySelector(".productId");
        let downQttCart = cart.querySelector(".down-qtt-cart");
        let upQttCart = cart.querySelector(".up-qtt-cart");
        let quantityUpdate = cart.querySelector(".update_quantity_cart");
        let valid = quantityUpdate.value;
        
        downQttCart.addEventListener('click', ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open(
                "POST",
                "./handles/update-quantity-cart.php",
                true
            );
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = ()=>{
                quantityUpdate.value = xhr.responseText;
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
                    quantityUpdate.value = xhr.responseText;
            }
            }
            xhr.send("productId=" + productId.value + "&action=up");
        });
    });
});