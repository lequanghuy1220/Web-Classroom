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
    <title>Xác nhận</title>
</head>

<body>
    <?php if (isset($_GET["id"]) && !empty($_GET["id"])) { ?> <!-- Kiểm tra phương thức GET có tồn tại id và id không được rỗng -->
        <div class="text-center mt-5">
            <form action="../Backend/DeleteClass.php" method="POST"> <!-- kiểm tra xong sẽ qua delete lớp học -->
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                <h1>Bạn có chắc xóa lớp học này?</h1>
                <input type="submit" value="Xóa" class="btn btn-primary pl-4 pr-4 mt-3">
            </form>

        </div>
            <!--Xóa comment-->
    <?php } else if (isset($_GET["id_cmt"]) && !empty($_GET["id_cmt"]) && !empty($_GET["id_class"]) && !empty($_GET["code"])) { ?>
        <div class="text-center mt-5">
            <form action="../Backend/DeleteComment.php" method="POST">
                <h1>Bạn có chắc xóa bình luận này?</h1>
                <!--gửi kèm id_comment để biết comment nào mà xóa-->
                <input type="hidden" name="id_cmt" value="<?php echo $_GET["id_cmt"] ?>">
                <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>">
                <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>">
                <input type="submit" value="Xóa" class="btn btn-primary pl-4 pr-4 mt-3">
            </form>
        </div>
        <!--Xóa post-->
    <?php } else if (isset($_GET["id_post"]) && !empty($_GET["id_post"] && !empty($_GET["id_class"]) && !empty($_GET["code"]))) { ?>
        <div class="text-center mt-5">
            <form action="../Backend/DeletePost.php" method="POST">
                <h1>Bạn có chắc xóa post này?</h1>
                <input type="hidden" name="id_post" value="<?php echo $_GET["id_post"] ?>">
                <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>">
                <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>">
                <input type="submit" value="Xóa" class="btn btn-primary pl-4 pr-4 mt-3">
            </form>
        </div>
            <!--Xóa Bài tập-->
    <?php } else if (isset($_GET["id_ass"]) && !empty($_GET["id_ass"]) && !empty($_GET["id_class"]) && !empty($_GET["code"])) { ?>
        <div class="text-center mt-5">
            <form action="../Backend/DeleteAssignment.php" method="POST">
                <h1>Bạn có chắc xóa bài tập này?</h1>
                <input type="hidden" name="id_ass" value="<?php echo $_GET["id_ass"] ?>">
                <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>">
                <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>">
                <input type="submit" value="Xóa" class="btn btn-primary pl-4 pr-4 mt-3">
            </form>
        </div>
        <!--xóa Giáo viên,học sinh-->
    <?php } else if (isset($_GET["id_acc"]) && !empty($_GET["id_acc"]) && !empty($_GET["id_class"]) && !empty($_GET["code"])) { ?>

        <div class="text-center mt-5">
            <form action="../Backend/DeleteStudent.php" method="POST">
                <h1>Bạn có chắc xóa người này ra khỏi lớp học?</h1>
                <input type="hidden" name="id_acc" value="<?php echo $_GET["id_acc"] ?>">
                <input type="hidden" name="id_class" value="<?php echo $_GET["id_class"] ?>">
                <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>">
                <input type="submit" value="Xóa" class="btn btn-primary pl-4 pr-4 mt-3">
            </form>
        </div>
    <?php } ?>
</body>

</html>