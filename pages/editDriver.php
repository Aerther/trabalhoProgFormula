<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Classes\Country;
use App\Classes\Driver;

$errorText = "";

if(isset($_POST["btn-submit"])) {
    $driverName = $_POST["driverName"];
    $driverLevel = $_POST["driverLevel"];
    $driverNumber = $_POST["driverNumber"];
    $driverColor = $_POST["driverColor"];
    $driverCountry = $_POST["driverCountry"];

    $driverId = $_POST["driverId"];

    $driver = new Driver($driverName, (int) $driverNumber, (int) $driverLevel, $driverColor, (int) $driverCountry);
    $driver->setIdDriver($driverId);

    if(!$driver->driverExists()) {
        $driver->updateDriver();

        header("Location: ./../private.php?page=drivers");
    }

    $errorText = "Você já possui um piloto com este nome (que não é esse sendo editado)";
}

$driver = Driver::findDriver($_GET["idDriver"]);

$countries = Country::findAllCountries();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./../src/styles/reset.css">
    <link rel="stylesheet" href="./../src/styles/global.css">

    <title>Editar Piloto</title>

    <style>
        #container {
            height: 610px;
            width: 550px;
        }

        form {
            grid-template-rows: repeat(6, 1fr) 30px;
        }

        .country-input {

        }

        .country-input select {
            width: 250px;
            height: 40px;

            padding-left: 10px;

            background-color: #f2f2f2;

            border: 1px solid black;
            color: black;
            border-radius: 10px;

            font-size: 22px;

            font-family: "Lato", sans-serif;
            font-weight: 400;
        }

        .color-input input {
            width: 80px;
            height: 50px;

            padding: 0;

            border: 3px solid #f2f2f2;

            background: none;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

            cursor: pointer;
        }

        .number-input, .country-input, .color-input {
            column-gap: 30px;

            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
        }

        .number-input section input {
            width: 150px;
        }

        .show-flag div {
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .show-flag div img {
            position: relative;

            bottom: -16px;
        }

        option {
            font-size: 18px;

            color: black;

            font-family: "Lato", sans-serif;
            font-weight: 400;
        }

    </style>
</head>
<body>
    <div id="container">
        <form action="./editDriver.php" method="post">
            <section>
                <?php echo "<h2>Editando: {$driver->getDriverName()}</h2>"; ?>
            </section>

            <section>
                <label for="driverName">Nome</label>
                <?php echo "<input type='text' name='driverName' id='driverName' required value={$driver->getDriverName()}>"; ?>
            </section>

            <section class="number-input">
                <section>
                    <label for="driverLevel">Level</label>
                    <?php echo "<input type='number' name='driverLevel' id='driverLevel' min='0' max='100' required value={$driver->getDriverLevel()}>"; ?>
                </section>

                <section>
                    <label for="driverNumber">Número</label>
                    <?php echo "<input type='number' name='driverNumber' id='driverNumber' required value={$driver->getDriverNumber()}>"; ?>
                </section>
            </section>
            
            <section class="color-input">
                <label for="driverColor">Cor do Piloto</label>
                <?php echo " <input type='color' name='driverColor' id='driverColor' required value={$driver->getDriverColor()}>"; ?>
            </section>

            <section class="country-input">
                <section>
                    <label for="driverCountry">País</label>
                    <select name="driverCountry" id="driverCountry" required>
                        <option value="" disabled>Selecione um país</option>
                        
                        <?php
                        
                        foreach($countries as $country) {
                            if($country->getCountryName() == $driver->getDriverCountry()) {
                                echo "<option value={$country->getIdCountry()} class='country' data-flag='{$country->getLinkFlag()}' selected>{$country->getCountryName()}</option>";
                            } else {
                                echo "<option value={$country->getIdCountry()} class='country' data-flag='{$country->getLinkFlag()}'>{$country->getCountryName()}</option>";
                            }
                        }

                        ?>
                    </select>
                </section>

                <section class="show-flag">
                    <div>
                        <img src="" alt="">
                    </div>
                </section>
            </section>
            
            <?php echo "<input name='driverId' value={$driver->getIdDriver()} type='hidden'>"; ?>

            <section class="links">
                <a href="./../private.php?page=drivers">Cancelar</a>
                <input type="submit" value="Editar Piloto" name="btn-submit" class="send-btn">
            </section>

            <section class="error">
                <p> <?php echo $errorText ?> </p>
            </section>
        </form>
    </div>

    <script defer>
        let select = document.getElementById('driverCountry');
        let imageFlag = document.querySelector(".show-flag div img");

        document.addEventListener("DOMContentLoaded", () => {
            optionSelected = select.options[select.selectedIndex];
            linkFlag = optionSelected.getAttribute('data-flag');

            imageFlag.src = linkFlag;
            imageFlag.alt = "Flag " + optionSelected.textContent;
        });

        select.addEventListener("change", function(e) {
            optionSelected = this.options[this.selectedIndex];
            linkFlag = optionSelected.getAttribute('data-flag');

            imageFlag.src = linkFlag;
            imageFlag.alt = "Flag " + optionSelected.textContent;
        });
    </script>
</body>
</html>