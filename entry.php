<?php 
date_default_timezone_set('Asia/Kolkata');
include('header.php');
include('dbcon.php');

$sqld = "SELECT format(max(date), 'yyyy-MMM-dd') as date FROM machine";
$rund = sqlsrv_query($conn,$sqld);
$rowd = sqlsrv_fetch_array($rund, SQLSRV_FETCH_ASSOC);

$maxdate = date('Y-m-d',strtotime($rowd['date'].'+1 days'));
$curDate = date('Y-m-d',strtotime('+5 days'));
if($maxdate < $curDate){
    $entry = 'Yes';
}else{
    $entry = 'No';
}
// echo $entry;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera</title>
    <style>
        #entryForm input{
            border: none;
            outline: none;
            box-shadow: none;
            width: 100%;
            background: transparent;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-2">
     
        <form id="formdata">
            <div>
                <label  class="w-20" for="date">Date
                    <input type="date" name="date" id="date" class="form-control" value="<?php echo date('Y-m-d',strtotime('-1 days')) ?>"> 

                </label>
                <button type="button" class="btn btn-primary ms-3" id="search">Search</button>
            </div>
        </form>
        <div id="showdata">
            <table class="table table-bordered table-hover mt-5 " id="table">
                <tr class="bg-secondary">
                    <th>Sr</th>
                    <th>Machine</th>
                    <th>Dept</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Category</th>
                    <th>Remark</th>
                    <th>Add Remarks</th>
                </tr>
                <?php 
                    $srno = 1;
                    $sql1 = "SELECT * FROM machine where date = '".date('Y-m-d',strtotime('-1 days'))."'";
                    $run1 = sqlsrv_query($conn,$sql1);
                    while($row1 = sqlsrv_fetch_array($run1, SQLSRV_FETCH_ASSOC)){
                ?>
                <tr  >   
                    <td><?php echo $srno ?></td>
                    <td><?php echo $row1['Machine_name'] ?></td>
                    <td><?php echo $row1['Department'] ?></td>
                    <td><?php echo $row1['date']->format('d-m-Y') ?></td>
                    <td><?php echo $row1['Start_time']->format('H:i') ?></td>
                    <td><?php echo $row1['end_time']->format('H:i') ?></td>
                    <td><?php echo $row1['Catagory'] ?></td>
                    <td><?php echo $row1['Remark'] ?></td>
                    <td align="center" ><button= type="button" class="btn btn-primary btn-sm mb-0  category" id="<?php echo $row1['ID'] ?>"> Add </button></td>
                </tr>
                <?php $srno++; } ?>
            </table>
        </div>
<!-- Modal -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Remarks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="entry_db.php" method="post" autocomplete="off" id="catform" class="mb-3">
    
    
                </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" name="save" form="catform">Save </button>
            </div>
        </div>
    </div>
</div>  
</div>
<!-- to import data from machine master to machine table -->
    <form id="entryForm">
        <table class="table table-bordered"  style="  display:none;">
            <tr>
                <th style="width: 5%;">Sr</th>
                <th style="width: 5%;">Machine Id</th>
                <th style="width: 25%;">MAchine</th>
                <th style="width: 20%;">Dept</th>
                <th style="width: 15%;">Date</th>
                <th style="width: 15%;">Start Time</th>
                <th style="width: 15%;">End Time</th>
            </tr>
            <?php
                $sr = 1; 
                $date =date('Y-m-d',strtotime($rowd['date'].'+1 days'));
                $sql ="SELECT * FROM machine_master";
                $run =sqlsrv_query($conn,$sql);
                while($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)){
                    $randDate = new DateTime();
                    $randDate->setTime(mt_rand(0, 23), mt_rand(0, 59));
                
            ?>
            <tr>
                <td><?php echo $sr ?></td>
                <td><input type="text" name="mid[]" value="<?php echo $row['id'] ?>"></td>
                <td><input type="text" name="machine[]" value="<?php echo $row['machine'] ?>"></td>
                <td><input type="text" name="dept[]" value="<?php echo $row['department'] ?>"></td>
                <td><input type="date" name="date[]" value="<?php echo $date ?>"></td>
                <td><input type="time" name="stime[]" value="<?php echo $randDate->format('H:i') ?>"></td>
                <td><input type="time" name="etime[]" value="<?php echo date('H:i', strtotime($randDate->format('H:i').'+2 hour')) ?>"></td>
            </tr>
            <?php
                if($sr%8 == 0){
                    $date = date('Y-m-d',strtotime($date.'+1 days'));
                }else{
                    $date = $date;
                }
                $sr++; 
                } 
            ?>
        </table>
    </form>
</div>
</body>
</html>
<script>
    $('#entery').addClass('active');

    $(document).ready(function(){    
        var entry = '<?php echo $entry ?>';
        if(entry == 'Yes'){
            $.ajax({
                url: 'entry_db.php',
                type: 'post',
                data: $('#entryForm').serialize(),
                success:function(data){
                    console.log(data);
                }
            });
        }else{
            return false;
        }
    });
//modal
    $(document).on('click','.category',function(){
        var sr= $(this).attr('id');
        $.ajax({
          url:'modal.php',
          type: 'post',
          data: {sr:sr},
          success:function(data){
            $('#catform').html(data);  
            $('#cameraModal').modal('show');
          }
        });
      });
//find date
    $(document).on('click','#search', function(){
        var date=$('#date').val();
        console.log(date);
        $.ajax({
        url:'report_get.php',
        type:'post',
        data:{date:date},
    success:function(data){
        $('#showdata').html(data);
    }
  })
  });
//disable dates
    var today= new Date();
    var d = today.getDate() -1;
    var m = today.getMonth() +1;
    var y = today.getFullYear();

    if(d<10){
      d='0'+d;
    }
    if(m<10){
      m='0'+ m;
    }
    today = y+ '-' + m + '-' + d ;
    document.getElementById('date').setAttribute("max", today);
</script>
<?php 
include('footer.php');
?>