<?php

use App\Classes\Driver;

$drivers = Driver::findAllDrivers();

?>

<div id="home-race">
    <div class='data-drivers'>
        <div class='table'>
            <div class='table-header'>
                <p>Nome</p>
                <p>Número</p>
                <p>Level</p>
                <p>Cor</p>
                <p>País</p>
            </div>
            <?php 
            
            foreach($drivers as $driver) {
                echo "<div class='show-driver'>";

                echo "<p>{$driver->getDriverName()}</p>";
                echo "<p>{$driver->getDriverNumber()}</p>";
                echo "<p>{$driver->getDriverLevel()}</p>";
                echo "<p>{$driver->getDriverColor()}</p>";
                echo "<p>{$driver->getDriverCountry()}</p>";

                echo "</div>";
            }

            ?>
        </div>
    </div>

    <div class='data-add-drivers'>

    </div>

    <div class='data-track'>

    </div>
</div>