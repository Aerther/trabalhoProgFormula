<?php

namespace App\Classes;

use App\Database\MySQL;

class Country {

    private int $idCountry;
    private string $countryName;

    public function __construct(string $countryName) {
        $this->countryName = $countryName;
    }
    
    public static function findDriver(int $idCountry) : Driver {
        $connection = new MySql();

        session_start();

        $types = "ii";
        $params = [$_SESSION["idUser"], $idDriver];
        $sql = "SELECT FROM driver d WHERE d.idUser = ? AND d.idDriver = ?";

        $result = $connection->search($sql, $types, $params);

        // Have to change it here in the future, maybe
        $driver = new Driver($result["fullName"], $result["number"], $result["level"], $result["color"]);
        $driver->setIdDriver($idDriver);

        return $driver;
    }

    public function updateDriver() : void {
        // Add later
    }

    public function saveDriver() : void {
        // Add later
    }

    public function setIdDriver(int $idCountry) : void {
        $this->idCountry = $idCountry;
    }

    // Getters e Setters

}

?>