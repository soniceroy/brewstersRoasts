<?php

class Staff {
    // database connection and table name
    private $conn;
    private $table_name="staff";
    private $supervises="supervises";

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    public function isSupervisor($id) {
        $query = "SELECT supervisor
                    
                FROM " . $this->supervises . "
                WHERE supervisor = ?";
        
        // prepare query
        $stmt = $this->conn->prepare($query);

        //bind parameter
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        // execute query
        $stmt->execute();
        return $stmt->fetchColumn();

    }

    public function updateWage($id, $newWage) {
        $query = "UPDATE " . $this->table_name . "
                 SET hourlyRate = ?
                 WHERE staffId = ?";
        // prepare query
        $stmt = $this->conn->prepare($query);

        //bind parameter
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->bindParam(1, $newWage, PDO::PARAM_STR);

        // execute query
        $stmt->execute();
    }
}
?>
