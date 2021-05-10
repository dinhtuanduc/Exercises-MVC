<?php
if (isset($_SESSION['login'])){
    header('location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/error.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Màn hình đăng nhập</h1>
    <?php
    if (isset($_SESSION['action'])){
        echo "<div class='alert alert-danger'>".$_SESSION['action']."</div>";
        unset($_SESSION['action']);
    }
    ?>
    <form id="login" method="post" action="index.php?controller=auth&action=handle">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="psw">Password:</label>
            <input type="password" class="form-control" name="psw">
        </div>
        <br>
        <button type="submit" id="submit" class="btn btn-primary">Đăng nhập</button>
        <a href="index.php?controller=auth&action=register">Tạo mới tài khoản</a>
    </form>
</div>
<script src="public/js/jquery-3.6.0.js"></script>
<script src="public/js/jquery.validate.js"></script>
<script src="public/js/login.js"></script>
</body>
</html>
