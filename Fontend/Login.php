<!--Nếu tồn tại id_acc thì chuyển đến file index-->
<?php if (isset($_SESSION["id_acc"]) && !empty($_SESSION["id_acc"])) {
    header("Location: ../index.php");
} ?>

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
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 m-auto ">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Đăng nhập</h5>
                        <form action="../Backend/Login.php" class="form-signin p-4" method="POST">
                            <div class="form-label-group">
                                <label for="inputEmail">Tài khoản</label>
                                <input type="text" id="inputEmail" name="txtUserName" class="form-control" placeholder="Tên tài khoản" required autofocus>
                            </div>
                            <div class="form-label-group mt-3">
                                <label for="inputPassword">Mật khẩu</label>
                                <input type="password" id="inputPassword" name="txtPassword" class="form-control" placeholder="Mật khẩu" required>
                            </div>
                            <!--in ra msg nếu sai mk hoac pass-->
                            <p class="text-danger"><?php if (isset($_GET["msg"])) echo $_GET["msg"] ?></p>
                            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Đăng nhập</button>

                            <hr class="my-4">
                            <div class="text-center pb-2">
                                <a href="Register.php">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>