<?php
class connection{
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'quanlydangnhap';
    protected $conn;

    public function __construct()
    {
        if (!$this->conn){
            $this->connect();
        }
    }
    public function __destruct()
    {
        if ($this->conn){
            $this->disconnect();
        }
    }

    public function connect(){
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    public function disconnect(){
        $this->conn = NULL;
    }
}