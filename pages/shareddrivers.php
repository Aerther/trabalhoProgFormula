<?php

use App\Classes\Driver;

$nameParam = isset($_GET["driverName"]) ? $_GET["driverName"] : "";

$drivers = Driver::findAllSharedDrivers($nameParam);

?>

<div id="home-drivers">
    <style>
            #home-drivers {
                grid-template-rows: 100%;

                padding-top: 50px;
            }

            .driver {
                height: 330px;
                grid-template-rows: 1fr 0.7fr 1fr 1fr 1fr;
            }
    </style>
    <div class="drivers">
        <?php

        foreach ($drivers as $driver) {
            echo "<div class='driver'>";

            echo "<div class='name'>";
            echo "<h2>{$driver->getDriverName()}</h2>";
            echo "</div>";

            echo "<div class='div-flag'>";
            echo "<figure class='flag'>";
            echo "<img src='{$driver->getDriverFlag()}' alt='Flag {$driver->getDriverCountry()}'>";
            echo "</figure>";
            echo "</div>";

            echo "<div class='number'>";
            echo "<p>Número: {$driver->getDriverNumber()}</p>";
            echo "</div>";

            echo "<div class='level'>";
            echo "<p>Level: {$driver->getDriverLevel()}</p>";
            echo "</div>";

            echo "<div class='country'>";
            echo "<p>País: {$driver->getDriverCountry()}</p>";
            echo "</div>";

            echo "<div class='color'>";
            echo "<p>Cor: {$driver->getDriverColor()}</p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='dateShared'>Compartilhado em: </p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='dateShared'>{$driver->getDriverDateShared()}</p>";
            echo "</div>";

            echo "<div class='actions'>";
            echo "<a href='./utils/downloadDriver.php?idDriver={$driver->getIdDriver()}' class='download'>Download</a>";
            echo "</div>";

            echo "</div>";
        }

        ?>
    </div>
</div>