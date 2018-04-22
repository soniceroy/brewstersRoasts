<?php
// start session
session_start();
$page_title="Brewster's Roasts";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo isset($page_title) ? $page_title : "No Page Title Set"?></title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   
    <!-- our custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />
 
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="brewsters.php">Project Home</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="shopcart/products.php" class="dropdown-toggle">Shopping Cart</a>
                </li>
 
                <li>
                    <a href="delete/delete_order.php">Delete Order</a>
                </li>
                <li>
                    <a href="employee/employee_update.php">Employee Update</a>
                </li>
                <li>
                    <a href="reports/report_1.php">Report 1</a>
                </li>
                <li>
                    <a href="reports/report_2.php">Report 2</a>
                </li>
                <li>
                    <a href="reports/report_3.php">Report 3</a>
                </li>
            </ul>
 
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->
 
    <!-- container -->
    <div class="container">
        <div class="row">
 
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : "Page Title not Set"; ?></h1>
            </div>
        </div>
    </div>
        <!-- /row -->
 
</div>
    <!-- /container -->
</body>
</html>
