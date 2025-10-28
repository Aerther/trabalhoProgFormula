<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Classes\Driver;

session_start();

if(!isset($_SESSION["idUser"])) {
    header("Location: ./../index.php");
}

if(!isset($_GET["idDriver"]) || !isset($_GET["action"])) {
    header("Location: ./../private.php?page=driversshared");
}

$actionParam = (int) $_GET["action"];

if($actionParam != 1 && $actionParam != -1) {
    header("Location: ./../private.php?page=shareddrivers#{$_GET['idDriver']}");
}

$driver = Driver::findDriver($_GET["idDriver"]);
$driver->likeDriver($actionParam);

header("Location: ./../private.php?page=shareddrivers#{$_GET['idDriver']}");

?>