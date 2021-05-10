<?php
class connection{
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'quanlydienthoai';
    protected $conn;

    //Tự động kết nối
    public function __construct()
    {
        if (!$this->conn){
            $this->connect();
        }
    }
    //Tự động ngắt
    public function __destruct()
    {
        if ($this->conn){
            $this->disconnect();
        }
    }

    //Kết nối
    public function connect(){
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    //Ngắt
    public function disconnect(){
        $this->conn = NULL;
    }
}