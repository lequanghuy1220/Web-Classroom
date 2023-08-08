<!--Kiểm tra có đăng nhập vào chưa,có thì mới cho chạy file này-->
<?php require '../Backend/Loggedin.php' ?>

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
    <title>Trang cá nhân</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">
            <img src="https://upload.wikimedia.org/wikipedia/vi/1/1b/T%C4%90T_logo.png" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
            Tôn Đức Thắng University
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn"><i class="fa fa-user text-white"></i> </button>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="Profile.php">Tài khoản của tôi</a>
                    <?php if ($type == 0) { ?>
                        <a class="dropdown-item" href="ManageAccount.php">Quản lý tài khoản</a>
                    <?php } ?>
                    <a class="dropdown-item" href="../Backend/Logout.php">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container bg-white rounded mt-5 ">
        <form action="../Backend/UpdateProfile.php" method="POST" enctype="multipart/form-data">
            <div class="row mt-5 p-4">
                <!--upload file avatar-->
                <div class=" mt-5 m-5">
                    <div class="avatar-wrapper">
                        <img class="profile-pic" src="<?php echo $row["ava"] ?>" />
                        <div class="upload-button"></div>
                        <input class="file-upload" name="ava" type="file" accept="image/*" />
                    </div>
                </div>
                <div class="col-md-8 mt-5 ">
                    <div class="row">
                        <div class="col-sm-8">
                            <!--lấy dữ liệu từ loggedin và in các thông tin vừa lấy được ra các ô tương ứng-->
                            <div class="form-group">
                                <table class="table  border-0 w-100 mt-2">
                                    <tr class="border-0">
                                        <th colspan="2" class="border-0 mt-4">
                                            <h1>Thông Tin (<?php echo $row["username"] ?>)</h1>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Họ Và Tên: </td>
                                        <td><input type="text" class="form-control" value="<?php echo $name ?>" placeholder="Họ và tên" required name="txtFullName"></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại: </td>
                                        <td><input type="text" class="form-control" value="<?php echo $phone ?>" placeholder="Số điện thoại" pattern="[0-9]{10}" required name="txtPhoneNumber"></td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td><input class="form-control" value="<?php echo $email ?>" type="email" name="txtEmail" placeholder="Email" required></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td><input type="date" value="<?php echo $dob ?>" class="form-control" required name="DateOfBirth"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" role="button" value="Cập nhật" class="btn btn-primary float-right"></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
    <script src="Main.js"></script>
</body>

</html>