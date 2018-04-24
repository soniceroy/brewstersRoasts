<?php
// start session
session_start();
echo "HERERERERE";
/*
include "../config/database.php";
include "../delete/objects/orders.php";
include "objects/customers.php";
$database = new Database();
$db = $database->getConnection();
$customers = new Customers($db);
$orders = new Orders($db);

$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : "";
$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : "";
$streetAddress = isset($_GET['streetAddress']) ? $_GET['streetAddress'] : "";
$city = isset($_GET['city']) ? $_GET['city'] : "";
$state = isset($_GET['state']) ? $_GET['state'] : "";
$zip = isset($_GET['zip']) ? $_GET['zip'] : "";
$email = isset($_GET['email']) ? $_GET['email'] : "";

$custId = $customers->insertCustomer(
    $firstname, $lastname, $streetAddress, $city, $state, $zip, $email
);

$orderId = $orders->insertOrder($custId);

// code for the orderlineItem

header('Location: order_confirmation?orderId=' . $orderId);*/
?>
