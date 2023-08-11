<?php
include('dbcon.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
<!-- <form id="getdata">
      
      <div>
          <label  class="w-20" for="date">Date
              <input type="date" name="date" id="date" class="form-control" > 
          </label>
          <button type="button" class="btn btn-primary ms-3" id="search">Search</button>
      
      </div>
</form> -->
<div class="container-fluid ">
        <label style="width: 20%;" for="days">Month
            <input type="month"  name="month" id="month"  class="form-control" required>
        </label>
        <div id="putdata">

        </div>
    </div>
    
</body>
</html> 

<?php
include('footer.php');
?>
<script>
$('#report').addClass('active');
$(document).on('change','#month',function(){
    var month = $(this).val();
$.ajax({
    url:'calmonth.php',
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