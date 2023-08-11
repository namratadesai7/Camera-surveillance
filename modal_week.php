<?php
include('dbcon.php');
if(isset($_POST['sr'])){
$id = $_POST['sr'];

$sql="SELECT * FROM Weekly_NVR WHERE NVR_id='$id'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>

<div>
      <label style="width:100%;" for="status" class="form-label mt-3">Status
            <select onchange="yesnoCheck(this);" class="form-select" name="status" id="status">
                  <option value="Working OK">Working OK</option>
                  <option value="NOT Working OK">NOT Working OK</option>
            </select>            
      </label>
      <div class="m-0" id="ifYes" style="display: none;">
            <label style="width:100%;" class="form-label " for="days">No. of Days
            <input  class="form-control" type="number" placeholder="Add days" id="days" name="days" value="" /> 
            </label> 
      </div>
      <label style="width:100%;" for="remark" class="form-label ">Remarks
            <input type="text" id="remark" name="remark" placeholder="Add remarks" class="form-control ">
      </label>

      <input type="hidden" value="<?php echo $row['NVR_id']?>" name="id"> 
</div>
<?php
}
?>
<script>
function yesnoCheck(that) {
    if(that.value == "NOT Working OK") {
      document.getElementById("ifYes").style.display = "block";
    }else {
      document.getElementById("days").value="NULL";
      document.getElementById("ifYes").style.display = "none";
    
    }
}
</script>
