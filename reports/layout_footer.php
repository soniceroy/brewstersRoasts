
 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script>
$(document).ready(function(){
    
    // delete_order button listener
    $('.report-1-form').on('submit', function(){
        // get order number
        var warehouse = $(this).find('.warehouse').val();
        var startDate = $(this).find('.startDate').val();
        var endDate = $(this).find('.endDate').val();
        // redirect to find_order.php, with parameter values to process the request
        window.location.href = "report_output.php?id=" + 1 + "&warehouse=" + warehouse + "&startDate=" + startDate + "&endDate=" + endDate;
        //window.location.replace("find_order.php?id=" + id);
        return false;
    });
});
</script>
 
</body>
</html>
