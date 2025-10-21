<?php

namespace App\Classes;

use App\Database\MySQL;

class Driver {

    private int $idDriver;
    private string $driverName;
    private int $driverNumber;
    private int $driverLevel;
    private string $driverColor;
    private int $driverIdCountry;
    private string $driverFlag;
    private string $driverCountryName;

    public function __construct(string $driverName, int $driverNumber, int $driverLevel, string $driverColor, int $driverIdCountry) {
        $this->driverName = $driverName;
        $this->driverNumber = $driverNumber;
        $this->driverLevel = $driverLevel;
        $this->driverColor = $driverColor;
        $this->driverIdCountry = $driverIdCountry;
    }
    
    public static function findDriver(int $idDriver) : Driver {
        $connection = new MySql();

        session_start();

        $types = "ii";
        $params = [$_SESSION["idUser"], $idDriver];
        $sql = "SELECT FROM driver d WHERE d.idUser = ? AND d.idDriver = ?";

        $result = $connection->search($sql, $types, $params)[0];

        // Have to change it here in the future, maybe
        $driver = new Driver($result["fullName"], $result["number"], $result["level"], $result["color"]);
        $driver->setIdDriver($idDriver);

        return $driver;
    }

    public static function findAllDrivers(string $driverName) : array {
        $connection = new MySql();

        $drivers = [];

        $types = "is";
        $params = [$_SESSION["idUser"], "%{$driverName}%"];
        $sql = "SELECT d.*, c.* FROM driver d JOIN country c ON c.idCountry = d.idCountry WHERE d.idUser = ? AND d.fullName LIKE ?";

        $results = $connection->search($sql, $types, $params);

        foreach($results as $result) {
            $driver = new Driver($result['fullName'], $result["number"], $result["level"], $result["color"], $result["idCountry"]);

            $driver->setIdDriver($result['idDriver']);
            $driver->setDriverFlag($result["linkFlag"]);
            $driver->setDriverCountry($result["name"]);

            $drivers[] = $driver;
        }

        return $drivers;
    }

    public function updateDriver() : void {
        // Add later
    }

    public function createDriver() : void {
        $connection = new MySQL();

        session_start();

        $types = "ssisii";
        $params = [$this->driverName, $this->driverColor, $this->driverNumber, $this->driverLevel, $_SESSION["idUser"], $this->driverIdCountry];
        $sql = "INSERT INTO driver (fullName, color, number, level, idUser, idCountry) VALUES (?, ?, ?, ?, ?, ?)";

        $connection->execute($sql, $types, $params);
    }

    // Getters e Setters

    public function getIdDriver() : int {
        return $this->idDriver;
    }

    public function setIdDriver(int $idDriver) : void {
        $this->idDriver = $idDriver;
    }

    public function getDriverName() : string {
        return $this->driverName;
    }

    public function setDriverName($driverName) : void {
        $this->driverName = $driverName;
    }

    public function getDriverNumber() : int {
        return $this->driverNumber;
    }

    public function setDriverNumber($driverNumber) : void {
        $this->driverNumber = $driverNumber;
    }

    public function getDriverLevel() : int {
        return $this->driverLevel;
    }

    public function setDriverLevel($driverLevel) : void {
        $this->driverLevel = $driverLevel;
    }

    public function getDriverColor() : string {
        return $this->driverColor;
    }

    public function setDriverColor($driverColor) : void {
        $this->driverColor = $driverColor;
    }

    public function getDriverCountry() : string {
        return $this->driverCountryName;
    }

    public function setDriverCountry($driverCountryName) : void {
        $this->driverCountryName = $driverCountryName;
    }

    public function getDriverFlag() : string {
        return $this->driverFlag;
    }

    public function setDriverFlag($driverFlag) : void {
        $this->driverFlag = $driverFlag;
    }

    
}

?>