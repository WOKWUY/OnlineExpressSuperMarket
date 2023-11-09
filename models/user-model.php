<?php 
// Cấu hình SendMail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Cấu hình SendMail
class User_Model{
    private $db;
    function __construct(mysqli $db){
        $this->db = $db;
    }
    
    /* -------------------------------- ADD USER -------------------------------- */
    function addUser(){
        session_start();
        $mess = "";
        
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            if(isset($_POST["register"])){
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];
                $status = 'no active';
                $role = 'user';
                $token = bin2hex(random_bytes(40)); // chuỗi nhị phân ngẫu nhiên
                
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(!empty($username) && !empty($email) && !empty($password) && !empty($confirmpassword)){ // Kiểm tra xem có rỗng không
                        if($confirmpassword === $password){ // Kiểm tra mật khẩu trùng khớp không
                            $check_email = $this->db->prepare("SELECT * FROM users WHERE email = ? AND status = 'active'");
                            $check_email->bind_param("s", $email);
                            if($check_email->execute()){ 
                                $result = $check_email->get_result(); 
                                if($result->num_rows > 0){ // Nếu có kết quả
                                    $mess = "Tài khoản đã được đăng ký";
                                }else{
                                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                                    $create_account = $this->db->prepare(" INSERT INTO users(`token`,`userName`,`email`,`password`,`role`,`status`) VALUES (?,?,?,?,?,?)");
                                    $create_account->bind_param("ssssss", $token, $username, $email, $password_hash, $role, $status);
                                    if($create_account->execute()){
                                        // SendMail để kích hoạt tài khoản
                                        // Cấu hình SendMail
                                        require '../PHPMailer-master/src/Exception.php';
                                        require '../PHPMailer-master/src/PHPMailer.php';
                                        require '../PHPMailer-master/src/SMTP.php';
                                        // Cấu hình SendMail
                                        $mail = new PHPMailer(true);
    
                                        $mail->isSMTP();
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->SMTPAuth = true;
                                        $mail->Username = 'niboss458@gmail.com';
                                        $mail->Password = 'vlvh udyo ypui pvey';
                                        $mail->SMTPSecure = 'ssl';
                                        $mail->Port = 465;
    
                                        $mail->setFrom('niboss458@gmail.com');
                                        $mail->addAddress($email);
                                        $mail->isHTML(true);
                                        $mail->Subject = "ACTIVE ACCOUNT";
                                        $mail->Body = "http://localhost/PHP/xuong/website/auth/?action=active-account&token=" . $token;
    
                                        if($mail->send()){
                                            $mess = 'Thành công';
                                        }else{
                                            $mess = "Lỗi gửi mail";
                                        }
                                        // SendMail để kích hoạt tài khoản
                                    }
                                }
                            }
                        }else{
                            $mess = "Mật khẩu không khớp";
                        }
                    }else{
                        $mess = "Chưa nhập đầy đủ thông tin";
                    }
                }else{
                    $mess = "Định dạng Email không hợp lệ";
                }
                
            }
        }
        return $mess;
    }
    /* -------------------------------- ADD USER -------------------------------- */
    /* -------------------------------- ACTIVE ACCOUNT -------------------------------- */
    function activeAccount(){ // Login
        $mess = "";
        $token = $_GET["token"];
        $status = "active";

        $active = $this->db->prepare("UPDATE users SET status = ? WHERE token = ? ");
        $active->bind_param("ss", $status, $token);
        if($active->execute()){
            $newToken = bin2hex(random_bytes(40));
            $updateToken = $this->db->prepare("UPDATE users SET token = ? WHERE token = ?");
            $updateToken->bind_param("ss", $newToken, $token);
            if($updateToken->execute()){
                $mess = "Kích hoạt tài khoản thành công";
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* -------------------------------- ACTIVE ACCOUNT -------------------------------- */
    /* --------------------------- CHECK ACCOUNT LOGIN -------------------------- */
    function checkAccount(){
        $mess = "";

        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            if(isset($_POST["login"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                
                if(!empty($email) && !empty($password)){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if(!empty($email) && !empty($password)){
                            $check_email = $this->db->prepare("SELECT * FROM users WHERE email = ?"); // Check email trước - để check status - check password sau để biết password đúng hay sai
                            $check_email->bind_param("s", $email);
                            if($check_email->execute()){
                                $result = $check_email->get_result();
                                if($result->num_rows > 0){
                                    $row = $result->fetch_assoc();
                                    $status = $row['status'];
                                    if($status === 'no active'){
                                        $mess = "Tài khoản của bạn chưa được kích hoạt";
                                    }elseif($status === 'disable'){
                                        $mess = "Tài khoản của bạn đã bị vô hiệu hóa";
                                    }elseif($status === 'active'){
                                        $clean_password = mysqli_real_escape_string($this->db, $password); // Clean password
                                        $db_password = $row['password'];
                                        if(password_verify($clean_password, $db_password)){ // Check password
                                            session_start();
                                            $userId = $row['id'];
                                            $_SESSION['user']['token'] = $row['token'];
                                            $_SESSION['user']['role'] = $row['role'];
                                            $_SESSION["user"]['id'] = $userId;
                                            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Cấu hình giờ Việt Nam
                                            $loginTime = date("Y-m-d H:i:s");
                                            $create_logs = $this->db->prepare("INSERT INTO logs(`userId`,`loginTime`) VALUES (?,?)");
                                            $create_logs->bind_param("is", $userId, $loginTime);
                                            if($create_logs->execute()){
                                                $_SESSION['user']['loginTime'] = $loginTime;
                                                header("Location: ../?page=home");
                                            }
                                        }else{
                                            $mess = "Mật khẩu sai";
                                        }
                                    }else{
                                        $mess = "Tài khoản của bạn bị lỗi";
                                    }
                                }else{
                                    $mess = "Tài khoản chưa được đăng ký";
                                }
                            }else{
                                $mess = "Lỗi";
                            }
                        }
                    }else{
                        $mess = "Định dạng Email không hợp lệ";
                    }
                }else{
                    $mess = "Chưa nhập đầy đủ thông tin";
                }
            }
        }
        return $mess;
    }
    /* --------------------------- CHECK ACCOUNT LOGIN -------------------------- */
    function checkToken(){
        $mess = "";
        if(!isset($_SESSION["user"])){
            session_start();
        }
        $token = (isset($_SESSION["user"])) ? $_SESSION["user"]['token'] : "";
        if(isset($_SESSION["user"]["token"]) && !empty($token)){
            $stmt = $this->db->prepare("SELECT * FROM users WHERE token = ?");
            $stmt->bind_param("s", $token);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $mess = "successtoken";
                }else{
                    $mess = "Lỗi";
                }
            }else{
                $mess = "Lỗi";
            }
        }else{
            $mess = "Lỗi";
        }
        return $mess;
    }
    /* --------------------------- FORGOT PASSWORD -------------------------- */
    function forgotPassword(){
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            if(isset($_POST["submit"])){
                session_start();
                $mess = "";
                $email = $_POST["email"];
                
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(!empty($email)){
                        $check_email = $this->db->prepare("SELECT * FROM users WHERE email = ?");
                        $check_email->bind_param("s", $email);
                        if($check_email->execute()){
                            $result = $check_email->get_result();
                            if($result->num_rows > 0){
                                $row = $result->fetch_assoc();
                                $db_status = $row['status'];
                                if($db_status === 'no active'){
                                    $mess = "Tài khoản của bạn chưa được kích hoạt";
                                }elseif($db_status === 'disable'){
                                    $mess = "Tài khoản của bạn đã bị vô hiệu hóa";
                                }elseif($db_status === 'active'){
                                    $db_token = $row['token'];
                                    
                                    // SendMail để kích hoạt tài khoản
                                    // Cấu hình SendMail
                                    require '../PHPMailer-master/src/Exception.php';
                                    require '../PHPMailer-master/src/PHPMailer.php';
                                    require '../PHPMailer-master/src/SMTP.php';
                                    // Cấu hình SendMail
                                    $mail = new PHPMailer(true);
                                    
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = 'niboss458@gmail.com';
                                    $mail->Password = 'vlvh udyo ypui pvey';
                                    $mail->SMTPSecure = 'ssl';
                                    $mail->Port = 465;
                
                                    $mail->setFrom('niboss458@gmail.com');
                                    $mail->addAddress($email);
                                    $mail->isHTML(true);
                                    $mail->Subject = "ACTIVE ACCOUNT";
                                    $mail->Body = "http://localhost/PHP/xuong/website/auth/?auth=new-password&token=" . $db_token;
                
                                    if($mail->send()){
                                        $mess = 'Thành công';
                                    }else{
                                        $mess = "Lỗi gửi mail";
                                    }
                                    // SendMail để kích hoạt tài khoản
                                }else{
                                    $mess = "Tài khoản của bạn bị lỗi";
                                }
                            }else{
                                $mess = "Tài khoản chưa được đăng ký";
                            }
                        }else{
                            $mess = "Lỗi";
                        }
                    }
                }else{
                    $mess = "Định dạng Email không hợp lệ";
                }
            }
            return $mess;
        }
    }
    /* --------------------------- FORGOT PASSWORD -------------------------- */
    /* --------------------------- NEW PASSWORD -------------------------- */
    function newPassword(){
        if($_SERVER["REQUEST_METHOD"]==='POST'){
            if(isset($_POST["submit"])){
                $mess = "";
                $token = $_GET["token"];
                $password = $_POST["password"];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $confirmpassword = $_POST["confirmpassword"];
                $status = 'active';
                
                $check_token = $this->db->prepare("SELECT * FROM users WHERE token = ? AND status = ?");
                $check_token->bind_param("ss", $token, $status);
                if($check_token->execute()){
                    $result = $check_token->get_result();
                    if($result->num_rows > 0){
                        if(!empty($password) && !empty($confirmpassword)){
                            if($password === $confirmpassword){
                                if(!empty($token)){
                                    $new_password = $this->db->prepare("UPDATE users SET password = ? WHERE token = ?");
                                    $new_password->bind_param("ss", $password_hash, $token);
                                    if($new_password->execute()){
                                        $newToken = bin2hex(random_bytes(40));
                                        $new_token = $this->db->prepare("UPDATE users SET token = ? WHERE token = ?");
                                        $new_token->bind_param("ss", $newToken, $token);
                                        if($new_token->execute()){
                                            $mess = "Thành công";
                                        }else{
                                            $mess = "Lỗi";
                                        }
                                    }else{
                                        $mess = "Lỗi";
                                    }
                                }else{
                                    $mess = "Lỗi";
                                }
                            }else{
                                $mess = "Mật khẩu không khớp";
                            }
                        }else{
                            $mess = "Chưa nhập đủ thông tin";
                        }
                    }else{
                        $mess = "Lỗi";
                    }
                }else{
                    $mess = "Lỗi";
                }
            }
            return $mess;
        }
    }
    /* --------------------------- NEW PASSWORD -------------------------- */
    /* --------------------------- SHOW USER -------------------------- */
    function showUsers(){
        $stmt = $this->db->prepare("SELECT * FROM users");
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }
    /* --------------------------- SHOW USER -------------------------- */
    /* -------------------------- SHOW INFORMATION USER ------------------------- */
    function showInformationUser(){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        if(!empty($id) && is_numeric($id)){
            $stmt = $this->db->prepare("SELECT * FROM userinformation WHERE userId = ?");
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }
            }
        }
    }
    /* -------------------------- SHOW INFORMATION USER ------------------------- */
    /* --------------------------- SHOW LOGS -------------------------- */
    function showLogs(){
        $mess = "";
        $userId = isset($_GET["id"]) ? $_GET["id"] : "";
        if(!empty($userId)){
            $stmt = $this->db->prepare("SELECT * FROM logs WHERE userId = ? ORDER BY loginTime DESC");
            $stmt->bind_param("i", $userId);
            if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    return $result;
                }else{
                    $mess = "Không có dữ liệu";
                    return $mess;
                }
            }
        }
    }
    /* --------------------------- SHOW LOGS -------------------------- */
    /* --------------------------- UPDATE USER -------------------------- */
    function updateStatusOrRole(){
        $mess = "";
        $action = isset($_POST["action"]) ? $_POST["action"] : "";
        $id = isset($_POST["id"]) ? $_POST["id"] : "";

        // Nếu là update status
        if($action === 'active' || $action === 'disable'){
            $stmt = $this->db->prepare("UPDATE users SET status = ? WHERE id = ?");
            $stmt->bind_param("si", $action, $id);
            if($stmt->execute()){
                $mess = "Thành công";
            }else{
                $mess = "Lỗi";
            }
        }

        // Nếu là update role
        if($action === 'user' || $action === 'staff'){
            $stmt = $this->db->prepare("UPDATE users SET role = ? WHERE id = ?");
            $stmt->bind_param("si", $action, $id);
            if($stmt->execute()){
                $mess = "Thành công";
            }else{
                $mess = "Lỗi";
            }
        }
        return $mess;
    }
    /* --------------------------- UPDATE USER -------------------------- */
    /* ------------------------- CREATE DATETIME LOGOUT ------------------------- */
    function updateTimeLogs(){
        session_start();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $loginTime = isset($_SESSION["user"]) ? $_SESSION["user"]['loginTime'] : "";
        if($loginTime !== ""){
            $logoutTime = date("Y-m-d H:i:s");
            $stmt = $this->db->prepare("UPDATE logs SET logoutTime = ? WHERE loginTime = ? ");
            $stmt->bind_param("ss", $logoutTime, $loginTime);
            $stmt->execute();
        }
        return;
    }
    /* ------------------------- CREATE DATETIME LOGOUT ------------------------- */
    /* -------------------------- DISABLE BECAUSE BOOM -------------------------- */
    function disableBecauseBoom(){
        $users = $this->db->prepare("SELECT id, boomNum FROM users");
        if($users->execute()){
            $result = $users->get_result();
            while($row = $result->fetch_assoc()){
                $boomNum = $row['boomNum'];
                if($boomNum > 3){
                    $userId = $row['id'];
                    $newStatus = 'disable';
                    $stmt = $this->db->prepare("UPDATE users SET status = ? WHERE id = ?");
                    $stmt->bind_param("si", $newStatus, $userId);
                    $stmt->execute();
                    $stmt->close();
                }else{
                    // Có thể tự động kích hoạt tài khoản tại đây sau khi người dùng đã thanh toán
                    // Với số lượng lớn thì có thể sẽ gây chậm hệ thống
                }
            }
        }
    }
    /* -------------------------- DISABLE BECAUSE BOOM -------------------------- */
}
