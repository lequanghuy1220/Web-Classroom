<?php
    #khi login vào thì sẽ tồn tại 1 session, đến khi nào hủy thì sẽ đăng xuất
    session_start();
    #unset và destroy sẽ hủy session hiện tại, sau khi hủy chuyển về trang login
    session_unset();
    session_destroy();
    header("Location: ../Fontend/Login.php");
    exit;
?>