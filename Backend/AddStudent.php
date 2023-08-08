<?php 
    if(!empty($_POST["id_class"]) && !empty($_POST["Email"]) && !empty($_POST["code"])) {
        require 'Connection.php';
        $id_class = $_POST["id_class"];
        $email = $_POST["Email"];
        $code = $_POST["code"];
        $sql = "SELECT * FROM account WHERE email = '$email'";
        #nếu tìm ra email đúng bằng email gửi lên thì sẽ lấy 1 dòng, 1>0 thì thực thi, không thể =2 vì đã xét điều kiện chỉ dc 1 email ở bên tạo tài khoản
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_acc = $row["id_acc"];
            $sql = "INSERT INTO account_class VALUES('$id_acc' , '$id_class')";
            $conn->query($sql);
            $conn->close();
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }else{
            header("Location: ../Fontend/Redirect.php?msg=Email này không tồn tại&link=DetailClass.php?id=$id_class&code=$code");
        }
    }
?>