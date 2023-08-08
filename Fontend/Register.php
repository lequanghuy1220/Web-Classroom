<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Đăng kí</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="../Backend/SignUpAccount.php" method="POST">
                    <h2 class="account">Tài khoản</h2>
                    <div class="form-group">
                        <label for="txtFullName" class="mt-2">Họ và tên</label>
                        <input type="text" class="form-control" placeholder="Họ và tên" required name="txtFullName">
                        <label for="txtPhoneNumber" class="mt-2">Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="Số điện thoại" pattern="[0-9]{10}" required name="txtPhoneNumber">
                        <label for="txtEmail">Email</label>
                        <input class="form-control" type="email" name="txtEmail" placeholder="Email" required>
                        <p class="text-danger mt-1"><?php if(isset($_GET["msg1"])) echo $_GET["msg1"] ?></p>
                        <label for="DateOfBirth" class="mt-2">Ngày tháng năm sinh</label>
                        <input type="date" class="form-control" required name="DateOfBirth">
                        <label for="txtUserName" class="mt-2">Tài khoản</label>
                        <input type="text" class="form-control" placeholder="Tài khoản" required name="txtUserName">
                        <p class="text-danger mt-1"><?php if(isset($_GET["msg"])) echo $_GET["msg"] ?></p>
                        <label for="txtPassword" class="mt-2">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" required name="txtPassword">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>