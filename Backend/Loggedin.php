<?php 
    session_start();
    require 'Connection.php';
    if(!isset($_SESSION["id_acc"]) || empty($_SESSION["id_acc"])) {
        header("Location: Fontend/Login.php");
        exit;
    }else {
        $id_acc = $_SESSION["id_acc"];
        #lấy tất cả dữ liệu từ account theo id_acc 
        $sql = "SELECT * FROM account WHERE id_acc = '$id_acc'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $type = $row["type"];
        $email = $row["email"];
        $phone = $row["phone"];
        $dob = $row["dob"];
    }
?>