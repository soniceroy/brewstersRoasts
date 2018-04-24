<?php
// start session
session_start();

// set page title
$page_title="Great! Thank you!";

include "../config/database.php";
include "../delete/objects/orders.php";
include "objects/customers.php";
// include page header HTML
include_once 'layout_header.php';
 
echo "<div class='col-md-12'>";
 
    // tell the user order has been placed
    echo "<div class='alert alert-success'>";
        echo "We just need some info about you...";
    echo "</div>";
 
echo "</div>";


// form for customer info and button to place_order
echo '<div class="container">
    <form class="update-customer-info-form">
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control firstname" id="firstname" required>
    </div>
    <div class="form-group col-md-6">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control lastname" id="lastname" required>
    </div>
    <div class="form-group col-md-6">
        <label for="streetAddress">Street Address:</label>
        <input type="text" class="form-control streetAddress" id="streetAddress" required>
    </div>
    <div class="form-group col-md-6">
        <label for="city">City:</label>
        <input type="text" class="form-control city" id="city" required>
    </div>
    <div class="form-group col-md-6">    
        <label for="state">State:</label>
        <input type="text" class="form-control state" id="state" required>
    </div>
    <div class="form-group col-md-6">
        <label for="zip">Zip:</label>
        <input type="text" class="form-control zip" id="zip" required>
    </div>
    <div class="form-group col-md-6">
        <label for="email">Email:</label>
        <input type="email" class="form-control email" id="email" required>
    </div>
    <button type="submit" class="btn btn-primary update-customer-info">Order</button>
    </form>
    </div>
    ';

// include page footer HTML
include_once 'layout_footer.php';
?>
