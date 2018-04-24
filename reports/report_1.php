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
 
// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

// set page title
$page_title="Shipments By Warehouse and Daterange";
 
// page header html
include 'layout_header.php';
?>

<div class="container">
  <p>Please Enter the warehouse and DateRange</p>
  <form class="report-1-form">
    <div class="form-group">
      <label for="warehouse">Warehouse:</label>
      <input type="text" class="form-control warehouse" id="warehouse">
    </div>
    <div class="form-group">
      <label for="startDate">Start Date:</label>
      <input type="text" class="form-control startDate" id="startDate">
    </div>
    <div class="form-group">
      <label for="endDate">End Date:</label>
      <input type="text" class="form-control endDate" id="endDate">
    </div>
  <button type="submit" class="btn btn-default report-1-run">Submit</button>
  </form>
</div>



<!-- layout footer code -->
<?php include 'layout_footer.php';?>
