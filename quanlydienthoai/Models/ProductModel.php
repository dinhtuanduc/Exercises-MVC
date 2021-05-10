<?php
class ProductModel extends connection {
    public function getData($keyword){
        $sql = "SELECT * FROM products";
        if ($keyword != ''){
            $sql .= " WHERE product_name LIKE '%$keyword%'";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function store($product_name,$product_image,$product_price,$product_quantity,$product_desc){
        $sql = "INSERT INTO products (product_name, product_image, product_price, product_quantity,product_desc) VALUES ('$product_name','$product_image',$product_price,$product_quantity,'$product_desc')";
        $this->conn->exec($sql);
    }
    public function edit($id){
        $sql = "SELECT * FROM products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $data =$data[0];
        return $data;
    }
    public function update($id,$product_name,$product_image,$product_price,$product_quantity,$product_desc){
        if ($product_image == ''){
            $sql = "UPDATE products
SET product_name = '$product_name', product_price= $product_price,
product_quantity = $product_quantity, product_desc= '$product_desc'
WHERE id = $id";
            $this->conn->exec($sql);
        }else{
            $sql = "UPDATE products
SET product_name = '$product_name', product_price= $product_price,
product_quantity = $product_quantity, product_desc= '$product_desc', product_image= '$product_image'
WHERE id = $id";
            $this->conn->exec($sql);
        }
    }
    public function delete($id){
        $sql = "DELETE FROM products WHERE id=$id";
        $this->conn->exec($sql);
    }
}