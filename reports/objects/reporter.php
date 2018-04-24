<?php
// 'Orders' object
class Reporter {
    // database connection and table name
    private $conn;

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }
    public function shipByDateWarehouse($startDate, $endDate, $warehouse) {
        $query = "Select count(pickId) as totalship
            from shipments 
            where actualShipDate between ? and ? and pickId
            in (select distinct pick from pickedLineItems where warehouse = ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $orderId, PDO::PARAM_STR);
        $stmt->bindParam(2, $beanId, PDO::PARAM_STR);
        $stmt->bindParam(3, $quantity, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();

    }
}
?>










