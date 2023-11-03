<?php
session_start();
$CHECK_ID = isset($_SESSION["user"]) ? $_SESSION["user"]['id'] : "";
$CHECK_ROLE = isset($_SESSION["user"]) ? $_SESSION["user"]['role'] : "";
if(empty($CHECK_ID) && empty($CHECK_ROLE)) {
    header("Location: ../404/");
}else{
    if($CHECK_ROLE !== 'admin' && $CHECK_ROLE !== 'staff') {
        header("Location: ../404/");
    }
}
?>