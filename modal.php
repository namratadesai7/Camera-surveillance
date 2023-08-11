<?php
include('dbcon.php');
$ID=$_POST['sr'];

$sql="SELECT * FROM machine WHERE ID='$ID'";
$run=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);
?>
  <div>
        <label style="width:100%;" for="cat">Catagory
            <select name="cat" id="cat" class="form-select">Catagory
                <option></option>
                <option value="OK">OK</option>
                <option value="Fault">Fault</option>
            </select>
        </label>
        <label style="width:100%;" for="remark" class="form-label mt-3">Remarks
                <input type="text" id="remark" name="remark" placeholder="Add remarks" class="form-control ">
        </label>
        <input type="hidden" value="<?php echo $row['ID']?>" name="sr">
  </div>