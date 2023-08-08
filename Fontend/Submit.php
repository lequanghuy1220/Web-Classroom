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
    <title>Submit</title>
</head>

<body>
    <?php include "Header.php" ?>
    <div class="container bg-white">
        <div class="jumbotron bg-white mt-5 rounded">
            <div class="container">
                <h2 class="display-4">Tiêu đề bài tập</h2>
                <p><span>Người đăng: </span></p>
                <div>
                    <h6 class="float-left block">Điểm: </h6>
                    <h6 class="float-right block">Ngày hết hạn: </h6>
                </div>

                <div class="mt-5">
                    <p class="lead border-top">Nội dung bài tập</p>
                </div>
                <hr>
                <div class="comment form-group">
                    <div>
                        <p>
                            Display Comment
                        </p>
                    </div>
                    <hr>
                    <div class="input-group ">
                        <span class="float-left ">
                            <img src="https://d2p8jjwwnx090z.cloudfront.net/191/071/915/-59996988-202kp5r-5mgotbogtgnq9hf/large/avatar.jpg" alt="" class="rounded-circle input-append" width="40px" height="40px">
                        </span>
                        <input class="form-control input-group-append w-75 rounded-pill" id="comment" placeholder="Public Comment"></input>
                        <span><input class=" btn btn-primary rounded-pill py-0" type="submit" role="button" value="Gửi" style="height: 40px"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white rounded m-auto mt-5 p-5">
        <div class="mx-5">
            <h2 class="display-6  bold">Nộp Bài Tập</h2>
            <p class="text-muted">Trạng Thái</p>
            <p class="text-muted">Ngày Nộp:</p>
        </div>

        <div class="input-group px-5">
            <div class="custom-file ">
                <input type="file" class="custom-file-input rounded-pill" id="customFile" />
                <label class="custom-file-label text-truncate" for="customFile">Chọn tệp</label>
            </div>

            <div class="input-group-append">
                <input class="btn btn-primary rounded-pill py-0" type="submit" role="button" value="Gửi"></input>
            </div>
        </div>
        <hr>
        <div class="mt-5">
            <p>
                Display Comment
            </p>
        </div>
        <hr class="mx-3">
        <div class="input-group p-5">
            <div class="input-group">
                <span class="float-left ">
                    <img src="https://d2p8jjwwnx090z.cloudfront.net/191/071/915/-59996988-202kp5r-5mgotbogtgnq9hf/large/avatar.jpg" alt="" class="rounded-circle input-append" width="40px" height="40px">
                </span>
                <div class="input-group-append">
                    <input class="form-control input-group-append w-100 rounded-pill" id="comment" placeholder="Private Comment"></input>
                    <input class="btn btn-primary rounded-pill py-0" type="submit" role="button" value="Gửi"></input>
                </div>
            </div>
        </div>
</body>

</html>