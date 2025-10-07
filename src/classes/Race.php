<?php

namespace App\Classes;

use App\Database\MySQL;

// Change everything
class Race {

    private int $idRace;
    private string $raceLaps;

    public function __construct(string $raceLaps) {
        $this->raceLaps = $raceLaps;
    }
    
    public static function findRace(int $idRace) : Race {
        $connection = new MySql();

        session_start();

        $types = "ii";
        $params = [$_SESSION["idUser"], $idRace];
        $sql = "SELECT FROM race r WHERE r.idUser = ? AND r.idRace = ?";

        $result = $connection->search($sql, $types, $params);

        // Have to change it here in the future, maybe
        $race = new race($result["laps"]);
        $race->setIdRace($idRace);

        return $race;
    }

    public function updateRace() : void {
        // Add later
    }

    public function saveRace() : void {
        // Add later
    }

    public function setIdRace(int $idRace) : void {
        $this->idRace = $idRace;
    }

    // Getters e Setters

}

?>