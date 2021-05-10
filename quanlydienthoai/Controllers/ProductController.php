<?php
class ProductController{
    public function index(){
        $model = new ProductModel();
        $keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
        $products = $model->getData($keyword);
        include_once "Views/products/index.php";
    }
    public function create(){
        include_once "Views/products/create.php";
    }
    public function store(){
        $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : '';
        $product_image = '';
        if ($_FILES['product_image']['name'] != NULL){
            $path = "public/images/";
            $tmp_name = $_FILES['product_image']['tmp_name'];
            $img_name = $_FILES['product_image']['name'];
            move_uploaded_file($tmp_name, $path . $img_name);
            $product_image = $path.$img_name;
        }
        $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : '';
        $product_quantity = isset($_REQUEST['product_quantity']) ? $_REQUEST['product_quantity'] : '';
        $product_desc = isset($_REQUEST['product_desc']) ? $_REQUEST['product_desc'] : '';

        $model = new ProductModel();
        $model -> store($product_name,$product_image,$product_price,$product_quantity,$product_desc);
        $_SESSION['status'] = 'Thêm mới sản phẩm thành công';
        header('location: index.php?controller=product&action=create');
        exit();
    }
    public function edit(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        if($id > 0){
            $model = new ProductModel();
            $product = $model->edit($id);
            include_once "Views/products/edit.php";
        }
    }
    public function update(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : '';
        $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : '';
        $product_desc = isset($_REQUEST['product_desc']) ? $_REQUEST['product_desc'] : '';
        $product_quantity = isset($_REQUEST['product_quantity']) ? $_REQUEST['product_quantity'] : '';
        $product_image = '';
        if ($_FILES['product_image']['name'] != NULL){
            $path = "public/images/";
            $tmp_name = $_FILES['product_image']['tmp_name'];
            $img_name = $_FILES['product_image']['name'];
            move_uploaded_file($tmp_name, $path . $img_name);
            $product_image = $path.$img_name;
        }
        if ($id > 0){
            $model = new ProductModel();
            $model->update($id,$product_name,$product_image,$product_price,$product_quantity,$product_desc);
            $_SESSION['status'] = 'Sửa sản phẩm thành công';
            header("location: index.php?controller=product&action=edit&id=$id");
            exit();
        }

    }
    public function delete(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        if($id > 0){
            $model = new ProductModel();
            $model->delete($id);
            $_SESSION['status'] = 'Xóa sản phẩm thành công';
            header('location: index.php?controller=product&action=index');
            exit();
        }
    }
}