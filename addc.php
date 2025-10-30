<?php

// Utilizado para adicionar os países dentro do banco

header("Location: index.php");
exit;

require_once __DIR__."/vendor/autoload.php";

use App\Classes\Country;

$json = file_get_contents("https://restcountries.com/v3.1/all?fields=translations,cca2");
$dados = json_decode($json, true);

foreach ($dados as $item) {
    $nameC = $item['translations']['por']['common'];
    $code = $item["cca2"];

    if ($nameC) {
        $country = new Country($nameC, "https://flagsapi.com/{$code}/flat/64.png");

        if(!$country->countryExists()) {
            $country->createCountry();
        }
    }
}

header("Location: index.php");

?>