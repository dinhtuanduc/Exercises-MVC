<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/product_create.css">
    <script src="public/js/jquery-3.6.0.js"></script>
    <title>Home</title>
</head>
<body>
<div class="container">
    <h2 class="text-center">Thêm mới Sản phẩm</h2>
    <?php
    if (isset($_SESSION['status'])){
        ?>
        <div class="alert alert-success"><?php echo $_SESSION['status'] ?></div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <form id="product_create" method="post" action="index.php?controller=product&action=update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
        <div class="form-group">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="product_name" value="<?php echo $product['product_name'] ?>">
        </div>
        <div class="form-group">
            <label for="product_image">Ảnh:</label>
            <input type="file" class="form-control" name="product_image">
            <img width="150px" src="<?php echo $product['product_image'] ?>">
        </div>
        <div class="form-group">
            <label for="product_price">Giá:</label>
            <input type="number" class="form-control" name="product_price" value="<?php echo $product['product_price'] ?>">
        </div>
        <div class="form-group">
            <label for="product_quantity">Số lượng:</label>
            <input type="number" class="form-control" name="product_quantity" value="<?php echo $product['product_quantity'] ?>">
        </div>
        <div class="form-group">
            <label for="product_desc">Mô tả:</label>
            <textarea class="form-control" name="product_desc" id="product_desc" cols="30" rows="10"><?php echo $product['product_desc'] ?></textarea>
        </div>
        <button type="submit" id="btnSubmit" class="btn btn-primary">Cập nhật</button>
        <a href="index.php" class="btn btn-info">Trở về trang chủ</a>
    </form>
</div>
<script src="public/js/jquery.validate.js"></script>
<script src="public/js/product_update.js"></script>
</body>
</html>
