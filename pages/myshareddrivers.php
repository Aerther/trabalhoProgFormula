<?php

use App\Classes\Driver;

$nameParam = isset($_GET["driverName"]) ? $_GET["driverName"] : "";

$drivers = Driver::findAllMySharedDrivers($nameParam);

?>

<div id="home-drivers">
    <style>
            #home-drivers {
                grid-template-rows: 100%;

                padding-top: 50px;
            }
    </style>
    <div class="drivers">
        <?php

        foreach ($drivers as $driver) {
            echo "<div class='driver' id='{$driver->getIdDriver()}'>";

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

            $shareAction = $driver->isDriverActive() ? 0 : 1;
            $shareText = $driver->isDriverActive() ? "Descompartilhar" : "Compartilhar";

            echo "<div class='actions'>";
            echo "<a class='like-a good inactive-a'> <figure class='like'> <img src='./src/images/like.png' alt='Like' />  </figure> <p>{$driver->getLikes()}</p> </a>";
            echo "<a class='like-a bad inactive-a'> <figure class='like'> <img src='./src/images/like.png' alt='Like' />  </figure> <p>{$driver->getDislikes()}</p> </a>";
            echo "<a href='./utils/shareDriver.php?idDriver={$driver->getIdDriver()}&action={$shareAction}' class='share'>{$shareText}</a>";
            echo "</div>";

            echo "</div>";
        }

        ?>
    </div>
</div>