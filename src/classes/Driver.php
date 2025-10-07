<?php

namespace App\Classes;

use App\Database\MySQL;

class Driver {

    private int $idDriver;
    private string $driverName;
    private int $driverNumber;
    private int $driverLevel;
    private string $driverColor;

    public function __construct(string $driverName, string $driverNumber, string $driverLevel, string $driverColor) {
        $this->driverName = $driverName;
        $this->driverNumber = $driverNumber;
        $this->driverLevel = $driverLevel;
        $this->driverColor = $driverColor;
    }
    
    public static function findDriver(int $idDriver) : Driver {
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

    public function setIdDriver(int $idDriver) : void {
        $this->idDriver = $idDriver;
    }

    // Getters e Setters

}

?>