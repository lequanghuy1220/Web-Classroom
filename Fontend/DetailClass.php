<?php include '../Backend/Loggedin.php' ?>
<?php if (!isset($_GET["id"]) || !isset($_GET["code"]) || empty($_GET["id"]) || empty($_GET["code"])) {
  #thỏa mãn điều kiện ở trên mới được sử dụng trang này
  exit;
} else {
  $sql = "SELECT * FROM class WHERE id_class ='" . $_GET["id"] . "'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $ClassName = $row["name"];
  $subject = $row["subject"];
  $room = $row["room"];
  $code = $row["code"];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="Main.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<style>

</style>

<body>


  <!-- Top navigation -->
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


  <div class="container py-5">
    <!-- Tiêu Đề Lớp -->
    <div class="row mb-5">
      <div class="col-lg-8 text-white py-4 text-center mx-auto">
        <?php ?>
        <h1 class="display-4"><?php echo $ClassName ?></h1>
        <p class="lead mb-0"><?php echo $subject ?> - <?php echo $room ?></p>
        <!-- Xóa lớp học và chỉnh sửa lớp học, nếu là admin và giáo viên mới dc chỉnh sửa -->
        <?php if ($type == 0 || $type == 2) { ?>
          <p class="lead mb-0"><?php echo $code ?></p>
          <a class="lead mb-0 text-white" href="Confirm.php?id=<?php echo $_GET["id"] ?>">Xóa lớp học</a> | <a class="lead mb-0 text-white" href="CreateClass.php?id=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Chỉnh sửa lớp học</a>
        <?php } ?>
      </div>
    </div>
    <!-- End -->
    <div class="p-5 bg-white rounded shadow m-auto">
      <!-- Các tab trong lớp -->
      <ul class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav" id="myTab" role="tablist">
        <li class="nav-item flex-sm-fill active">
          <a id="home-tab" data-toggle="tab" href="#Class1" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Lớp Học</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="profile-tab" data-toggle="tab" href="#Baitap" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Bài Tập</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a id="contact-tab" data-toggle="tab" href="#ThanhVien" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Thành Viên</a>
        </li>
      </ul>


      <!--Nội Dung tab-->
      <div id="myTabContent" class="tab-content">
        <div id="Class1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
          <div class="card-group">
            <!--Post-->
            <form action="../Backend/Post.php" method="POST" enctype="multipart/form-data" class="m-auto">
              <div class="form-group row ">
                <textarea class="md-textarea form-control" required placeholder="Say something" name="msg" cols="58" rows="3"></textarea>
                <div class="input-group mt-2">
                  <!--Gửi msg nhưng phải kèm theo id_class và code để biết là đăng trong lớp nào, sau đó submit lên file Post-->
                  <input type="hidden" name="id_class" value="<?php echo $_GET["id"] ?>" required>
                  <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" required>
                  <div class="custom-file mt-2 p-3">
                    <input type="file" name="file" class="custom-file-input p-4 py-5" id="customFile" />
                    <label class="custom-file-label text-truncate" for="customFile">Chọn tệp</label>
                  </div>
                  <div class="input-group-append">
                    <button class="btn text-center mt-2 pt-0 pb-0" type="submit">Post</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <?php
          #Hiển thị Post
          $sql = "SELECT * FROM post WHERE id_class ='" . $_GET["id"] . "' ORDER BY id_post DESC";
          # lấy tất cả từ post với điều kiện id_class đúng bằng id này và oder by để sắp xếp ngược lại(giảm dần theo id_post), người nào post sau thì lên đầu
          $result = $conn->query($sql); #gán kết quả vào $result

          while ($row = $result->fetch_assoc()) {
            $sql = "SELECT * FROM account WHERE id_acc ='" . $row["id_acc"] . "'";
            #mỗi vòng lặp sẽ lấy ra được 1 hàng["id_acc"] trong account,trong bài thì sẽ lấy avatar và name
            $racc = $conn->query($sql);
            $acc = $racc->fetch_assoc(); #gán kết quả vào $acc
          ?>
            <div class="panel panel-default border m-4 rounded position-relative">
              <div class="panel-heading  p-5">
                <!--hiển thị avatar và tên cho post-->
                <p class="pull-left font-weight-bold"><img src="<?php echo $acc["ava"] ?>" width="40px" height="40px" class="rounded-circle">&nbsp;<?php echo $acc["name"] ?></p>
                <div class="dropdown-tdoc dropdown dropdown-menu-right" style="z-index: 1; position: absolute; top: 40px; right: 30px;">
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="dropdown-svg" width="24px" height="24px" viewBox="0 0 24 24" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                      </path>
                    </svg>
                  </a>
                  <!--Sửa và xóa Post-->
                  <?php if ($type == 0 || $type == 2 || $id_acc == $row["id_acc"]) { ?>
                    <!--Nếu là admin hoặc giáo viên thì có quyền xóa bất kỳ bài nào trong class, còn student chỉ được xóa bài đăng của chính học sinh đố-->
                    <div class="dropdown-menu dropdown-menu-right dropdown-info active-none position-absolute" aria-labelledby="navbarDropdownMenuLink-4">
                      <!--phương thức get id và code để kiểm tra, nếu đúng mới cho vô trang này,và id_post để biết đó là bài nào để xóa-->
                      <a class="dropdown-item" href="EditPost.php?id_post=<?php echo $row["id_post"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Chỉnh sửa</a>
                      <a class="dropdown-item" href="Confirm.php?id_post=<?php echo $row["id_post"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Xóa</a>

                    </div>
                  <?php } ?>
                </div>
              </div>

              <div class="panel-body ">

                <div class="post-content mx-3 border-bottom rounded mt-3">
                  <p class="px-4"><?php echo $row["msg"] ?></p> <!--Lấy message-->
                  <?php if ($row["file"] != "") { ?> <!--Kiểm tra xem file upload lên có rỗng ko-->
                    <!--đường dẫn chứa file upload và phần dowload-->
                    <a href="http://localhost/classroomproject/<?php echo $row["file"] ?>" download="<?php echo $row["file"] ?>"><i class="fa fa-file-o pb-3 ml-4" id="fileAttach"></i></a>
                  <?php } ?>
                </div>
                <!--kết thúc Post-->
                <!--Comment hiển thị-->
                <div class="displayComment mx-4 border-bottom">
                  <p class="px-5 font-weight-bold">Bình luận</p>
                  <?php
                  $sql = "SELECT * FROM comment WHERE id_post = '" . $row["id_post"] . "' ORDER BY id_cmt DESC";
                  #kiểm tra đúng Post đó thì sẽ lấy thông qua id_post
                  $rcmt = $conn->query($sql);
                  while ($cmt = $rcmt->fetch_assoc()) {
                    $sql = "SELECT * FROM account WHERE id_acc ='" . $cmt["id_acc"] . "'";
                    #lấy id_acc trong comment từ bảng account, lúc này sẽ lấy avatar và tên tương tự như post
                    $racc = $conn->query($sql);
                    $acc = $racc->fetch_assoc();
                  ?>
                    <!--hiển thị avatar và tên cho comment-->
                    <div class="comment ml-5 pl-3">
                      <span class="font-weight-bold"><img src="<?php echo $acc["ava"] ?>" height="40px" width="40px" class="rounded-circle">&nbsp; <?php echo $acc["name"] ?></span>
                      <a class="dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="dropdown-svg" width="18px" height="18px" viewBox="0 0 24 24" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
                          </path>
                        </svg>
                      </a>
                      <!--Chỉnh sửa và xóa comment-->
                      <!--phân quyền admid ,giáo viên và người đăng comment dc xóa comment-->
                      <?php if ($type == 0 || $type == 2 || $id_acc == $cmt["id_acc"]) { ?>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info active-none position-absolute" aria-labelledby="navbarDropdownMenuLink-4">
                          <a class="dropdown-item" href="EditComment.php?id_cmt=<?php echo $cmt["id_cmt"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Chỉnh sửa</a>
                          <a class="dropdown-item" href="Confirm.php?id_cmt=<?php echo $cmt["id_cmt"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Xóa</a>
                        </div>
                      <?php } ?>
                      <p class="ml-5"><?php echo $cmt["msg"] ?></p>
                    </div>
                  <?php } ?>
                </div>
                <!--comment-->
                <form action="../Backend/Comment.php" method="POST">
                  <div class="input-group p-3 ml-5">
                    <input type="hidden" name="id_post" value="<?php echo $row["id_post"] ?>" required>
                    <input type="hidden" name="id_class" value="<?php echo $_GET["id"] ?>" required>
                    <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" required>
                    <input class="input-group-append w-75 ml-4" name="comment" placeholder="Comment" required></input>
                    <span><input class="input-group-append  py-1" type="submit" value="Comment"></span>
                  </div>
                </form>

              </div>
            </div>
          <?php } ?>

        </div>
        <!--Tạo Bài Tập-->
        <div id="Baitap" role="tabpanel" class="tab-pane fade">

          <div class="mt-5">
            <?php if ($type == 0 || $type == 2) { ?>
            <!--data-target sẽ dẫn đến 1 dialog(vẫn nằm trong 1 trang)-->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taoBaiTap">
                Tạo Bài Tập
              </button>
            <?php } ?>
            <!-- Modal -->
            <div class="modal fade" id="taoBaiTap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered row" role="document">
                <div class="modal-content w-100">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Bài Tập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../Backend/CreateAssignment.php" method="POST" enctype="multipart/form-data">
                      <span>Tên Bài Tập</span>
                      <input type="text" name="title" class="form-control" required>
                      <span>Mô Tả</span>
                      <textarea type="text" name="description" class="form-control" required></textarea>
                      <span>Ngày hết hạn</span>
                      <input type="date" name="deadline" class="form-control" required>
                      <input type="hidden" name="id_class" value="<?php echo $_GET["id"] ?>">
                      <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>">
                      <span>Thêm File</span>
                      <input type="file" class="custom-file" name="file">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!--Hiển thị bài tập-->
          <?php
          $sql = "SELECT * FROM assignment WHERE id_class ='" . $_GET["id"] . "' ORDER BY id_ass DESC";
          #lấy dữ liệu từ assignment id_class bằng id_class hiện tại 
          $result = $conn->query($sql);
          #có vòng lặp vì có nhiều bài tập load lên nên sẽ có nhiều row
          while ($row = $result->fetch_assoc()) {
          ?>
            <div class="border mt-5 p-2">
              <div class="Display p-4 ">
                <div class="tieuDe">
                  <span class="position-relavtive">
                    <!--Hiển thị title và deadline-->
                    <span class="mt-5"><?php echo $row["title"] ?></span>
                    <span><i>(Due:<?php echo $row["deadline"] ?>)</i></span>
                    <!--Xóa và sửa, chỉ có gv và admin mới dc xóa sửa-->
                    <?php if ($type == 0 || $type == 2) { ?>
                      <div class="float-right">
                        <a href="Confirm.php?id_ass=<?php echo $row["id_ass"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Xóa</a> | <a href="EditAssignment.php?id_ass=<?php echo $row["id_ass"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Sửa</a>
                      </div>
                    <?php } ?>
                  </span>
                </div>
                <hr>
                <div class="mota">
                  <p><?php echo $row["description"] ?></p>
                  <?php if ($row["file"] != "") { ?>
                    <a href="http://localhost/classroomproject/<?php echo $row["file"] ?>" download="<?php echo $row["file"] ?>"><i class="fa fa-file-o pb-3 ml-4" id="fileAttach"></i></a>
                  <?php } ?>
                </div>
                <hr>
                <div class="xemChiTiet">
                  <a href="#">Xem bài tập</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <!--Thêm thành viên-->
        <div id="ThanhVien" role="tabpanel" class="tab-pane fade px-4 py-5 collapsed">
          <div>
            <!--chỉ gv và admin mới dc thêm-->
            <?php if ($type == 0 || $type == 2) { ?>
              <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#themThanhVien">
                Thêm Thành Viên
              </button>
            <?php } ?>
            <!-- Modal -->
            <div class="modal fade" id="themThanhVien" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content w-100">
                  <div class="modal-header">
                    <h5>Thêm Thành Viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="../Backend/AddStudent.php" method="POST">
                    <div class="modal-body">
                      <input type="email" class="form-control" name="Email" placeholder="Email" required>
                      <input type="hidden" name="id_class" value="<?php echo $_GET["id"] ?>" required>
                      <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" required>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--xem danh sách giao vien va hoc sinh-->
          <div class="giaoVien mt-5">
            <h2>Giáo Viên</h2>
            <hr>
            <?php
            #lấy id_acc từ bảng account_class với điều kiện id_class = id_class hiện tại
            #lấy tất cả thông tin từ bảng acount với điều kiện là giáo viên và id_acc của account tham chiếu dến id_acc của account_class
            $sql = "SELECT * FROM account WHERE type = 2 AND id_acc IN (SELECT id_acc FROM account_class WHERE id_class = '" . $_GET["id"] . "')";
            $result = $conn->query($sql);
            #vòng while để load dữ liệu lên
            while ($row = $result->fetch_assoc()) {
            ?>
              <p class="border-bottom mt-2 p-3"><img src="<?php echo $row["ava"]?>" width="40px" height="40px" alt="avatar" class="rounded-circle"> &nbsp; <?php echo $row["name"] ?>
                <!--xóa Giáo viên-->
                <!--chỉ có admin mới được quyền xóa-->
                <?php if ($type == 0 ) { ?>
                  <a class="float-right" href="Confirm.php?id_acc=<?php echo $row["id_acc"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Xóa</a>
                <?php } ?>
              </p>
            <?php } ?>

          </div>

          <div class="hocSinh">
            <h2>Sinh Viên</h2>
            <hr>
            <?php
            $sql = "SELECT * FROM account WHERE type = 1 AND id_acc IN (SELECT id_acc FROM account_class WHERE id_class = '" . $_GET["id"] . "')";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
              <p class="border-bottom mt-2 p-3"><img src="<?php echo $row["ava"]?>" width="40px" height="40px" alt="avatar" class="rounded-circle"> &nbsp; <?php echo $row["name"] ?>
                <!--xóa học sinh-->
                <?php if ($type == 0 || $type == 2) { ?>
                  <a class="float-right" href="Confirm.php?id_acc=<?php echo $row["id_acc"] ?>&id_class=<?php echo $_GET["id"] ?>&code=<?php echo $_GET["code"] ?>">Xóa</a>
                <?php } ?>
              </p>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- End rounded tabs -->
    </div>
  </div>
  <script src="Main.js"></script>
</body>

</html>