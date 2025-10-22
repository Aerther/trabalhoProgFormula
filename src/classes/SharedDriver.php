<?php

namespace App\Classes;

use App\Database\MySQL;

class SharedDriver {

    private int $idSharedDriver;
    private int $idDriver;
    private string $dateShared;

    public function __construct(int $idDriver) {
        $this->idDriver = $idDriver;
    }
    
    public static function findSharedDriver(int $idSharedDriver) : SharedDriver {
        $connection = new MySql();

        $types = "i";
        $params = [$idSharedDriver];
        $sql = "SELECT FROM shareddriver sd WHERE sd.idSharedDriver = ? AND sd.isActive = 1";

        $result = $connection->search($sql, $types, $params);

        // Have to change it here in the future, maybe
        $sharedDriver = new SharedDriver($result["idDriver"]);
        $sharedDriver->setIdTrack($idSharedDriver);

        return $sharedDriver;
    }

    public static function findAllSharedDrivers(string $driverName) : array {
        $connection = new MySql();

        $sharedDs = [];

        $types = "s";
        $params = ["%{$driverName}%"];
        $sql = "SELECT d.*, c.*, sd.* FROM shareddriver sd 
        JOIN driver d ON d.idDriver = sd.idDriver 
        JOIN country c ON c.idCountry = d.idCountry WHERE sd.isActive = 1 AND d.fullName LIKE ?";

        $results = $connection->search($sql, $types, $params);

        foreach($results as $result) {
            $driver = new Driver($result['fullName'], $result["number"], $result["level"], $result["color"], $result["idCountry"]);

            $driver->setIdDriver($result['idDriver']);
            $driver->setDriverFlag($result["linkFlag"]);
            $driver->setDriverCountry($result["name"]);
            $driver->setDriverDateShared($result["dateShared"]);
            $driver->setDriverActive(boolval($result["isActive"]));

            $sharedDs[] = $driver;
        }

        return $sharedDs;
    }

    public function updateTrack() : void {
        // Add later
    }

    public function createSharedDriver() : void {
        $connection = new MySql();

        session_start();

        $types = "ii";
        $params = [$this->idDriver, $_SESSION["idUser"]];
        $sql = "INSERT INTO shareddriver(idDriver, idUser) VALUES (?, ?)";

        $connection->execute($sql, $types, $params);
    }

    public function setIdSharedDriver(int $idSharedDriver) : void {
        $this->idSharedDriver = $idSharedDriver;
    }

    // Getters e Setters

}

?>