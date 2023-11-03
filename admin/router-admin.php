<!-- /* --------------------------------- ROUTER --------------------------------- */ -->
<?php
/* ---------------------------------- MODEL --------------------------------- */
include '../models/user-model.php';
include '../models/product-model.php';
include '../models/category-model.php';
include '../models/order-model.php';
include '../models/comment-model.php';
/* ---------------------------------- MODEL --------------------------------- */
/* ---------------------------------- CONTROLLER --------------------------------- */
include '../controllers/user-controller.php';
include '../controllers/product-controller.php';
include '../controllers/category-controller.php';
include '../controllers/order-controller.php';
include '../controllers/comment-controller.php';
/* ---------------------------------- CONTROLLER --------------------------------- */
define("ROOM", isset($_GET["room"]) ? $_GET["room"] : "");
define("SUBROOM", isset($_GET["subroom"]) ? $_GET["subroom"] : "");
define("ACTION", isset($_GET["action"]) ? $_GET["action"] : "");
/* -------------------------------- VIEW MAIN ------------------------------- */
$db = require '../config/database.php';
$userController = new User_Controller($db);
$categoryController = new Category_Controller($db);
$productController = new Product_Controller($db);
$orderController = new Order_Controller($db);
$commentController = new Comment_Controller($db);
if (!empty(ROOM)) {
    if (ROOM === 'statistical') {
        include './statistical/statistical.php';
    }elseif (ROOM === 'users') {
        $userController->disableBomm();
        $userController->showUserList();
    }elseif(ROOM === 'logs'){
        $userController->showLogs();
    }elseif (ROOM === 'products') {
        $productController->showProductList();
    }elseif (ROOM === 'add-product') {
        $productController->addProduct();
    }elseif (ROOM === 'edit-product') {
        $productController->editProduct();
    }elseif (ROOM === 'images') {
        $productController->showAImageMore();
    }elseif (ROOM === 'details-product') {
        $productController->detailsProduct();
    }elseif (ROOM === 'add-category') {
        include './categories/add-category.php';
    }elseif (ROOM === 'edit-category') {
        $categoryController->editCategory();
    }elseif (ROOM === 'categories') {
        $categoryController->showCategories();
    }elseif (ROOM === 'orders') {
        $orderController->showOrderList();
    }elseif(ROOM === 'order-details'){
        $orderController->showOrderDetails();
    }elseif(ROOM === 'comments'){
        $commentController->showListComment();
    }elseif(ROOM === 'comment-details'){
        $commentController->showListCommentDetails();
    }
    // NOT FOUND
    else {
        header("Location: ../404/");
    }
    // NOT FOUND
}
/* -------------------------------- VIEW MAIN ------------------------------- */
/* --------------------------------- ACTION --------------------------------- */
if(!empty(ACTION)){
    if(ACTION === 'updateUser'){
        $userController->updateUser();
        header("Location: ./?room=users");
    }elseif(ACTION === 'add-category'){
        $categoryController->addCategory();
    }elseif(ACTION === 'edit-category'){
        $categoryController->editCategory();
    }elseif(ACTION === 'delete-category'){
        $categoryController->deleteCategory();
    }elseif(ACTION === 'add-product'){
        $productController->addProduct();
    }elseif(ACTION === 'edit-product'){
        $productController->editProduct();
    }elseif(ACTION === 'update-status-product'){
        $productController->updateStatusProduct();
    }elseif(ACTION === 'delete-product'){
        $productController->deleteProduct();
    }elseif(ACTION === 'delete-image'){
        $productController->deleteImageMore();
    }elseif(ACTION === 'receive-order'){
        $orderController->receiveOrder();
    }elseif(ACTION === 'update-order'){
        $orderController->updateOrder();
    }elseif(ACTION === 'delete-order'){
        $orderController->deleteOrder();
    }elseif(ACTION === 'delete-order-details'){
        $orderController->deleteOrderDetails();
    }elseif(ACTION === 'delete-comment'){
        $commentController->deleteCommentAdmin();
    }elseif(ACTION === 'delete-comment-details'){
        $commentController->deleteCommentDetails();
    }
}
/* --------------------------------- ACTION --------------------------------- */
?>
<!-- /* --------------------------------- ROUTER --------------------------------- */ -->


