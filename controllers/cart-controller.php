<?php 
class Cart_Controller{
    private $db;
    private $cartModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->cartModel = new Cart_Model($this->db);
    }
    function showCartList(){
        $result = $this->cartModel->showCartList();
        include './views/cart.php';
    }
    function addToCart(){
        return $this->cartModel->addToCart();
    }
    function updateQuantityCart(){
        return $this->cartModel->updateQuantityCart();
    }
    function deleteCart(){
        return $this->cartModel->deleteCart();
    }
    function afterDeleteCart($url){
        $result = $this->cartModel->showCartList();
        include $url;
    }
}
?>