<?php

// start session 
session_start();
include "../config/database.php";
include_once "objects/orders.php";


// get database connection
$database = new Database();
$db = $database->getConnection();

// Orders for finding orders in the database
$orders = new Orders($db);

// Check that the order has not shipped

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";

// get the order information from the database: 
$order_id = $orders->findOrderNum($id);

// find out if order is shipped
$shipped = 

if($order_id) {
    header('Location: confirm_delete.php?order_id=' . $order_id);
    die();
}
else {
    header('Location: delete_order.php?action=ordernotfound&return_id=' . $order_id);
    die();
}
?>

