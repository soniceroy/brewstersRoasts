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
include '../layout_header.php';
if($action == 'notASupervisor') {
    echo '
    
        <div class="container"><p>Could not update. Not a supervisor</p></div>';
}
?>

<div class="container">
  <p>Please Enter your SupervisorId</p>
  <form class="update-wage-form">
    <div class="form-group">
      <label for="supervisor">Supervisor Id:</label>
      <input type="text" class="form-control supervisor-id" id="supervisor">
    </div>
    <div class="form-group">
      <label for="supervisee">Supervisee Id:</label>
      <input type="text" class="form-control supervisee-id" id="supervisee">
    </div>
    <div class="form-group">
      <label for="newWage">New Wage:</label>
      <input type="text" class="form-control new-wage" id="newWage">
    </div>
  <button type="submit" class="btn btn-default update-wage">Submit</button>
  </form>
</div>



<!-- layout footer code -->
<?php include 'layout_footer.php';?>
