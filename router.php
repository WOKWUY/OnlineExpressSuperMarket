<?php
session_start();
if(isset($_SESSION["user"])){
    $ss_role = (isset($_SESSION["user"])) ? $_SESSION["user"]['role'] : "" ;
    $ss_id = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "" ;
}
define("PAGE", (isset($_GET["page"])) ? $_GET["page"] : ""); 
define("ACTION", (isset($_GET["action"])) ? $_GET["action"] : "");
define("CATEGORY", (isset($_GET["category"])) ? $_GET["category"] : "") ;
/* --------------------------------- HEADER --------------------------------- */
if(PAGE === 'admin'){
    // ADMIN
}else{
    include './layout/header.php';
}
/* --------------------------------- HEADER --------------------------------- */
/* ---------------------------------- MODEL --------------------------------- */
include './models/user-model.php';
include './models/category-model.php';
include './models/product-model.php';
include './models/comment-model.php';
/* ---------------------------------- MODEL --------------------------------- */
/* ---------------------------------- CONTROLLER --------------------------------- */
include './controllers/user-controller.php';
include './controllers/category-controller.php';
include './controllers/product-controller.php';
include './controllers/comment-controller.php';
/* ---------------------------------- CONTROLLER --------------------------------- */
$db = require './config/database.php';
$productController = new Product_Controller($db);
$categoryController = new Category_Controller($db);
$commentController = new Comment_Controller($db);
/* -------------------------------- VIEW MAIN (ROUTER) ------------------------------- */
if(!empty(PAGE)){
    if(PAGE === 'home'){
        include './views/home.php';
    }elseif(PAGE === 'details'){
        $productController->detailsProductWeb();
    }elseif(PAGE === 'cart'){
        include './views/cart.php';
    }elseif(PAGE === 'checkout'){
        include './views/checkout.php';
    }elseif(PAGE === 'contact'){
        include './views/contact.php';
    }elseif(PAGE === 'blogs'){
        include './views/blogs.php';
    }elseif(PAGE === 'order'){
        include './views/order.php';
    }elseif(PAGE === 'my-profile'){
        include './views/my-profile.php';
    }elseif(PAGE === 'admin'){
        header("Location: ./admin/?room=statistical");
    }
    // NOT FOUND
    else{
        include './views/home.php';
    }
    // NOT FOUND
}else{ 
    include './views/home.php';
}
/* -------------------------------- VIEW MAIN (ROUTER) ------------------------------- */
/* --------------------------------- ACTION --------------------------------- */
/* --------------------------------- ACTION --------------------------------- */
/* --------------------------------- LOADING -------------------------------- */
include './component/loading.php';
/* --------------------------------- LOADING -------------------------------- */
/* --------------------------------- FOOTER --------------------------------- */
if(PAGE === 'admin'){
    // ADMIN
}else{
    // include './layout/footer.php';
}
/* --------------------------------- FOOTER --------------------------------- */
?>