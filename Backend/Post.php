<?php
    session_start();
    if(!empty($_POST["msg"]) && !empty($_POST["id_class"]) && !empty($_POST["code"])) {
        #Kiểm tra có rỗng không,và session để biết là ai post bài đó
        require 'Connection.php';
        $msg = $_POST["msg"];
        $id_class = $_POST["id_class"];
        $code = $_POST["code"];
        $id_acc = $_SESSION["id_acc"];
        if($_FILES["file"]["name"] != "") { #kiểm tra file có tồn tại không
            $md = md5(rand(0 , 100));#mã hóa
            $des = "../Fontend/ClassFile/";#cho điểm đến của file
            $file = $md . $_FILES["file"]["name"];
            $desFile = $des . basename($file);
            move_uploaded_file($_FILES["file"]["tmp_name"], $desFile); #lấy tên file ra và chuyển đến đường dẫn mình muốn
            $src = $file; #$src là đường dẫn mình muốn thêm vô database
            #insert vô post(insert theo đúng thứ tự trong database)
            $sql = "INSERT INTO post(msg , file , id_class, id_acc) VALUES('$msg', '$src', '$id_class' , '$id_acc')";
            $conn->query($sql);
            #sau khi insert xong thì chuyển về trang detail
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
            #lúc chuyển qua trang detail phải kèm code, vì có điều kiện muốn vô classdetail phải có id_class và code(line 2 detailclass)
            #nên khi muốn quay lại phải gửi kèm code và id_class
        }else{
            #ngược lại nếu không upload file, lúc này file trong database sẽ để là null
            $sql = "INSERT INTO post(msg ,id_class, id_acc) VALUES('$msg', '$id_class' , '$id_acc')";
            $conn->query($sql);
            header("Location: ../Fontend/DetailClass.php?id=$id_class&code=$code");
        }
    }
?>