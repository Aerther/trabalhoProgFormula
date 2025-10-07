<?php

namespace App\Classes;

use App\Database\MySQL;

class SharedDriver {

    private int $idSharedDriver;
    private string $idDriver;

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

    public function updateTrack() : void {
        // Add later
    }

    public function saveTrack() : void {
        // Add later
    }

    public function setIdSharedDriver(int $idSharedDriver) : void {
        $this->idSharedDriver = $idSharedDriver;
    }

    // Getters e Setters

}

?>