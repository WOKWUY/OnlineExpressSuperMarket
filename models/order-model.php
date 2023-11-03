<?php 
class Order_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    function showOrderList(){
        $stmt = $this->db->prepare("SELECT * FROM orders");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    function updateOrder(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $newValue = (isset($_GET["value"])) ? $_GET["value"] : "";
        if(!empty($newValue) && !empty($id)){
            if($newValue === 'paid' || $newValue === 'unpaid' || $newValue === 'boom'){
                $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
                $stmt->bind_param("si", $newValue, $id);
                if($stmt->execute()){
                    $mess = "Cập nhật thành công";
                }else{
                    $mess = "Lỗi";
                }
            }
            if($newValue === 'processing' || $newValue === 'delivering' || $newValue === 'completed'){
                $stmt = $this->db->prepare("UPDATE orders SET process = ? WHERE id = ?");
                $stmt->bind_param("si", $newValue, $id);
                if($stmt->execute()){
                    $mess = "Cập nhật thành công";
                }else{
                    $mess = "Lỗi";
                }
            }
        }
        return $mess;
    }
    function orderDetails(){
        $orderId = (isset($_GET["orderId"])) ? $_GET["orderId"] : "";
        if(!empty($orderId)){
            $stmt = $this->db->prepare("SELECT * FROM orderdetails WHERE orderId = ?");
            $stmt->bind_param("i", $orderId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }
            }
        }
    }
    function deleteOrder(){
        $mess = "";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("DELETE FROM orders WHERE id= ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $mess = "Thành công";
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    function deleteOrderDetails(){
        $mess = "";
        $productId = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($productId) && is_numeric($productId)){
            $stmt = $this->db->prepare("DELETE FROM orderdetails WHERE productId = ?");
            $stmt->bind_param("i", $productId);
            if($stmt->execute()){
                $mess = "Thành công";
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    function receiveOrder(){
        $mess = "";
        $action = (isset($_GET["action"])) ? $_GET["action"] : "";
        $newProcess = "confirm";
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        $userId = (isset($_SESSION["user"])) ? $_SESSION["user"]['id'] : "";
        if(!empty($action) && !empty($id) && is_numeric($id) && !empty($userId) && is_numeric($userId)){
            $stmt = $this->db->prepare("UPDATE orders SET process = ?, userIdHandle = ? WHERE id = ?");
            $stmt->bind_param("sii", $newProcess, $userId,$id);
            if($stmt->execute()){
                $mess = "Cập nhật thành công";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
}
?>