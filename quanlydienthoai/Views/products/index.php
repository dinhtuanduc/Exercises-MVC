<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--    public/css/bootstrap.min.css-->
    <title>Home</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Quản lý Điện Thoại</h1>
    <form class="form-inline justify-content-center" method="get" action="index.php?controller=product&action=index">
        <label for="keyword">Nhập từ khóa:</label>
        <input type="text" class="form-control" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    <?php
    if (isset($_SESSION['status'])){
        echo "<div class='alert alert-success'>".$_SESSION['status']."</div>";
        unset($_SESSION['status']);
    }
    ?>
    <a class="btn btn-primary" href="index.php?controller=product&action=create">Thêm mới sản phẩm</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($products)){
            foreach ($products as $product){
                ?>
                <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['product_name'] ?></td>
                    <td><img width="130px" src="<?php echo $product['product_image'] ?>"></td>
                    <td><?php echo $product['product_desc'] ?></td>
                    <td><?php echo $product['product_price'] ?></td>
                    <td><?php echo $product['product_quantity'] ?></td>
                    <td><?php echo $product['product_created'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="index.php?controller=product&action=edit&id=<?php echo $product['id'] ?>">Sửa</a>
                        <a onclick="return confirm('Bạn có chắc muốn xóa không?')" class="btn btn-danger" href="index.php?controller=product&action=delete&id=<?php echo $product['id'] ?>">Xóa</a>
                    </td>
                </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td class="text-center text-danger" colspan="8">Không có bản ghi nào</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
