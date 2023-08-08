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
    <title>Cập nhật</title>
</head>

<body>
    <?php if (!empty($_GET["id_ass"]) && !empty($_GET["id_class"]) && !empty($_GET["code"])) {
        require '../Backend/Connection.php';
        #lấy dữ liệu từ bảng asignment với id_ass = id_ass hiện tại
        $sql = "SELECT * FROM assignment WHERE id_ass ='" . $_GET["id_ass"] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
        <div class="m-auto w-25">
            <!--lấy dữ liệu ở trên và in ra, để biết dữ liệu lúc này là gì-->
            <form class="mt-5" action="../Backend/EditAssignment.php" method="POST" enctype="multipart/form-data">
                <label for="title">Tên bài tập</label>
                <input type="text" name="title" value="<?php echo $row["title"] ?>" class="form-control" required>
                <label for="description">Mô tả</label>
                <textarea type="text" name="description" class="form-control" required><?php echo $row["description"] ?></textarea>
                <label for="deadline">Ngày hết hạn</label>
                <input type="date" name="deadline" value="<?php echo $row["deadline"] ?>" class="form-control" required>
                <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>" required>
                <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" required>
                <input type="hidden" name="id_ass" value="<?php echo $_GET["id_ass"] ?>" required>
                <input class="mt-3 mb-3" type="file" class="custom-file" name="file">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>

    <?php } ?>
</body>

</html>