<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Danh sách điện thoại</h1>

    <div class="row">
        <div class="col-md-12">
            <h2>Basic Table</h2>
            <form name="search" method="get" action="">
                <input type="text" name="keyword" value="<?php echo isset($_GET['keyword']) ?$_GET['keyword'] : ""; ?>" >
                <button>Tìm kiếm</button>
            </form>

            <?php
                if(isset($_SESSION["action"])){
                    if($_SESSION["action"] == "delete"){
                        echo "<div style='background-color: green;color: white;'>Xóa thành công</div>";
                    }else{
                        echo "<div style='background-color: green;color: white;'>Xóa thất bại</div>";
                    }
                    unset($_SESSION["action"]);
                }
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Tên Đt</th>
                    <th>Hãng Đt</th>
                    <th>Màu</th>
                    <th>Giá tiền</th>
                    <th>Mô tả</th>
                    <th>NGày đăng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($getDienthoai as $getData) { ?>
                    <tr>
                        <td><?php echo $getData["ten_dienthoai"] ?></td>
                        <td><?php echo $getData["ten_hang"] ?></td>
                        <td><?php echo $getData["mau_sac"] ?></td>
                        <td><?php echo $getData["gia_dienthoai"] ?></td>
                        <td><?php echo $getData["mo_ta"] ?></td>
                        <td><?php echo $getData["ngay_dang"] ?></td>
                        <td>
                            <?php
                            if ($getData["trang_thai"] == 1) {
                                echo "Hiện";
                            }
                            if ($getData["trang_thai"] == 0) {
                                echo "Ẩn";
                            }
                            ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không')" href="index.php?controller=dienthoai&action=delete&id=<?php echo $getData["ma_dienthoai"] ?>">Xóa</a>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>



</div>
</body>
</html>