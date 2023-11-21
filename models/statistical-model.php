<?php 
class Statistical_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    function orders(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date("Y-m-d H:i:s");
        $stmt = $this->db->prepare(
        "SELECT DATE(createdate) AS date, COUNT(*) AS total_orders, total
        FROM orders
        WHERE createdate >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) 
                AND createdate <= CURDATE()
        GROUP BY DATE(createdate)
        ORDER BY date;
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while($row = $result->fetch_assoc()){
        $data['date'][] = $row['date'];
        $data['orderTotal'][] = $row['total_orders'];
        $data['total'][] = $row['total'];
        }
        return $data;
    }
    function users(){
    }
}
?>