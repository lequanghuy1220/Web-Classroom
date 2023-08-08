<?php
    session_start();
    #kiểm tra điều kiện có tồn tại code_class,.. hay không
    if(isset($_POST["code_Class"]) && !empty($_POST["code_Class"])) {
        require 'Connection.php';
        $code = $_POST["code_Class"];
        #lấy dữ liệu từ bảng với điều kiện code = code gửi lên
        $sql = "SELECT * FROM class WHERE code = '$code'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id_class = $row["id_class"];
        #xét diều kiện , nếu > 0 thì lớp có tồn tại
        if($result->num_rows > 0) {
            $id_acc = $_SESSION["id_acc"];
            $sql = "INSERT INTO account_class VALUES('$id_acc' , '$id_class')";
            $result = $conn->query($sql);
            header("Location: ../index.php");
        }else{
            header("Location: ../Fontend/JoinClass.php?msg=Không tìm thấy lớp học");
        }
        $conn->close();
    }
?>