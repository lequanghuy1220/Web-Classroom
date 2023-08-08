<?php
    if(isset($_GET["role"]) && $_GET["role"] >= 0 && isset($_GET["id_acc"]) && !empty($_GET["id_acc"])) {
        require 'Connection.php';
        $role = $_GET["role"];
        echo $role;
        $id_acc = $_GET["id_acc"];
        #cập nhật type bằng giá trị role gửi lên,để cập nhật quyền cho người dùng
        $sql = "UPDATE account SET type = '$role' WHERE id_acc = '$id_acc'";
        $conn->query($sql);
        header("Location: ../Fontend/ManageAccount.php");
    }
?>