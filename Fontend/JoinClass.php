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
    <link rel="stylesheet" href="style.css">

<body>
    <form action="../Backend/JoinClass.php" method="POST">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href=""> Tham gia lớp học</a>

            <ul class="navbar-nav ml-auto text-white rounded">
                <Button class="btn rounded">Tham Gia</Button>
            </ul>
        </nav>
        <div class="form">
            <div class="item_form1">
                <h3>Mã Lớp</h3>
                <p>Đề nghị giáo viên cung cấp mã lớp</p>
                <input id="code_Class" type="text" placeholder="Mã lớp" name="code_Class" required>
                <!--Không tìm thấy lớp học sẽ hiển thị msg-->
                <p class="text-danger"> <?php if(isset($_GET["msg"]) ) echo $_GET["msg"] ?></p>
            </div>
        </div>
    </form>
    <div class="form1">
        <div class="text_suggestions">
            <p><b>Cách đăng nhập bằng mã lớp học</b></p>
            <ul>

            </ul>
            <li>
                Sử dụng tài khoản được cấp phép
            </li>
            <li>
                Sử dụng mã lớp học gồm 6 kí tự
            </li>
            <p>Nếu bạn đang gặp vấn đề khi tham gia lớp học , hãy liên hệ giáo viên tạo lớp học
            </p>
        </div>
    </div>
</body>

</html>