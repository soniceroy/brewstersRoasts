</div>
        <!-- /row -->
 
    </div>
    <!-- /container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script>
$(document).ready(function(){
    // add to cart button listener
    $('.add-to-cart-form').on('submit', function(){
 
        // info is in the table / single product layout
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        // redirect to add_to_cart.php, with parameter values to process the request
        window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;

        return false;
    });
    
    // update quantity button listener
    $('.update-quantity-form').on('submit', function(){
     
        // get basic information for updating the cart
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
     
        // redirect to update_quantity.php, with parameter values to process the request
        window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
        return false;
    });

    // customer info listener
    $('.update-customer-info-form').on('submit', function(){
        var firstname = $(this).find('.firstname').val();
        var lastname = $(this).find('.lastname').val();
        var streetAddress = $(this).find('.streetAddress').val();
        var city = $(this).find('.city').val();
        var state = $(this).find('.state').val();
        var zip = $(this).find('.zip').val();
        var email = $(this).find('.email').val();
/*
        window.location.replace("place_order.php?firstname=" + firstname 
                                                            + "&lastname=" + lastname
                                                            + "&streetAddress=" + streetAddress
                                                            + "&city=" + city
                                                            + "&state=" + state
                                                            + "&zip=" + zip
                                                            + "&email=" + email
        );
        */
        window.location.href = "place_order.php?firstname=" + firstname 
                                                            + "&lastname=" + lastname
                                                            + "&streetAddress=" + streetAddress
                                                            + "&city=" + city
                                                            + "&state=" + state
                                                            + "&zip=" + zip
                                                            + "&email=" + email;
        return false;
    });

    // change product image on hover
    //$(document).on('mouseenter', '.product-img-thumb', function(){
    //    var data_img_id = $(this).attr('data-img-id');
    //    $('.product-img').hide();
    //    $('#product-img-'+data_img_id).show();
    //});
});
</script>
 
</body>
</html>
