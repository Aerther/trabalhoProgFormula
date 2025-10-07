<?php

use App\Classes\Driver;

$drivers = Driver::findAllDrivers();

?>

<div>
    <?php

    foreach($drivers as $driver) {
        echo "<h1>Nome: {$driver->getDriverName()}, Level: {$driver->getDriverLevel()}, Número: {$driver->getDriverNumber()} Cor: {$driver->getDriverColor()}</h1>";
    }

    ?>
</div>