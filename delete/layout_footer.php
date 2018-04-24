
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script>
$(document).ready(function(){
    
    // delete_order button listener
    $('.delete-order-form').on('submit', function(){
        // get order number
        var id = $(this).find('.order-id').val();
     
        // redirect to find_order.php, with parameter values to process the request
        window.location.href = "find_order.php?id=" + id;
        //window.location.replace("find_order.php?id=" + id);
        return false;
    });
    $('.confirm-delete-form').on('submit', function(){
        // get order number
        var id = $(this).find('.order-id').val();
     
        // redirect to delete_order_complete.php, with parameter values to process the request
        window.location.href = "delete_order_complete.php?id=" + id;
        //window.location.replace("find_order.php?id=" + id);
        return false;
    });
});
</script>
 
</body>
</html>
