<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly report</title>
</head>
<body>
<div class="container-fluid">
    <label for="rmonth" class="form-label" >
        <input type="month" id="month" name="month" class="form-control" required>
    </label>
    <div id="putdata">

    </div>
</div>    
</body>
</html>
<script>
   $('#rweekly').addClass('active'); 
   $(document).on('change','#month',function(){
    var month = $(this).val();
    console.log(month);
$.ajax({
    url:'calweek.php',
    type:'post',
    data:{month:month},
    success:function(data){
        $('#putdata').html(data);  
        console.log(data);
    },
    error:function(res){
            console.log(res);
        }
});
});
</script>
<?php
include('footer.php');

?>