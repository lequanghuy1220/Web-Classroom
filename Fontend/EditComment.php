<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Chỉnh sửa</title>
</head>

<body>
    <?php if (!empty($_GET["id_cmt"]) && !empty($_GET["id_class"]) && !empty($_GET["code"])) {
        #kiểm tra có tồn tại id_cmt,...
        require '../Backend/Connection.php';
        $sql = "SELECT * FROM comment WHERE id_cmt = '" . $_GET["id_cmt"] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc(); #lấy kết quả từ database
    ?>
        <div class="text-center m-auto w-25">
            <form action="../Backend/EditComment.php" method="POST">
                <div class="form-group mt-5">
                    <!--hiển thị comment hiện tại-->
                    <!--id_cmt để biết đó là comment nào , để sửa-->
                    <input type="text" class="form-control" name="msg" value="<?php echo $row["msg"] ?>" required>
                    <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>" required>
                    <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" required>
                    <input type="hidden" name="id_cmt" value="<?php echo $_GET["id_cmt"] ?>"><br><br>
                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                </div>
            </form>
        </div>
    <?php } ?>
</body>

</html>