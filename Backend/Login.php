<?php
    session_start();
    if(isset($_POST["txtUserName"]) && isset($_POST["txtPassword"])) {
        require 'Connection.php';
        $username = $_POST["txtUserName"];
        $pass = $_POST["txtPassword"];
        $sql = "SELECT * FROM account WHERE username = '$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        #nếu có 1 dòng trong database và kiểm tra password
        #(password_verify: kiểm tra password người dùng nhập vô và password đã mã hóa trong database)
        #nếu thỏa thì chuyển đến file index
        if($result->num_rows == 1 && password_verify($pass , $row["pass"])) {
            #nếu đăng nhập thành công thì gán 1 SESSION co id_acc bằng  id_acc của tài khoản đó
            $_SESSION["id_acc"] = $row["id_acc"];
            header("Location: ../index.php");
        #nếu sai thì chuyển đến file login và in ra msg
        }else{
            header("Location: ../Fontend/Login.php?msg=Sai tên tài khoản hoặc mật khẩu");
        }
        $conn->close();
    }
?>