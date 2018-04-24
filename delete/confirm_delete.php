<?php
// start session
session_start();
// connect to database
include '../config/database.php';
 
// include objects
include_once "objects/orders.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$orders = new Orders($db);

// to prevent undefined index notice
$orderId = isset($_GET['order_id']) ? $_GET['order_id'] : "";
$orderDate = $orders->getOrderDate($orderId);
// set page title
$page_title="Order Deletion";
 
// page header html
include 'layout_header.php';


echo '<div class="container">
  <h3>Are you sure you want to delete?</h3>
<form class="confirm-delete-form">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="Order">Order</label>
  <input class="form-control order-id" type="text" placeholder="' . $orderId . '" value="' . $orderId . '" readonly>
</div>
<div class="form-group col-md-6">
  <label for="Order Date">Order Date</label>
  <input class="form-control order-date" type="text" placeholder="'. $orderDate . '" value="'. $orderDate . '" readonly>
</div>
  <button type="submit" class="btn btn-primary confirm-delete">Delete</button>
</form>
</div>';
include 'layout_footer.php';
?>
