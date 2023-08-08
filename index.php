<!--xác định người dùng-->
<?php require 'Backend/Loggedin.php' ?>
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
   <script src="Fontend/Main.js"></script>
   <link rel="stylesheet" href="Fontend/style.css">
</head>

<body>
   <!-- Thanh sidepanel -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
         <img src="https://upload.wikimedia.org/wikipedia/vi/1/1b/T%C4%90T_logo.png" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
         Tôn Đức Thắng University
      </a>
      <!-- các nút -->
      <ul class="navbar-nav ml-auto">
         <!--phần search-->
         <div class="search-container">
            <form action="index.php" method="GET">
               <!--Lấy giá trị người dùng nhập vào search_key-->
               <input type="text" placeholder="Search..." name="SearchKey" value="<?php if (isset($_GET["SearchKey"])) echo $_GET["SearchKey"] ?>">
               <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
         <li class="nav-item dropdown">
            <a class="nav-link Join" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Tạo hoặc tham gia vào lớp học">
               <button class="btn"><i class="fa fa-plus text-white"></i> </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
               <!--Tham gia lớp học,nếu là giáo viên hoặc admin thì có thêm nút tạo lớp học-->
               <?php if ($type == 0 || $type == 2) { ?>
                  <!--Tạo lớp học-->
                  <a class="dropdown-item" href="Fontend/CreateClass.php">Tạo lớp học</a>
                  <a href="Fontend/JoinClass.php" class="dropdown-item">Tham gia lớp học</a>
               <?php } else { ?>
                  <a href="Fontend/JoinClass.php" class="dropdown-item">Tham gia lớp học</a>
               <?php } ?>
            </div>
         </li>
      </ul>

      <ul class="navbar-nav">
         <li class="nav-item dropdown">
            <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <button class="btn"><i class="fa fa-user text-white"></i> </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
               <a class="dropdown-item" href="Fontend/Profile.php">Tài khoản của tôi</a>
               <!--Admin mới có phần quản lý tài khoản-->
               <?php if ($type == 0) { ?>
                  <a class="dropdown-item" href="Fontend/ManageAccount.php">Quản lý tài khoản</a>
               <?php } ?>
               <!--Đăng xuất-->
               <a class="dropdown-item" href="Backend/Logout.php">Đăng xuất</a>
            </div>
         </li>
      </ul>
   </nav>

   <div class="container-fluid">
      <div class="row">
         <!--sau khi submit phần search thì chuyển đến đây-->
         <?php
         #nếu tồn tại GET["SearchKey"] và không rỗng
         if (isset($_GET["SearchKey"]) && !empty($_GET["SearchKey"])) {
            $key = $_GET["SearchKey"];
            $sql = "SELECT * FROM class 
            #like là toán tử kiểm tra gần đúng trong sql(Tìm kiếm không có dấu)
            #binary sẽ tìm kiếm theo có dấu và không có dấu và xét cả 2 đầu của giá trị mình nhập vào
            #tìm kiếm theo name, hoặc tìm kiếm theo subject, hoặc theo room
            WHERE name LIKE BINARY '%$key%' OR subject LIKE BINARY '%$key%' OR room LIKE BINARY '%$key%' 
            OR name LIKE '%$key%' OR subject LIKE '%$key%' OR room LIKE '%$key%' AND id_class IN (SELECT id_class FROM account_class WHERE id_acc = $id_acc)";
            $result = $conn->query($sql);
            #nếu không có key(không nhập gì) thì load lớp như bình thường
         } else {
            $sql = "SELECT * FROM class WHERE id_class IN (SELECT id_class FROM account_class WHERE id_acc = $id_acc)";
            $result = $conn->query($sql);
         }
         #lấy giá trị result là load card lên
         while ($row = $result->fetch_assoc()) {
         ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-3 rounded-sm">
               <div class="card border-bottom-0 rounded-sm">
                  <img class="card-img-top" src="<?php echo $row["image"] ?>" width="100%" height="200">
               </div>
               <div class="card border-top-0 rounded-0">
                  <div class="card-footer .bg-black border-0">
                     <p><a class="  text-lg mt-2" href="Fontend/DetailClass.php?id=<?php echo $row["id_class"] ?>&code=<?php echo $row["code"] ?>"><?php echo $row["name"] ?></a></p>
                     <p><a class="text-danger mt-2"><?php echo $row["subject"] . "-" . $row["room"] ?></a></p>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>


</body>

</html>