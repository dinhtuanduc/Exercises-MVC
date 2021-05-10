<?php
class AuthModel extends connection {
    public function Handle($username,$password){
        $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public function check_username($username){
        $sql = "SELECT * FROM accounts WHERE username = '$username'";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public function store($fullname, $username, $psw, $gender, $age, $address){
        $sql = "INSERT INTO accounts (fullname, username, password, gender, age, address)
VALUES ('$fullname', '$username', '$psw', $gender, $age, '$address')";
        $this->conn->exec($sql);
    }
}