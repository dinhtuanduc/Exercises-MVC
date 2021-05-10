<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/error_register.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Tạo tài khoản</h1>
    <?php
    if (isset($_SESSION['status'])){
        echo "<div class='alert alert-success'>".$_SESSION['status']."</div>";
        unset($_SESSION['status']);
    }
    ?>
    <form id="register" method="post" action="index.php?controller=auth&action=store">
        <div class="form-group">
            <label for="fullname">Họ và Tên:</label>
            <input type="text" class="form-control" name="fullname">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username">
            <div id="result_username" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="psw">Password:</label>
            <input type="password" class="form-control" name="psw">
        </div>
        <div class="form-group">
            <label for="gender">Giới tính:</label>
            <input type="radio" name="gender" value="2">Nam
            <input type="radio" name="gender" value="3">Nữ
        </div>
        <div class="form-group">
            <label for="age">Tuổi:</label>
            <input type="number" class="form-control" name="age">
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" name="address">
        </div>
        <br>
        <button type="submit" id="submit" class="btn btn-primary">Tạo mới</button>
        <a href="index.php?controller=auth&action=login">Quay trở lại trang đăng nhập</a>
    </form>
</div>
<script src="public/js/jquery-3.6.0.js"></script>
<script src="public/js/jquery.validate.js"></script>
<script src="public/js/register.js"></script>
</body>
</html>
