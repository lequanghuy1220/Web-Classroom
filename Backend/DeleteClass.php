<?php 
    if(isset($_POST["id"]) && !empty($_POST["id"])) { #Kiểm tra phương thức Post có tồn tại cái id mà mình gửi lên không và id ko dc rỗng
        require 'Connection.php';
        $sql = "DELETE FROM account_class WHERE id_class ='" . $_POST["id"] . "'"; #xóa từ account_class trong database bằng đúng id_class mà mình post lên
        $conn->query($sql);
        $sql = "DELETE FROM comment WHERE id_post IN (SELECT id_post FROM post WHERE id_class = '" . $_POST["id"] . "')";
        $conn->query($sql);
        $sql = "DELETE FROM post WHERE id_class ='" . $_POST["id"] . "'";
        $conn->query($sql);
        $sql = "DELETE FROM assignment WHERE id_class ='" . $_POST["id"] . "'";
        $conn->query($sql);
        $sql = "DELETE FROM class WHERE id_class ='" . $_POST["id"] . "'";
        $conn->query($sql);
        $conn->close();
        header("Location: ../index.php"); # sau khi xóa xong thì dẫn về trang index
    }
?>