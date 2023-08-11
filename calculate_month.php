<?php
include('dbcon.php');
if(isset($_POST['month'])){
    $m = $_POST['month'];
    $days = date('t', strtotime($m));
?>
 <table class="table table-bordered table-hover mt-5 " >
    <tr><th>Date</th>
<th>Day</th>
<th>Total Machine</th>
<th>Remarks</th>
<th>Pending</th></tr>
  <?php 

        for ($i=1; $i <= $days; $i++) {
            $date = date('Y-m-d', strtotime($m.'-'.$i));
            $day = date('M', strtotime($date));
            $date1 = date('d', strtotime($m.'-'.$i));
      
    ?>
    <tr >
 <th style="width:20%;"> <?php echo $date1 ?></th> 
 <th> <?php echo $day ?></th> 
 <th>8</th>
<?php
$sql="SELECT COUNT(Remark) AS [Total Number of Remark] FROM machine WHERE date='$date' ";
$run= sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
 <th><?php echo $row['Total Number of Remark']?></th>
 
 <th><?php echo (8-$row['Total Number of Remark'])?></th>
    
 
 </tr>     <?php
    }
    ?>
    
</table>

<?php
    }
    ?>