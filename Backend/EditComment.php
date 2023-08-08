<?php 
    if(!empty($_POST["msg"]) && !empty($_POST["id_class"]) && !empty($_POST["code"]) && !empty($_POST["id_cmt"])) {
        require 'Connection.php';
        $msg = $_POST["msg"];
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $id_cmt =$_POST["id_cmt"];
        #update comment trong database
        $sql = "UPDATE comment SET msg = '$msg' WHERE id_cmt = '$id_cmt'";
        $conn->query($sql);
        $conn->close();
        header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
    }
?>