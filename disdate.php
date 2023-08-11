<?php
include('dbcon.php');
if(isset($_POST['disdate'])){
    $date=$_POST['disdate'];
?>
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
    $sql="SELECT a.id,b.id as wid,a.NVR,a.NVR_Name,b.NVR_id,format(b.date,'yyyy-MM-dd') as date,b.Status,b.Remark,b.Days FROM NVR_Master a join Weekly_NVR b on a.id=b.NVR_id
    where format(b.date,'dd-MM-yyyy') = '$date'";   
    $run=sqlsrv_query($conn,$sql);
    while($row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC)){
?>
    <tr>
        <td><input type="text" id="sr" name="nvrId[]" value="<?php echo $row['id']?>"></td>
        <td><input type="text" name="nvr[]" value="<?php echo $row['NVR']?>"></td>
        <td><input type="text" name="nvrName[]" value="<?php echo $row['NVR_Name']?>"></td>
        <td><input type="date" name="date[]" value="<?php echo $row['date'] ?>"></td>                       
        <td><input type="text" value="<?php echo $row['Status'] ?>"></td>
        <td> <input type="text" value="<?php echo $row['Remark'] ?>"></td>
        <td><button= type="button" class="btn btn-primary btn-sm mb-0 ms-5 addweek " id="<?php echo $row['NVR_id'] ?>">Add</button></td>
    </tr>
    <?php }  ?>
</table>
<?php
}
?>
