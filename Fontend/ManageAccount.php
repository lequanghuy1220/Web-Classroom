<?php include '../Backend/Loggedin.php' ?>
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

    <script src="Main.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Quản lý tài khoản</title>
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
                    <a class="dropdown-item" href="#">Tài khoản của tôi</a>
                    <?php if ($type == 0) { ?>
                        <a class="dropdown-item" href="ManageAccount.php">Quản lý tài khoản</a>
                    <?php } ?>
                    <a class="dropdown-item" href="../Backend/Logout.php">Đăng xuất</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container py-5 w-50">
        <div class="p-5 bg-white rounded shadow m-auto">
            <h3 class="mb-3">Tài khoản</h3>
            <?php
            #lấy dữ liệu từ bảng account
            $sql = "SELECT * FROM account";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="dd">
                    <a class="dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="dropdown-svg" width="18px" height="18px" viewBox="0 0 24 24" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                            </path>
                        </svg>
                    </a>
                    <!--Phân quyền cho người dùng-->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-4">
                        <!--nếu là admin thì có thể chuyển thành Giào viên và học sinh, type=2 or =1-->
                        <?php if ($row["type"] == 0) { ?>
                            <!--chuyển đến ManageAccount(backend) để xét role-->
                            <a class="dropdown-item" href="../Backend/ManageAccount.php?role=2&id_acc=<?php echo $row["id_acc"] ?>">Teacher</a>
                            <a class="dropdown-item" href="../Backend/ManageAccount.php?role=1&id_acc=<?php echo $row["id_acc"] ?>">Student</a>
                        <?php } else if ($row["type"] == 1) { ?>
                            <a class="dropdown-item" href="../Backend/ManageAccount.php?role=0&id_acc=<?php echo $row["id_acc"] ?>">Admin</a>
                            <a class="dropdown-item" href="../Backend/ManageAccount.php?role=2&id_acc=<?php echo $row["id_acc"] ?>">Teacher</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="../Backend/ManageAccount.php?role=0&id_acc=<?php echo $row["id_acc"] ?>">Admin</a>
                            <a class="dropdown-item" href="../Backend/ManageAccount.php?role=1&id_acc=<?php echo $row["id_acc"] ?>">Student</a>
                        <?php } ?>
                    </div>
                        <!--show ra tên tài khoản-->
                    <p><?php echo $row["username"] ?>
                            <!--nếu là 0 thì in ra Admin-->
                        <i>(<?php if ($row["type"] == 0) {
                                echo "Admin";
                            } else if ($row["type"] == 1) {
                                echo "Student";
                            } else {
                                echo "Teacher";
                            } ?>)</i>
                    </p>
                    <hr>
                </div>

            <?php } ?>
        </div>
    </div>
</body>

</html>