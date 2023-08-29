<?php
include('header.php');
include('dbcon.php');
$date = date('Y-m-d',strtotime('Monday this week'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly</title>
    <style>
        #weekshow input{
            border: none;
            outline: none;
            box-shadow: none;
            width: 100%;
            background: transparent;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <form id="dateweekly">
            <div>
                <label class="w-20" for="date">Date
                    <select class="form-select" name="date" id="date">
                      <option value=""></option>
                      <?php
                      $sql1="SELECT distinct format(date,'dd-MM-yyyy') as disdate FROM Weekly_NVR where date is not null";
                      $run1=sqlsrv_query($conn,$sql1);
                      while($row1=sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC)){
                      ?>
                      <option value="<?php echo $row1['disdate'] ?>"><?php echo $row1['disdate'] ?></option> 
                      <?php
                      }
                      ?> 
                    </select>
                </label>
                <button type="button" class="btn btn-primary ms-3" id="dsearch" class="dsearch">Search</button>
            </div>
            <div id="dweeklyshow">

            </div>
    </form>
    <div id="weekshow">
        <form id="dataFrom">
            <table class="table table-bordered table-hover mt-4">
                <tr class="bg-secondary">
                    <th style="width: 5%;">Sr</th>
                    <th style="width: 10%;">NVR</th>
                    <th style="width: 25%;">NVR_Name</th>
                    <th style="width: 15%;">Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th style="width: 15%;">Action</th>
                </tr>
            <?php                 
                $sql="SELECT * FROM NVR_Master";   
                $run=sqlsrv_query($conn,$sql);
                while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC ))
                {
                    $sql1= "SELECT * FROM Weekly_NVR WHERE date = '$date' AND NVR_id= '".$row['id']."' ";
                    $run1=sqlsrv_query($conn,$sql1);
                    $row1=sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);

            ?>
                <tr>
                    <td><input type="text" id="sr" name="nvrId[]" value="<?php echo $row['id']?>"></td>
                    <td><input type="text" name="nvr[]" value="<?php echo $row['NVR']?>"></td>
                    <td><input type="text" name="nvrName[]" value="<?php echo $row['NVR_Name']?>"></td>
                    <td><input type="date" name="date[]" value="<?php echo $date ?>" readonly></td>                       
                    <td><input type="text" value="<?php echo $row1['Status'] ?>"></td>
                    <td><input type="text" value="<?php echo $row1['Remark'] ?>"></td>
                    <td align="center"><button= type="button" class="btn btn-primary btn-sm mb-0 addweek " id="<?php echo $row1['NVR_id'] ?>">Add</button></td>
                </tr>
            <?php }  ?>               
            </table>
        </form>
    </div>
    <!-- modal -->
    <div class="modal fade" id="weeklyModal" tabindex="-1" aria-labelledby="weeklyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Remarks</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="weekly_db.php" method="post" autocomplete="off" id="weekform" class="mb-3">
            
            
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="saveweek" form="weekform">Save </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $('#weekly').addClass('active');

    $(document).ready(function(){
        $.ajax({
            url: 'weekly_db.php',
            type: 'post',
            data: $('#dataFrom').serialize(),           
            success:function(data)
            {
                console.log(data);
            }
        });
    });

//modal
    $(document).on('click','.addweek',function(){
        var sr= $(this).attr('id');   
        $.ajax({
          url:'modal_week.php',
          type: 'post',
          data: {sr:sr},
          success:function(data){
            $('#weekform').html(data);  
            $('#weeklyModal').modal('show');
          }
        });
      });

//uniquedates
$(document).on('click','#dsearch',function()
{ 
    var disdate= $('#date').val();         
        $.ajax({
          url:'disdate.php',
          type:'post',
          data: {disdate:disdate},
          success:function(data)
          {
            $('#weekshow').html(data);  
          }
        });
});

</script>
<?php 
include('footer.php');
?>

