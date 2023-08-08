<?php 
    if(!empty($_POST["id_ass"]) && !empty($_POST["id_class"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $id_class = $_POST["id_class"];
        $id_ass = $_POST["id_ass"];
        $code = $_POST["code"];
        $sql = "DELETE FROM assignment WHERE id_ass = '$id_ass'";
        $conn->query($sql);
        $conn->close();
        header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
    }
?>