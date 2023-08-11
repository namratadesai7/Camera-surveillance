<?php
include('dbcon.php');

if(isset($_POST['month'])){
    $m = $_POST['month'];
    $days = date('t', strtotime($m));
?>
<table class="table table-bordered  mt-5 ">
    <tr>
    <th style="width:5%;">Date</th>
    <?php 

for ($i=1; $i <= $days; $i++) {
    $date = date('Y-m-d', strtotime($m.'-'.$i));
    $day = date('D', strtotime($date));
    $date1 = date('d', strtotime($m.'-'.$i));
    
?>
 <th style="width:2%;"> <?php echo $date1 ?></th> 
<?php } ?>
</tr>
<tr>
  <th style="width:5%;">Day</th>
<?php 

for ($i=1; $i <= $days; $i++) {
    $date = date('Y-m-d', strtotime($m.'-'.$i));
    $day = date('D', strtotime($date));
    $date1 = date('d', strtotime($m.'-'.$i));

?>
 <th style="width:2%;"> <?php echo $day?></th> 
<?php } ?>
</tr>

<tr><th>TMachine</th>
<?php 

for ($i=1; $i <= $days; $i++) {
    $date = date('Y-m-d', strtotime($m.'-'.$i));
   
    $sql="SELECT COUNT(id) AS total FROM machine WHERE date='$date' ";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
   ?> 
   <td><?php echo $row['total'] ?></td>
<?php } ?>
</tr>

<tr><th>Remarks</th>
<?php
 for ($i=1; $i <= $days; $i++) {
    $date = date('Y-m-d', strtotime($m.'-'.$i));
   
    $sql="SELECT COUNT(Remark) AS TotalRemark FROM machine WHERE date='$date' AND Catagory is not NULL";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
<td><?php echo $row['TotalRemark']?></td>
<?php } ?>
 </tr>

 <tr><th>Pending</th>
<?php
 for ($i=1; $i <= $days; $i++) {
    $date = date('Y-m-d', strtotime($m.'-'.$i));
   
    $sql="SELECT COUNT(id) AS TotalNull FROM machine WHERE date='$date' AND Catagory is NULL";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
 <td><?php echo ($row['TotalNull'])?></td>
<?php } ?>
 </tr>

</table>

<?php
include('footer.php');
?>

<?php
    }
    ?>