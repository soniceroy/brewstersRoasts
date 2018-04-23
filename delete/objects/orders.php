<?php
// 'Orders' object
class Orders {
    // database connection and table name
    private $conn;
    private $table_name="orders";

    // object properties
    public $orderId;
    public $orderDate;

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    function findOrder($id) {
        $query = "SELECT 
                    orderId, orderDate
                FROM " . $this->table_name . "
                WHERE orderId=:orderId";
        
        // prepare query
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute(['orderId' => $id]);
        // return values
        return $stmt;

    }

    function findOrderNum($id) {
        $stmt = $this->find_order($id);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        orderId = $row['orderId'];
        
    }
 
}
?>
