<?php

namespace App\Classes;

use App\Database\MySQL;

class Track {

    private int $idTrack;
    private string $trackName;
    private double $trackLength;
    private double $trackBaseLap;

    public function __construct(string $trackName, double $trackLength, double $trackBaseLap) {
        $this->trackName = $trackName;
        $this->trackLength = $trackLength;
        $this->trackBaseLap = $trackBaseLap;
    }
    
    public static function findTrack(int $idTrack) : Track {
        $connection = new MySql();

        $types = "i";
        $params = [$idTrack];
        $sql = "SELECT FROM track t WHERE t.idTrack = ?";

        $result = $connection->search($sql, $types, $params);

        // Have to change it here in the future, maybe
        $track = new Track($result["name"], $result["length"], $result["baseLap"]);
        $track->setIdTrack($idTrack);

        return $track;
    }

    public function updateTrack() : void {
        // Add later
    }

    public function saveTrack() : void {
        // Add later
    }

    public function setIdTrack(int $idTrack) : void {
        $this->idTrack = $idTrack;
    }

    // Getters e Setters

}

?>