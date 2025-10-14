<?php

namespace App\Classes;

use App\Database\MySQL;

class Country {

    private int $idCountry;
    private string $countryName;

    public function __construct(string $countryName) {
        $this->countryName = $countryName;
    }

    public function saveCountry() : void {
        $connection = new MySql();

        $types = "s";
        $params = [$this->countryName];
        $sql = "INSERT INTO country (name) VALUES (?)";

        $connection->execute($sql, $types, $params);
    }

    public function setIdCountry(int $idCountry) : void {
        $this->idCountry = $idCountry;
    }

    // Getters e Setters

}

?>