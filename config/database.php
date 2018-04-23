<?php
// get a database connection
class Database {
    private $host = "localhost";
    //private $db_name = "shop_cart_sessions_1";
    private $db_name = "BREWSTERS";
    private $uname = "root";
    private $pword = "student";
    public $conn;

    // get database connection
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->uname, $this->pword);
        }
        catch(PDOExectoption $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
