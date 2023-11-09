document.addEventListener("DOMContentLoaded", ()=>{
    let comment = document.getElementById("comment");
    comment.addEventListener("click", ()=>{
        let content_comment = document.getElementById("content-comment").value;
        let productId = document.getElementById("productId");
        // Hiển thị biểu tượng "Loading" trước khi gửi yêu cầu Ajax
        let loadingElement = document.getElementById("loading");
        loadingElement.style.display = "block";
        if(content_comment.trim() !== "" && productId.value !== ""){
            let data = "content=" + content_comment + "&productId=" + productId.value;
            let xhr = new XMLHttpRequest();
            xhr.open(
                "POST",
                "./handles/comment-action.php",
                true
            );
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = () =>{
                if(xhr.status === 200 && xhr.readyState === 4){
                    loadingElement.style.display = "none";
                    document.getElementById("new-comment").innerHTML = xhr.responseText;
                    document.getElementById("content-comment").value = "";
                    let result = xhr.responseText;
                    if(result !== ""){
                        Swal.fire({icon: 'success',title: 'Success',text: 'Thank you',});
                    }else{
                        Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
                    }
                }
            }
            xhr.send(data);
        }else{
            Swal.fire({icon: 'error',title: 'Oops...',text: 'Something went wrong!',});
        }
    });
});