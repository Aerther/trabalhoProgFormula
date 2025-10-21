<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Classes\Driver;

if(!isset($_POST["btn-submit"])) {
    header("Location: ./../private.php?page=drivers");
}

$driverName = $_POST["driverName"];
$driverLevel = $_POST["driverLevel"];
$driverNumber = $_POST["driverNumber"];
$driverColor = $_POST["driverColor"];
$driverCountry = $_POST["driverCountry"];

$driver = new Driver($driverName, (int) $driverNumberm, (int) $driverLevel, $driverColor, (int) $driverCountry);
$driver->createDriver();

header("Location: ./../private.php?page=drivers");

?>