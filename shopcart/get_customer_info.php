<?php
// start session
session_start();
 
// remove items from the cart
session_destroy();
 
// set page title
$page_title="Great! Thank you!";
 
// include page header HTML
include_once 'layout_header.php';
 
echo "<div class='col-md-12'>";
 
    // tell the user order has been placed
    echo "<div class='alert alert-success'>";
        echo "We just need some info about you...";
    echo "</div>";
 
echo "</div>";


// form for customer info and button to place_order
echo "<div class='col-md-12 text-align-center'>";
echo "<div class='cart-row'>";
    if($item_count>1){
        echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
    }else{
        echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
    }
    echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
    echo "<a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>";
        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Place Order";
    echo "</a>";
echo "</div>";
echo "</div>";

// include page footer HTML
include_once 'layout_footer.php';
?>
