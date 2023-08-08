<?php 
    if(!empty($_POST["id_class"]) && !empty($_POST["id_post"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $id_class = $_POST["id_class"];
        $id_post = $_POST["id_post"];
        $code = $_POST["code"];

        $sql = "DELETE FROM comment WHERE id_post = '$id_post'";
        $conn->query($sql);
        $sql = "DELETE FROM post WHERE id_post = '$id_post'";
        $conn->query($sql);
        $conn->close();
        header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
    }
?>