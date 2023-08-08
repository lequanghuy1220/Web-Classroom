<?php 
    session_start();
    #kiểm tra có tồn tại không
    if(isset($_POST["txtFullName"]) && isset($_POST["txtPhoneNumber"])
    && isset($_POST["DateOfBirth"]) && isset($_POST["txtEmail"])) {
        require 'Connection.php';
        $name = $_POST["txtFullName"];
        $phone = $_POST["txtPhoneNumber"];
        $dob = $_POST["DateOfBirth"];
        $email = $_POST["txtEmail"];
        #lấy id acc tại session hiện tại
        $id_acc = $_SESSION["id_acc"];
        if($_FILES["ava"]["name"] != "") {
            $md = md5(rand(0 , 100));
            $des = "../Fontend/Avatar/";
            $file = $md . $_FILES["ava"]["name"];
            $desFile = $des . basename($file);
            move_uploaded_file($_FILES["ava"]["tmp_name"], $desFile);
            $ava = "Avatar/" . $file;
            $sql = "UPDATE account SET name = '$name' , phone = '$phone' , dob = '$dob' , email = '$email', ava = '$ava' WHERE id_acc = '$id_acc'";
            $conn->query($sql);
        }else {
            $sql = "UPDATE account SET name = '$name' , phone = '$phone' , dob = '$dob' , email = '$email' WHERE id_acc = '$id_acc'";
            $conn->query($sql);
        }
        header("Location: ../Fontend/Profile.php");
        $conn->close();
    }
?>