<?php 
class Order_Controller{
    private $db;
    private $orderModel;
    function __construct(mysqli $db){
        $this->db = $db;
        $this->orderModel = new Order_Model($this->db);
    }
    function showOrderList(){
        $result = $this->orderModel->showOrderList();
        include './orders/orders.php';
    }
    function showOrderDetails(){
        $result = $this->orderModel->orderDetails();
        include './orders/order-details.php';
    }
    function updateOrder(){
        $alertUpdate = $this->orderModel->updateOrder();
        include './orders/orders.php';
    }
    function deleteOrder(){
        $alertDelete = $this->orderModel->deleteOrder();
        include './orders/orders.php';
    }
    function deleteOrderDetails(){
        $alertDelete = $this->orderModel->deleteOrderDetails();
        include './orders/order-details.php';
    }
    function receiveOrder(){
        $alertUpdate = $this->orderModel->receiveOrder();
        include './orders/orders.php';
    }
}
?>