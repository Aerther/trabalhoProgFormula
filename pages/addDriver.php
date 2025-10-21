<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Classes\Country;

$countries = Country::findAllCountries();

?>

<div>
    <form action="./../utils/createDriver.php" method="post">
        <section>
                <label for="driverName">Nome</label>
                <input type="text" name="driverName" id="driverName">
            </section>

            <section>
                <label for="driverLevel">Level</label>
                <input type="number" name="driverLevel" id="driverLevel" min="0" max="100">
            </section>

            <section>
                <label for="driverNumber">Número</label>
                <input type="number" name="driverNumber" id="driverNumber">
            </section>
            
            <section>
                <label for="driverColor">Cor do Piloto</label>
                <input type="color" name="driverColor" id="driverColor" value="#ff0000">
            </section>

            <select name="driverCountry" id="driverCountry">
                <option value="" disabled selected>Selecione um país</option>
            
                <?php
                
                foreach($countries as $country) {
                    echo "<option value={$country->getIdCountry()} class='country'>{$country->getCountryName()}</option>";
                }

                ?>
            </select>

            <section>
                <input type="submit" value="Criar Piloto" name="btn-submit">
            </section>

    </form>
</div>