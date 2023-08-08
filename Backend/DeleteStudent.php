<?php 
    if(!empty($_POST["id_class"]) && !empty($_POST["id_acc"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $id_class = $_POST["id_class"];
        $id_acc = $_POST["id_acc"];
        $code = $_POST["code"];
        $sql = "DELETE FROM account_class WHERE id_acc = '$id_acc'";
        $conn->query($sql);
        $conn->close();
        header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
    }
?>