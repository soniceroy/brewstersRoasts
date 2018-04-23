<script>
    console.log("WTF");
</script>

<?php
header('Location: delete_order.php?action=ordernotfound');
// start session 
session_start();
include "../config/database.php";
include_once "objects/orders.php";


// get database connection
$database = new Database();
$db = $database->getConnection();

// Orders for finding orders in the database
orders = new Orders($db);
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";

echo '<h2>' . $id . '</h2>';
include "layout_footer.php";

// get the order information from the database: 
$order_id = orders->findOrderNum();

//if order doesn't exist
//header('Location: delete_order.php?action=no_order_found');

if($order_id) {
    header('Location: confirm_delete.php?order_id=' . $order_id);
    die();
else {
    header('Location: delete_order.php?action=ordernotfound');
}
?>
