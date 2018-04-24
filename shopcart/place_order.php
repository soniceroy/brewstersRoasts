<?php
// start session
session_start();

include "../config/database.php";
include "../delete/objects/orders.php";
include "../delete/objects/orderLineItems.php";
include "objects/customers.php";

$grind = "medium";

$database = new Database();
$db = $database->getConnection();
$customers = new Customers($db);
$orders = new Orders($db);
$orderLineItems = new OrderLineItems($db);

$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : "";
$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : "";
$streetAddress = isset($_GET['streetAddress']) ? $_GET['streetAddress'] : "";
$city = isset($_GET['city']) ? $_GET['city'] : "";
$state = isset($_GET['state']) ? $_GET['state'] : "";
$zip = isset($_GET['zip']) ? $_GET['zip'] : "";
$email = isset($_GET['email']) ? $_GET['email'] : "";

$custId = $customers->insertCust(
    $firstname, $lastname, $streetAddress, $city, $state, $zip, $email
);
$orderId = $orders->insertOrder($custId);

// code for the orderlineItem
foreach($_SESSION['cart'] as $beanId => $quantity) {
    $orderLineItems->insertOrderLine($orderId, $beanId, $quantity["quantity"], $grind);
}
header('Location: order_confirmation.php?orderId=' . $orderId);
?>
