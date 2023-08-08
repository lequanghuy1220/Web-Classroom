<?php
    if(isset($_POST["txtFullName"]) && isset($_POST["txtPhoneNumber"])
    && isset($_POST["DateOfBirth"]) && isset($_POST["txtUserName"])
    && isset($_POST["txtPassword"]) && isset($_POST["txtEmail"])) {
        #kết nối database
        require 'Connection.php';
        $sql = "SELECT * FROM account WHERE username = '". $_POST["txtUserName"] . "'";
        $result = $conn->query($sql);
        #nếu trả về 1 dòng cơ sở dữ liệu từ câu truy vấn trên thì chuyển về Register và in ra msg
        if($result->num_rows > 0) {
            header("Location: ../Fontend/Register.php?msg=Tên tài khoản đã tồn tại");
            exit;
        }
        #ngược lại thì đến email từ bảng account để xem email đó có tồn tại chưa
        $sql = "SELECT * FROM account WHERE email = '". $_POST["txtEmail"] . "'";
        $result = $conn->query($sql);
        #nếu trả về 1 dòng cơ sở dữ liệu từ câu truy vấn trên thì chuyển về Register và in ra msg
        if($result->num_rows > 0) {
            header("Location: ../Fontend/Register.php?msg1=Email đã tồn tại");
            exit;
        #nếu chưa tồn tại email và username thì insert vào database
        }else{
            $name = $_POST["txtFullName"];
            $phone = $_POST["txtPhoneNumber"];
            $dob = $_POST["DateOfBirth"];
            $username = $_POST["txtUserName"];
            $email = $_POST["txtEmail"];
            #mã hóa password
            $pass = password_hash($_POST["txtPassword"] , PASSWORD_DEFAULT);
            #avata mặc định
            $ava = "Avatar/Default.jpg";
            $sql = "INSERT INTO account(name , phone,email, dob, username, pass , ava)
            VALUES('$name' , '$phone' ,'$email' , '$dob' , '$username' , '$pass' , '$ava')";
            $conn->query($sql);
            header("Location: ../Fontend/Redirect.php?msg=Đăng ký thành công&link=Login.php");
        }
        $conn->close(); 
    }

?>