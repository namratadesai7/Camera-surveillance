<?php 
session_start();
include('dbcon.php');
if(isset($_POST['nvrId']))
{   
   $nvrId=$_POST['nvrId'];
   $nvr=$_POST['nvr'];
   $nvrName=$_POST['nvrName'];
   $date=$_POST['date']; 

   $sql1="SELECT COUNT(id) as count FROM Weekly_NVR WHERE date = '".$date[0]."' ";
   $run1=sqlsrv_query($conn,$sql1);
   $row1=sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);
   
   if($row1['count'] > 0){
      exit;
   }
   else{
      foreach ($nvrId as $key => $value) {
         $sql="INSERT INTO Weekly_NVR (NVR_id,NVR_Name,date,CreatedBy) VALUES('".$value."','".$nvrName[$key]."','".$date[$key]."','".$_SESSION['empid']."')";
         $run=sqlsrv_query($conn,$sql);
        }
   }

   if($run){
    echo("succesful");
   }
   else{
    echo("failed");
    print_r(sqlsrv_errors());
   }
}

//modal weekly
if(isset($_POST['saveweek'])){
   
   $NVR_id=$_POST['id'];
   $stat=$_POST['status'];
   $rem=$_POST['remark'];
   $days=$_POST['days'];
    
   $sql="UPDATE Weekly_NVR SET  Status='$stat',Days='$days', Remark='$rem',  UpdatedAt='".date('Y-m-d')."', UpdatedBy='".$_SESSION['empid']."' WHERE NVR_id= '$NVR_id'";
   $run=sqlsrv_query($conn,$sql);
   if($run){
       ?>
      <script>
         window.open('weekly.php','_self');
      </script>
<?php
   }else{
      print_r(sqlsrv_errors());
   }
}
?>