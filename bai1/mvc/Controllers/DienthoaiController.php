<?php
class DienthoaiController
{
    public function index()
    {
        echo "<br>".__METHOD__;
        $model = new DienthoaiModel();

        $keyword ="";
        if(isset($_GET["keyword"]) && $_GET["keyword"]>0){
            $keyword =$_GET["keyword"];
        }
        $getDienthoai=$model->takeData($keyword);

        include_once "mvc/Views/Dienthoai/index.php";
    }

    public function delete()
    {
        echo "<br>".__METHOD__;
        $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
        if($id > 0){
            $model = new DienthoaiModel();
            $deleteDienthoai = $model->deleteData($id);
            $_SESSION["action"] = "delete";

            header("location: index.php?controller=Dienthoai&action=index");
            exit();
        }
    }
}