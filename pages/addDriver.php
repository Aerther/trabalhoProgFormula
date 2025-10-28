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

    $driver = new Driver($driverName, (int) $driverNumber, (int) $driverLevel, $driverColor, (int) $driverCountry);

    if(!$driver->driverExists()) {
        $driver->createDriver();

        header("Location: ./../private.php?page=drivers");
    }

    $errorText = "Você já possui um piloto com este nome";
}

$countries = Country::findAllCountries();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./../src/styles/reset.css">
    <link rel="stylesheet" href="./../src/styles/global.css">

    <title>Criar Piloto</title>

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
        <form action="./addDriver.php" method="post">
            <section>
                <h2>Criar Piloto</h2>
            </section>

            <section>
                <label for="driverName">Nome</label>
                <input type="text" name="driverName" id="driverName" required>
            </section>

            <section class="number-input">
                <section>
                    <label for="driverLevel">Level</label>
                    <input type="number" name="driverLevel" id="driverLevel" min="0" max="100" required>
                </section>

                <section>
                    <label for="driverNumber">Número</label>
                    <input type="number" name="driverNumber" id="driverNumber" required>
                </section>
            </section>
            
            <section class="color-input">
                <label for="driverColor">Cor do Piloto</label>
                <input type="color" name="driverColor" id="driverColor" value="#a020f0" required>
            </section>

            <section class="country-input">
                <section>
                    <label for="driverCountry">País</label>
                    <select name="driverCountry" id="driverCountry" required>
                        <option value="" disabled selected>Selecione um país</option>
                    
                        <?php
                        
                        foreach($countries as $country) {
                            echo "<option value={$country->getIdCountry()} class='country' data-flag='{$country->getLinkFlag()}'>{$country->getCountryName()}</option>";
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

            <section class="links">
                <a href="./../private.php?page=drivers">Cancelar</a>
                <input type="submit" value="Criar Piloto" name="btn-submit" class="send-btn">
            </section>

            <section class="error">
                <p> <?php echo $errorText ?> </p>
            </section>
        </form>
    </div>

    <script>
        let select = document.getElementById('driverCountry');
        let imageFlag = document.querySelector(".show-flag div img");
        
        document.addEventListener("DOMContentLoaded", () => {
            optionSelected = select.options[31];
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