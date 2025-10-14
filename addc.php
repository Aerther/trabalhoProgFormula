<?php

require_once __DIR__."/vendor/autoload.php";

use App\Classes\Country;

$json = file_get_contents("https://restcountries.com/v3.1/all?fields=translations");
$dados = json_decode($json, true);

foreach ($dados as $item) {
    $nameC = $item['translations']['por']['common'];
    if ($nameC) {
        $country = new Country($nameC);
        $country->saveCountry();
    }
}

header("Location: index.php");

?>