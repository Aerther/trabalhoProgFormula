<?php

use App\Classes\Driver;

$nameParam = isset($_GET["driverName"]) ? $_GET["driverName"] : "";

$drivers = Driver::findAllSharedDrivers($nameParam);

?>

<div id="home-drivers">
    <div class="drivers-create">
        <a href="./pages/addDriver.php">Create Driver</a>
    </div>

    <div class="drivers">
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

            echo "<div class='actions'>";
            echo "<a href='./utils/downloadDriver.php?idDriver={$driver->getIdDriver()}' class='delete'>Download</a>";
            echo "</div>";

            echo "</div>";
        }

        ?>
    </div>
</div>