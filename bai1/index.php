<?php
session_start();
include_once "class/db.php";
include_once "mvc/Models/DienthoaiModel.php";
include_once "mvc/Controllers/DienthoaiController.php";

$className= ucfirst(isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "Dienthoai") . "Controller";
echo $className;

$Name= isset($_REQUEST["action"]) ? $_REQUEST["action"] : "index";
echo $Name;

$main = new $className;
$main-> $Name();