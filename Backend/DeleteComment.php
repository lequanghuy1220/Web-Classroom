<?php
    if(!empty($_POST["id_cmt"]) && !empty($_POST["id_class"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $sql = "DELETE FROM comment WHERE id_cmt ='" .$_POST["id_cmt"]. "'";
        $conn->query($sql);
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $conn->close();
        header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
    }
?>