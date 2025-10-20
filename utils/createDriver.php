<?php

require_once __DIR__."/vendor/autoload.php";

use App\Classes\Driver;

if(!isset($_GET["driverName"])) {
    header("Location: ./../private.php?page=drivers");
}

$driverName = $_GET["driverName"];
$driverLevel = $_GET["driverLevel"];
$driverNumber = $_GET["driverNumber"];
$driverColor = $_GET["driverColor"];
$driverCountry = $_GET["driverCountry"];

$driver = new Driver($driverName, $driverLevel, $driverNumber, $driverColor, $driverIdCountry);
$driver->createDriver();

header("Location: ./../private.php?page=drivers");

?>