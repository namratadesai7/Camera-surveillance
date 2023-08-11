<?php
include('dbcon.php');

if(isset($_POST['date'])){
    $date=$_POST['date'];
?>

<table  class="table table-bordered table-hover mt-5" id="abc">
   <tr class="bg-secondary mt-5">
        <th>Sr</th>
        <th>MAchine</th>
        <th>Dept</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Category</th>
        <th>Remark</th>
        <th>Add Remark</th>                 
    </tr>
    <tbody >
    <?php
    $sr=1;
    $sql="SELECT * FROM machine WHERE date='$date'";
    $run=sqlsrv_query($conn,$sql);
    while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
    ?>
    <tr>          
        <td><?php echo $sr ?></td>
        <td><?php echo $row['Machine_name'] ?></td>
        <td><?php echo $row['Department'] ?></td>
        <td><?php echo $row['date']->format('d-m-Y') ?></td>
        <td><?php echo $row['Start_time']->format('H:i') ?></td>
        <td><?php echo $row['end_time']->format('H:i') ?></td>
        <td><?php echo $row['Catagory'] ?></td>
        <td><?php echo $row['Remark'] ?></td>
        <td><button type="button" class="btn btn-primary btn-sm mb-0 ms-5 category " id="<?php echo $row['ID'] ?>"> Add </button></td>
    </tr>
    <?php $sr++; } ?>
    </tbody>
</table>
<?php
}
?>
