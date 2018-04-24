<?php
// 'Orders' object
class OrderLineItems {
    // database connection and table name
    private $conn;
    private $table_name="orderLineItems";

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }
    public function insertOrderLine($orderId, $beanId, $quantity, $grind) {
        $query = "INSERT INTO " . $this->table_name . "
                 (orderId, beanId, orderQuantity, grind) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $orderId, PDO::PARAM_INT);
        $stmt->bindParam(2, $beanId, PDO::PARAM_STR);
        $stmt->bindParam(3, $quantity, PDO::PARAM_STR);
        $stmt->bindParam(4, $grind, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();

    } 
}
?>
