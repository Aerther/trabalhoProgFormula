<?php

namespace App\Classes;

use App\Database\MySQL;

class User {

    private int $idUser;
    private string $user;
    private string $password;
    private string $email;

    public function __construct(string $user, string $password) {
        $this->user = $user;
        $this->password = $password;
    }

    public function updateUser() : void {
        // Add later
    }

    public function createUser() : void {
        $connection = new MySql();

        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $types = "sss";
        $params = [$this->user, $this->password, $this->email];
        $sql = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";

        $connection->execute($sql, $types, $params);
    }

    public function authenticate() : bool {
        $connection = new MySQL();

        $types = "s";
        $params = [$this->user];
        $sql = "SELECT u.idUser, u.username, u.password, u.email FROM user u WHERE u.username = ?";

        $result = $connection->search($sql, $types, $params);

        if(empty($result)) return false;

        $user = $result[0];

        if(!password_verify($this->password, $user["password"])) return false;

        session_start();
        $_SESSION["idUser"] = $user["idUser"];
        $_SESSION["user"] = $user["username"];

        $this->email = $user["email"];

        return true;
    }

    public function userExists() : bool {
        $connection = new MySQL();

        $types = "s";
        $params = [$this->user];
        $sql = "SELECT 1 FROM user u WHERE u.username = ?";

        $result = $connection->search($sql, $types, $params);

        return !empty($result);
    }

    // Getters e Setters

    public function getUser() : string {
        return $this->user;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) : void {
        $this->email = $email;
    }
}

?>