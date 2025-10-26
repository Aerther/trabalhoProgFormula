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

    private string $driverDateShared;
    private bool $driverActive;

    public function __construct(string $driverName, int $driverNumber, int $driverLevel, string $driverColor, int $driverIdCountry) {
        $this->driverName = $driverName;
        $this->driverNumber = $driverNumber;
        $this->driverLevel = $driverLevel;
        $this->driverColor = $driverColor;
        $this->driverIdCountry = $driverIdCountry;
    }
    
    public function copyDriver() {
        $connection = new MySql();

        if(session_status() != 2 ) session_start();

        $types = "isisii";
        $params = [$this->driverNumber, $this->driverName, $this->driverLevel, $this->driverColor, $_SESSION["idUser"], $this->driverIdCountry];
        $sql = "INSERT INTO driver(number, fullName, level, color, idUser, idCountry) VALUES (?, ?, ?, ?, ?, ?)";

        $connection->execute($sql, $types, $params);
    }

    public static function findDriver(int $idDriver) : Driver {
        $connection = new MySql();

        session_start();

        $types = "i";
        $params = [$idDriver];
        $sql = "SELECT d.*, c.* FROM driver d JOIN country c ON c.idCountry = d.idCountry WHERE d.idDriver = ?";

        $result = $connection->search($sql, $types, $params)[0];

        $driver = new Driver($result["fullName"], $result["number"], $result["level"], $result["color"], $result["idCountry"]);
        $driver->setIdDriver($idDriver);
        $driver->setDriverFlag($result["linkFlag"]);
        $driver->setDriverCountry($result["name"]);
        $driver->setDriverActive(boolval($result["isActive"]));

        return $driver;
    }

    public static function findAllDrivers(string $driverName) : array {
        $connection = new MySql();

        $drivers = [];

        $types = "is";
        $params = [$_SESSION["idUser"], "%{$driverName}%"];
        $sql = "SELECT d.*, c.* FROM driver d 
        JOIN country c ON c.idCountry = d.idCountry WHERE d.idUser = ? AND d.fullName LIKE ? ORDER BY d.isActive";

        $results = $connection->search($sql, $types, $params);

        foreach($results as $result) {
            $driver = new Driver($result['fullName'], $result["number"], $result["level"], $result["color"], $result["idCountry"]);

            $driver->setIdDriver($result['idDriver']);
            $driver->setDriverFlag($result["linkFlag"]);
            $driver->setDriverCountry($result["name"]);
            $driver->setDriverActive(boolval($result["isActive"]));

            $drivers[] = $driver;
        }

        return $drivers;
    }

    public function updateDriver() : void {
        $connection = new MySql();

        $types = "isisii";
        $params = [$this->driverNumber, $this->driverName, $this->driverLevel, $this->driverColor, $this->driverIdCountry, $this->idDriver, ];
        $sql = "UPDATE driver SET number = ?, fullName = ?, level = ?, color = ?, idCountry = ? WHERE idDriver = ?";

        $connection->execute($sql, $types, $params);
    }

    public function createDriver() : void {
        $connection = new MySQL();

        session_start();

        $types = "ssisii";
        $params = [$this->driverName, $this->driverColor, $this->driverNumber, $this->driverLevel, $_SESSION["idUser"], $this->driverIdCountry];
        $sql = "INSERT INTO driver (fullName, color, number, level, idUser, idCountry) VALUES (?, ?, ?, ?, ?, ?)";

        $connection->execute($sql, $types, $params);
    }

    public function driverExists() : bool {
        $connection = new MySql();

        session_start();

        $types = "si";
        $params = [$this->driverName, $_SESSION["idUser"]];
        $sql = "SELECT 1 FROM driver d WHERE d.fullName = ? AND d.idUser = ?";

        if(!empty($this->idDriver)) {
            $types = "sii";
            $params = [$this->driverName, $_SESSION["idUser"], $this->idDriver];
            $sql = "SELECT 1 FROM driver d WHERE d.fullName = ? AND d.idUser = ? AND d.idDriver != ?";
        }

        $results = $connection->search($sql, $types, $params);

        return !empty($results);
    }

    public static function findSharedDriver(int $idDriver) : Driver {
        $connection = new MySql();

        $types = "i";
        $params = [$idSharedDriver];
        $sql = "SELECT * FROM driver d WHERE d.idDriver = ? AND d.isActive = 1";

        $results = $connection->search($sql, $types, $params);

        $driver = new Driver($result["fullName"], $result["number"], $result["level"], $result["color"], $result["idCountry"]);
        $driver->setIdDriver($idDriver);
        $driver->setDriverDateShared($result["dateShared"]);

        return $driver;
    }

    public static function findAllSharedDrivers(string $driverName) : array {
        $connection = new MySql();

        $drivers = [];

        if(session_status() != 2) session_start();

        $types = "si";
        $params = ["%{$driverName}%", $_SESSION["idUser"]];
        $sql = "SELECT d.*, c.* FROM driver d JOIN country c ON c.idCountry = d.idCountry WHERE d.fullName LIKE ? AND d.isActive = 1 AND d.idUser != ?";

        $results = $connection->search($sql, $types, $params);

        foreach($results as $result) {
            $driver = new Driver($result['fullName'], $result["number"], $result["level"], $result["color"], $result["idCountry"]);

            $driver->setIdDriver($result['idDriver']);
            $driver->setDriverFlag($result["linkFlag"]);
            $driver->setDriverCountry($result["name"]);
            $driver->setDriverDateShared($result["dateShared"]);
            $driver->setDriverActive(boolval($result["isActive"]));

            $drivers[] = $driver;
        }

        return $drivers;
    }

    public static function findAllMySharedDrivers(string $driverName) : array {
        $connection = new MySql();

        $drivers = [];

        if(session_status() != 2) session_start();

        $types = "si";
        $params = ["%{$driverName}%", $_SESSION["idUser"]];
        $sql = "SELECT d.*, c.* FROM driver d JOIN country c ON c.idCountry = d.idCountry WHERE d.fullName LIKE ? AND d.isActive = 1 AND d.idUser = ?";

        $results = $connection->search($sql, $types, $params);

        foreach($results as $result) {
            $driver = new Driver($result['fullName'], $result["number"], $result["level"], $result["color"], $result["idCountry"]);

            $driver->setIdDriver($result['idDriver']);
            $driver->setDriverFlag($result["linkFlag"]);
            $driver->setDriverCountry($result["name"]);
            $driver->setDriverDateShared($result["dateShared"]);
            $driver->setDriverActive(boolval($result["isActive"]));

            $drivers[] = $driver;
        }

        return $drivers;
    }



    public function shareDriver($action) : void {
        $connection = new MySql();

        session_start();

        $types = "ii";
        $params = [$this->idDriver, $_SESSION["idUser"]];
        $sql = "UPDATE driver SET isActive = {$action}, dateShared = NOW() WHERE idDriver = ? AND idUser = ?";

        $connection->execute($sql, $types, $params);
    }

    public function deleteDriver() : void {
        $connection = new MySql();

        $types = "i";
        $params = [$this->idDriver];
        $sql = "DELETE FROM driver WHERE idDriver = ?";

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

    public function getDriverIdCountry() : int {
        return $this->driverIdCountry;
    }

    public function setDriverIdCountry($driverIdCountry) : void {
        $this->driverIdCountry = $driverIdCountry;
    }

    public function getDriverFlag() : string {
        return $this->driverFlag;
    }

    public function setDriverFlag($driverFlag) : void {
        $this->driverFlag = $driverFlag;
    }

    public function getDriverDateShared() : string {
        return $this->driverDateShared;
    }

    public function setDriverDateShared($driverDateShared) : void {
        $this->driverDateShared = $driverDateShared;
    }

    public function isDriverActive() : bool {
        return $this->driverActive;
    }

    public function setDriverActive($driverActive) : void {
        $this->driverActive = $driverActive;
    }

    public function getDriverAuthor() : string {
        return "Violeta";
    }
}

?>