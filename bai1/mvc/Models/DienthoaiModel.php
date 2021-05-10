<?php
class DienthoaiModel extends database
{
    public function takeData($keyword = "")
    {
        echo "<br>" . __METHOD__;
        $sql_takeData ="SELECT * FROM dienthoai LEFT JOIN hang_dienthoai ON dienthoai.ma_hang = hang_dienthoai.ma_hang";

        if($keyword != ""){
            $sql_takeData .= " WHERE dienthoai.ten_dienthoai LIKE '%$keyword%'";
        }

        $stmt = $this->connection->prepare($sql_takeData);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $data=$stmt->fetchAll();

        return $data;
    }

    public function deleteData($id)
    {
        $sql_deleteData = "DELETE FROM dienthoai WHERE ma_dienthoai=$id";
        return $this->connection->exec($sql_deleteData);
    }
}