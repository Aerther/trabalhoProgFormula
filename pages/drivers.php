<?php

use App\Classes\Driver;

$nameParam = isset($_GET["driverName"]) ? $_GET["driverName"] : "";

$drivers = Driver::findAllDrivers($nameParam);

?>

<div id="home-drivers">
    <div class="drivers-create">
        <a href="./pages/addDriver.php">Criar Piloto</a>
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

            echo "<div>";
            echo "<p class='dateShared'>Criado em: </p>";
            echo "</div>";

            echo "<div>";
            echo "<p class='dateShared'>{$driver->getDriverDateCreated()}</p>";
            echo "</div>";

            $shareAction = $driver->isDriverActive() ? 0 : 1;
            $shareText = $driver->isDriverActive() ? "Descompartilhar" : "Compartilhar";
            $shareClass = $driver->isDriverActive() ? "unshare" : "share";

            echo "<div class='actions'>";
            echo "<a href='./pages/editDriver.php?idDriver={$driver->getIdDriver()}' class='edit'>Editar</a>";
            echo "<a href='./utils/shareDriver.php?idDriver={$driver->getIdDriver()}&action={$shareAction}' class={$shareClass}>{$shareText}</a>";
            echo "<a href='./utils/deleteDriver.php?idDriver={$driver->getIdDriver()}' class='delete'>Excluir</a>";
            echo "</div>";

            echo "</div>";
        }

        ?>
    </div>
</div>