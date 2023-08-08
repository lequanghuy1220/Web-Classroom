<?php 
    if(!empty($_POST["msg"]) && !empty($_POST["id_class"]) && !empty($_POST["code"]) && !empty($_POST["id_post"])) {
        #kiểm tra mess có rỗng hay không, id_class,....
        #gán dữ liệu vào các biến, sau đó kiểm tra có upload file lên không(khác với lúc Post là dùng INSERT thì giờ dùng Update)
        #nếu không upload file gì lên thì thực hiện bình thường
        #lúc quay về phải gửi kèm id_class và code để quay về được trang detail
        require 'Connection.php';
        $msg = $_POST["msg"];
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $id_post = $_POST["id_post"];
        if($_FILES["file"]["name"] != "") {
            $md = md5(rand(0 , 100));
            $des = "../Fontend/ClassFile/";
            $file = $md . $_FILES["file"]["name"];
            $desFile = $des . basename($file);
            move_uploaded_file($_FILES["file"]["tmp_name"], $desFile);
            $src = $file;
            $sql = "UPDATE post SET msg = '$msg' , file = '$src' WHERE id_post = '$id_post'";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }else{
            $sql = "UPDATE post SET msg = '$msg' WHERE id_post = '$id_post'";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }
        $conn->close();
    }
?>