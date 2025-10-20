<?php

namespace App\Classes;

use App\Database\MySQL;

class Country {

    private int $idCountry;
    private string $countryName;

    public function __construct(string $countryName) {
        $this->countryName = $countryName;
    }

    public function createCountry() : void {
        $connection = new MySql();

        $types = "s";
        $params = [$this->countryName];
        $sql = "INSERT INTO country (name) VALUES (?)";

        $connection->execute($sql, $types, $params);
    }

    public static function findAllCountries() : array {
        $connection = new MySql();

        $countries = [];

        $types = "";
        $params = [];
        $sql = "SELECT * FROM country c ORDER BY c.name";

        $results = $connection->search($sql, $types, $params);

        foreach($results as $result) {
            $country = new Country($result['name']);

            $country->setIdCountry($result['idCountry']);

            $countries[] = $country;
        }

        return $countries;
    }

    // Getters e Setters

    // ID Country
    public function setIdCountry(int $idCountry) : void {
        $this->idCountry = $idCountry;
    }

    public function getIdCountry() : int {
        return $this->idCountry;
    }

    // Country Name
    public function getCountryName() : string {
        return $this->countryName;
    }
}

?>