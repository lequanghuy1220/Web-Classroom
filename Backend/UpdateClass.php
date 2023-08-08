<?php 
    if(!empty($_POST["txtClassName"]) && !empty($_POST["txtSubject"]) 
    && !empty($_POST["txtRoom"]) && !empty($_POST["id_class"]) && !empty($_POST["code"])) {
        #kiểm tra xem nó có tồn tại những giá trị trên hay không
        require 'Connection.php';
        #gọi connection và gán những giá trị vào biến $name,.... để dễ sử dụng
        $name = $_POST["txtClassName"];
        $subject = $_POST["txtSubject"];
        $room = $_POST["txtRoom"];
        $id_class = $_POST["id_class"];
        if($_FILES["Image"]["name"] != "") { #Kiểm tra file,nếu người dùng có upload file hình ảnh đại diện cho class vô
            #giống với lúc tạo lớp nhưng khác ở chỗ là lúc đầu mình dùng INSERT thì giờ dùng UPDATE
            $md = md5(rand(0 , 100));
            $des = "../Fontend/ClassImage/";
            $image = $md . $_FILES["Image"]["name"];
            $desFile = $des . basename($image);
            $ImageType = strtolower(pathinfo($desFile,PATHINFO_EXTENSION));
            if($ImageType != "jpg" && $ImageType != "png" 
            && $ImageType != "jpeg" && $ImageType != "gif" ) {
                header("Location: ../Fontend/Redirect.php?msg= chỉ cho phép jpg, png, jpeg, gif&link=../Fontend/CreateClass.php?id=$id_class&code=".$_POST["code"]);
            }else{
                move_uploaded_file($_FILES["Image"]["tmp_name"], $desFile);
                $src = "Fontend/ClassImage/" . $image;
                $sql = "UPDATE class SET name = '$name' , subject = '$subject' , room = '$room' ,image = '$src' WHERE id_class = '$id_class'";
                $conn->query($sql);
                header("Location: ../Fontend/DetailClass.php?id=$id_class&code=".$_POST["code"]);
            }
        }else{
            $sql = "UPDATE class SET name = '$name' , subject = '$subject' , room = '$room' WHERE id_class = '$id_class'";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=".$_POST["code"]);
        }
    }
?>