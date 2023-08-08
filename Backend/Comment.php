<?php
    session_start();
    if(!empty($_POST["comment"]) && !empty($_POST["id_post"]) && !empty($_POST["id_class"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $msg = $_POST["comment"];
        $id_post = $_POST["id_post"];
        $id_acc = $_SESSION["id_acc"];
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $sql = "INSERT INTO comment(msg ,id_post, id_acc) VALUES('$msg' , '$id_post' , '$id_acc')";
                                #msg, bài post nào, người post
        $conn->query($sql);
        $conn->close();
        header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
    }
?>