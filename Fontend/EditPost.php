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
    <?php if(!empty($_GET["id_post"]) && !empty($_GET["id_class"]) && !empty($_GET["code"]))  {
        #kiểm tra có tồn tại không
        require '../Backend/Connection.php';
        $sql = "SELECT * FROM post WHERE id_post ='" .$_GET["id_post"]. "'";
        #Lấy tất cả dữ diệu từ post theo id_post
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
    <div class="card-group mt-5">
        <form action="../Backend/EditPost.php" method="POST" enctype="multipart/form-data" class="m-auto">
            <div class="form-group row ">
                <!--in message đó ra, message lúc này là message cũ chưa có update, khi sữa gì đó và nhấn vào buttun thì chuyển qua Editpost(backend) để update-->
                <textarea class="md-textarea form-control" required placeholder="Say something" name="msg" cols="30" rows="3"><?php echo $row["msg"] ?></textarea>
                <div class="input-group mt-2">
                    <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>" required>
                    <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" required>
                    <input type="hidden" name="id_post" value="<?php echo $_GET["id_post"] ?>">
                    <div class="custom-file mt-2 p-3">
                        <input type="file" name="file" class="custom-file-input p-4 py-5" id="customFile"/>
                        <label class="custom-file-label text-truncate" for="customFile">Chọn tệp</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary text-center mt-2 pt-0 pb-0" type="submit">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php } ?>
</body>

</html>