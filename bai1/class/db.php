<?php
class database
{
    private $servername ="localhost";
    private $username ="root";
    private $password ="";
    private $dbname ="dienthoai";
    protected $connection;

    //Hàm tự dộng kết nối tới CSDL khi cần
    public function __construct()
    {
        echo "<br>" . __METHOD__;
        if(! $this->connection)
        {
            $this->connect();
        }
    }

    //Hàm tự dộng hủy kết nối tới CSDL không dùng đến
    public function __destruct()
    {
        echo "<br>" . __METHOD__;
        if($this->connection)
        {
            $this->disconnect();
        }
    }

    //Hàm kết nối
    public function connect()
    {
        $this->connection = new PDO("mysql:host =$this->servername;dbname=$this->dbname",$this->username,$this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    //Hàm hủy kết nối
    public function disconnect()
    {
        $this->connection = NULL;
    }




}