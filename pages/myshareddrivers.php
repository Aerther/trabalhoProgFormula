<?php

use App\Classes\Driver;

$nameParam = isset($_GET["driverName"]) ? $_GET["driverName"] : "";

$drivers = Driver::findAllMySharedDrivers($nameParam);

?>

<div id="home-drivers">
    <div class="drivers-create">
        <a href="./pages/addDriver.php">Create Driver</a>
    </div>

    <div class="drivers">
        <style>
            .driver {
                height: 330px;
                grid-template-rows: 1fr 0.7fr 1fr 1fr 1fr;
            }
        </style>
        <?php

        foreach ($drivers as $driver) {
            echo "<div class='driver'>";

            echo "<div>";
            echo "<h2 class='name'>{$driver->getDriverName()}</h2>";
            echo "</div>";

            echo "<div class='div-flag'>";
            echo "<figure class='flag'>";
            echo "<img src='{$driver->getDriverFlag()}' alt='Flag {$driver->getDriverCountry()}'>";
            echo "</figure>";
            echo "</div>";

            echo "<div>";
            echo "<p class='number'>Número: {$driver->getDriverNumber()}</p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='level'>Level: {$driver->getDriverLevel()}</p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='country'>País: {$driver->getDriverCountry()}</p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='color'>Cor: {$driver->getDriverColor()}</p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='dateShared'>Data: {$driver->getDriverDateShared()}</p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='author'>Criado por: {$driver->getDriverAuthor()}</p>";
            echo "</div>";

            $shareAction = $driver->isDriverActive() ? 0 : 1;
            $shareText = $driver->isDriverActive() ? "Descompartilhar" : "Compartilhar";

            echo "<div class='actions'>";
            echo "<a href='./utils/shareDriver.php?idDriver={$driver->getIdDriver()}&action={$shareAction}' class='share'>{$shareText}</a>";
            echo "</div>";

            echo "</div>";
        }

        ?>
    </div>
</div>