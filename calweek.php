<?php
include('dbcon.php');

if(isset($_POST['month'])){
    $m = $_POST['month'];
    $days = date('t', strtotime($m));
   
?>
<table class="table table-bordered  mt-5 ">
    <tr>
    <th>Date</th>
    <?php 
$newArray = array();
$count=0;
for ($i=1; $i <= $days; $i++) {
    $date = date('Y-m-d', strtotime($m.'-'.$i));
    $date1 = date('d-m-Y', strtotime($m.'-'.$i));
    $day_of_week = date('N', strtotime($date));
   
    if ($day_of_week == 1) {
        $count++;
        ?>
       <th > <?php echo $date1 ?></th> 
       <?php
       array_push($newArray,$date);
        ?>
       <?php     
    }
   
?>
<?php }  
//  print_r($newArray); ?>

</tr>
<tr>
  <th >Day</th>
<?php 
for ($i=1; $i <= $count; $i++) {
        ?>
       <th > <?php echo "Monday" ?></th> 
       <?php
    }
?>
</tr>
<tr><th>NVR</th>
<?php 

for ($i=1; $i <= $count; $i++) {
   ?> 
   <td><?php echo "10" ?></td>
<?php } ?>
</tr>

<tr><th>Remarks</th>
<?php
for ($i=0; $i <= $count-1; $i++){
         $date= $newArray[$i];
        $sql="SELECT COUNT(Remark) AS TotalRemark FROM Weekly_NVR WHERE date='$date' AND Status is not NULL";
        $run= sqlsrv_query($conn,$sql);
        $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
        ?>

<td><?php echo $row['TotalRemark']?></td>
<?php }  ?>
</tr>

 <tr><th>Pending</th>
<?php
 for ($i=0; $i <= $count-1; $i++) {
    $date= $newArray[$i];
   
    $sql="SELECT COUNT(id) AS TotalNull FROM Weekly_NVR  WHERE date='$date' AND Status is NULL";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
 <td><?php echo ($row['TotalNull'])?></td>
<?php } ?>
 </tr> 

</table>
<?php } ?>
<?php
include('footer.php');
?>

