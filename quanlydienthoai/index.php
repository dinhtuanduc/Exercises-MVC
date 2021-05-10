<?php
session_start();
include_once "connection.php";
include_once  "Models/ProductModel.php";
include_once  "Controllers/ProductController.php";
include_once "routes.php";
$main = new Route();
$main->run();
