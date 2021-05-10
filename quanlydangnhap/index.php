<?php
session_start();
include_once "connection.php";
include_once "Models/AuthModel.php";
include_once "Controllers/AuthController.php";
include_once "route.php";
$main = new Route();
$main->run();