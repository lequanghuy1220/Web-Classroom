<?php
    if(!empty($_POST["title"]) && !empty($_POST["description"])
    && !empty($_POST["deadline"]) && !empty($_POST["id_class"]) && !empty($_POST["code"]) && !empty($_POST["id_ass"])) {
        require 'Connection.php';
        $title = $_POST["title"];
        $description = $_POST["description"];
        $deadline = $_POST["deadline"];
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $id_ass = $_POST["id_ass"];
        if($_FILES["file"]["name"] != "") {
            $md = md5(rand(0 , 100));
            $des = "../Fontend/Assignment/";
            $file = $md . $_FILES["file"]["name"];
            $desFile = $des . basename($file);
            move_uploaded_file($_FILES["file"]["tmp_name"], $desFile);
            $sql = "UPDATE assignment SET title = '$title' , description = '$description' , deadline = '$deadline' , file = '$file' WHERE id_ass = '$id_ass'";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }else{
            $sql = "UPDATE assignment SET title = '$title' , description = '$description' , deadline = '$deadline' WHERE id_ass = '$id_ass'";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }
        $conn->close();
    }
?>