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
    $orderId = isset($_GET['id']) ? $_GET['id'] : "";
    $orders->deleteOrder($orderId);
    header('Location: confirmation.php');
    die();
?>