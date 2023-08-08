<?php
    #session_start để biết ai là người đăng bài
    session_start();
    if(!empty($_POST["title"]) && !empty($_POST["description"])
    && !empty($_POST["deadline"]) && !empty($_POST["id_class"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $title = $_POST["title"];
        $description = $_POST["description"];
        $deadline = $_POST["deadline"];
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $id_acc = $_SESSION["id_acc"];
        #Kiểm tra có upload file không
        if($_FILES["file"]["name"] != "") {
            $md = md5(rand(0 , 100));#random
            $des = "../Fontend/Assignment/";#
            $file = $md . $_FILES["file"]["name"];
            $desFile = $des . basename($file);
            move_uploaded_file($_FILES["file"]["tmp_name"], $desFile);
            $sql = "INSERT INTO assignment(title , description ,deadline, file, id_acc , id_class) VALUES('$title','$description' ,'$deadline', '$file', '$id_acc' , '$id_class')";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }else{
            $sql = "INSERT INTO assignment(title , description ,deadline, id_acc , id_class) VALUES('$title','$description','$deadline', '$id_acc' , '$id_class')";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }
        $conn->close();
    }
?>