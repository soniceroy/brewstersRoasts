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


echo "<div class='container'>
  <h3>Are you sure you want to delete?</h3>
  <table class='table'>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Order Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>" . $orderId . "</td>
        <td>" . $orderDate . "</td>
      </tr>
    </tbody>
  </table>
</div>
<form class='confirm-delete-form'>
  <button type='submit' class='btn btn-primary confirm-delete'>Delete</button>
</form";
include 'layout_footer.php';?>
