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
</head>

<body>
  <?php if (isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["code"]) && !empty($_GET["code"])) { 
    #Kiểm tra xem có tồn tại id không và id ko dc rỗng, code cũng vậy, nếu không rỗng thì dẫn đến trang tạo lớp hoc(form bên dưới)
    #gọi connection đến databate , lấy tất cả dữ liệu từ class(lấy từng dòng), lúc này nó sẽ show giá trị lên form 
    #và khi sửa phần nào đó trong form thì sẽ chuyển dến Updateclass.php
      require '../Backend/Connection.php';
      $sql = "SELECT * FROM class WHERE id_class ='" . $_GET["id"] . "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); 
    ?>
    <!--Cập nhật lớp học-->
    <form action="../Backend/UpdateClass.php" class="mt-5" method="POST" enctype="multipart/form-data">
      <div class="card p-3 w-50 m-auto block">
        <h1>Tạo Lớp học</h1>
        <hr>
        <div class="form-group">
          <label for="txtClassName"><b>Tên Lớp Học</b></label>
          <input class="form-control" value="<?php echo $row["name"] ?>" type="text" placeholder="Nhập tên lớp học(bắt buộc)" name="txtClassName" id="txtClassName" required><br>

          <label for="txtSubject"><b>Môn học</b></label>
          <input class="form-control" value="<?php echo $row["subject"] ?>" type="text" placeholder="Môn học" name="txtSubject" id="txtSubject" required> <br>

          <label for="txtRoom"><b>Phòng</b></label>
          <input class="form-control" value="<?php echo $row["room"] ?>" type="text" placeholder="Phòng học" name="txtRoom" id="txtRoom" required>
          <input type="hidden" name="id_class" value="<?php echo $_GET["id"] ?>">
          <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>">
          <input class="mt-4" type="file" name="Image">
        </div>
        <hr>
        <button type="submit" class="btn">Cập nhật</button>
      </div>
    </form>
    <!--Tạo lớp học-->
  <?php } else { ?>
    <form action="../Backend/CreateClass.php" class="mt-5" method="POST" enctype="multipart/form-data">
      <div class="card p-3 w-50 m-auto block">
        <h1>Tạo Lớp học</h1>
        <hr>
        <div class="form-group">
          <label for="txtClassName"><b>Tên Lớp Học</b></label>
          <input class="form-control" type="text" placeholder="Nhập tên lớp học(bắt buộc)" name="txtClassName" id="txtClassName" required><br>

          <label for="txtSubject"><b>Môn học</b></label>
          <input class="form-control" type="text" placeholder="Môn học" name="txtSubject" id="txtSubject" required> <br>

          <label for="txtRoom"><b>Phòng</b></label>
          <input class="form-control" type="text" placeholder="Phòng học" name="txtRoom" id="txtRoom" required>
          <input class="mt-4" type="file" name="Image">
        </div>
        <hr>
        <button type="submit" class="btn">Tạo</button>
      </div>
    </form>
  <?php } ?>
</body>

</html>