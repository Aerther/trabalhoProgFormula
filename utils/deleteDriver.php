<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Classes\Driver;

session_start();

if(!isset($_SESSION["idUser"])) {
    header("Location: ./../index.php");
}

if(!isset($_GET["idDriver"])) {
    header("Location: ./../private.php?page=drivers");
}

$driver = Driver::findDriver($_GET["idDriver"]);
$driver->deleteDriver();

header("Location: ./../private.php?page=drivers");

?>