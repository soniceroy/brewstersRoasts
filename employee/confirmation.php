<?php
// start session
session_start();
// connect to database
include '../config/database.php';
 
// include objects
//include_once "objects/product.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
//$product = new Product($db);

// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// set page title
$page_title="Staff Wage Update";


// page header html
include 'layout_header.php';
?>

  <h2>Updated</h2>



<!-- layout footer code -->
<?php include 'layout_footer.php';?>