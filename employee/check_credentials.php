<?php
// start session
session_start();
// connect to database
include '../config/database.php';
include '/objects/staff.php'; 
// include objects
//include_once "objects/product.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$staff = new Staff($db);
echo "herhehrehrehr";
// to prevent undefined index notice
$supervisorId = isset($_GET['supervisorId']) ? $_GET['supervisorId'] : "";
$superviseeId = isset($_GET['superviseeId']) ? $_GET['superviseeId'] : "";
$newWage = isset($_GET['newWage']) ? $_GET['newWage'] : "";


if($staff->isSupervisor($supervisorId)) {
    $staff->updateWage($superviseeId, $newWage);
    header('Location: confirmation.php');
    die(); 
}
else {
    header('Location: employee_update.php?action=notASupervisor');
    die();
}

?>