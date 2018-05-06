<?php

// start session 
session_start();
include_once "../config/database.php";
include_once "objects/reporter.php";
include "layout_header.php";
// get database connection
$database = new Database();
$db = $database->getConnection();

// Orders for finding orders in the database
$reporter = new Reporter($db);
// Check that the order has not shipped

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id == 1)
{
    $warehouse = isset($_GET['warehouse']) ? $_GET['warehouse'] : "";
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : "";
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : "";
    $count = $reporter->shipByDateWarehouse($startDate, $endDate, $warehouse);
    
echo '
  <h2>Shipments</h2>
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Warehouse</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
        <tr>
              <td>' . $warehouse . '</td>
              <td>' . $count . '</td>
        </tr>
    </tbody>
</table>
</div>';
}
include "layout_footer.php";
?>

