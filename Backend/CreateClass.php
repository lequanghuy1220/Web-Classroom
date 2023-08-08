<?php 
    #lấy id người đăng nhập hiện tại
    session_start();
    if(!empty($_POST["txtClassName"]) && !empty($_POST["txtSubject"]) && !empty($_POST["txtRoom"])) {
        #classcode là file random code
        include 'ClassCode.php';
        require 'Connection.php';
        $code = classCode();
        $name = $_POST["txtClassName"];
        $subject = $_POST["txtSubject"];
        $room = $_POST["txtRoom"];
        $id_acc = $_SESSION["id_acc"];
        if($_FILES["Image"]["name"] != "") {
            $md = md5(rand(0 , 100));
            #nơi chứa ảnh
            $des = "../Fontend/ClassImage/";
            #cộng chuỗi random ở trên với tên file
            $image = $md . $_FILES["Image"]["name"];
            $desFile = $des . basename($image);
            #PATHINFO_EXTENSION để lấy được đuôi của ảnh
            $ImageType = strtolower(pathinfo($desFile,PATHINFO_EXTENSION));
            #nếu không phải là những đuôi trên thì in ra msg
            if($ImageType != "jpg" && $ImageType != "png" 
            && $ImageType != "jpeg" && $ImageType != "gif" ) {
                header("Location: ../Fontend/Redirect.php?msg= chỉ cho phép jpg, png, jpeg, gif&link=../Fontend/CreateClass.php");
            }else{
                #chuyển file người dùng upload lên vào đường dẫn mình muốn lưu
                move_uploaded_file($_FILES["Image"]["tmp_name"], $desFile);
                #Đường dẫn người dùng sẽ lưu ở database
                $src = "Fontend/ClassImage/" . $image;
                #insert vào bảng class
                $sql = "INSERT INTO class(code, name, subject, room, image) VALUES('$code' , '$name' , '$subject' , '$room' , '$src')";
                $conn->query($sql);
                #lấy ra id_class vừa insert ở bảng trên
                $lastId = $conn->insert_id;
                #sau đó insert vào account_class với id_acc và lastId
                $sql = "INSERT INTO account_class VALUES('$id_acc' , '$lastId')";
                $conn->query($sql);
                header("Location: ../index.php");
            }
        #nếu không upload ảnh thì dùng ảnh mặc định    
        }else{
            $src = "Fontend/ClassImage/Defaultt.jpg";
            $sql = "INSERT INTO class(code, name, subject, room, image) VALUES('$code' , '$name' , '$subject' , '$room' , '$src')";
            $conn->query($sql);
            $lastId = $conn->insert_id;
            $sql = "INSERT INTO account_class VALUES('$id_acc' , '$lastId')";
            $conn->query($sql);
            header("Location: ../index.php");
        }
        $conn->close();
    }
?>