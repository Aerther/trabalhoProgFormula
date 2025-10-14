<?php

use App\Classes\Driver;

$nameParam = isset($_GET["driverName"]) ? $_GET["driverName"] : "";

$drivers = Driver::findAllDrivers($nameParam);

?>

<div id="home-drivers">
    <div class="drivers-get">
        <a href="">Create Driver</a>
    </div>

    <div class="drivers">
        <div class="driver">
            <h1>Nome</h1>
            <p>Level</p>
            <p>Número</p>
            <p>Cor</p>
            <p>Country</p>
        </div>

        <div class="driver">
            <h1>Nome</h1>
            <p>Level</p>
            <p>Número</p>
            <p>Cor</p>
            <p>Country</p>
        </div>

        <div class="driver">
            <h1>Nome</h1>
            <p>Level</p>
            <p>Número</p>
            <p>Cor</p>
            <p>Country</p>
        </div>

        <div class="driver">
            <h1>Nome</h1>
            <p>Level</p>
            <p>Número</p>
            <p>Cor</p>
            <p>Country</p>
        </div>
    </div>
</div>