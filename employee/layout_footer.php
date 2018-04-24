
 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script>
$(document).ready(function(){
    $('.update-wage-form').on('submit', function(){
        
        var supervisorId = $(this).find('.supervisor-id').val();
        var superviseeId = $(this).find('.supervisee-id').val();
        var newWage = $(this).find('.new-wage').val();

        window.location.href = "check_credentials.php?supervisorId=" + supervisorId + "&superviseeId=" + superviseeId + "&newWage=" + newWage;
        
        return false;
    });
});
</script>
 
</body>
</html>
