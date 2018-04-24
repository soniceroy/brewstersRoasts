<?php

class Customers {
    
    private $conn;
    private $table_name="customers";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertCust($firstname, $lastname, $streetAddress, $city, $state, $zip, $email) {
        $query = "INSERT INTO " . $this->table_name . "
                    (firstname, lastname, streetAddress, city, state, zip, email)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);    
        $stmt->bindParam(1, $firstname, PDO::PARAM_STR);
        $stmt->bindParam(2, $lastname, PDO::PARAM_STR);
        $stmt->bindParam(3, $streetAddress, PDO::PARAM_STR);
        $stmt->bindParam(4, $city, PDO::PARAM_STR);
        $stmt->bindParam(5, $state, PDO::PARAM_STR);
        $stmt->bindParam(6, $zip, PDO::PARAM_INT);
        $stmt->bindParam(7, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
}

?>