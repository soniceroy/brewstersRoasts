<?php
// 'Orders' object
class Orders {
    // database connection and table name
    private $conn;
    private $table_name="orders";

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    public function findOrder($id) {
        echo "id: " . $id;
        $query = "SELECT 
                    orderId, orderDate
                FROM " . $this->table_name . "
                WHERE orderId=?";
        
        // prepare query
        $stmt = $this->conn->prepare($query);

        //bind parameter
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        // execute query
        $stmt->execute();
        //$stmt->execute([$id]);
        // return values
        return $stmt;

    }

    public function findOrderNum($id) {
        $stmt = $this->findOrder($id);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['orderId'];
        
    }

    public function getOrderDate($id) {
        $stmt = $this->findOrder($id);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['orderDate'];
    }
 
}
?>
