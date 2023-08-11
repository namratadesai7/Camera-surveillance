<?php 
include('dbcon.php');
session_start();

if(isset($_POST['mid'])){

    $mid = $_POST['mid'];
    $machine = $_POST['machine'];
    $dept = $_POST['dept'];
    $date = $_POST['date'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];

    foreach ($mid as $key => $value) {
        $sql="INSERT INTO machine (Machine_ID,Machine_name,Department,date,Start_time,end_time) VALUES('".$value."','".$machine[$key]."','".$dept[$key]."','".$date[$key]."','".$stime[$key]."','".$etime[$key]."')";
        $run = sqlsrv_query($conn,$sql);
    }

    if($run){
        echo 'Saved Successfully';
    }else{
        print_r(sqlsrv_errors());
    }
}
//modal camera
if(isset($_POST['save'])){
   
    $ID=$_POST['sr'];
   
    $cat=$_POST['cat'];
    $rem=$_POST['remark'];

    $sql="UPDATE machine SET Catagory='$cat', Remark='$rem', Catagory_At='".date('Y-m-d')."', Catagoty_By='".$_SESSION['empid']."' WHERE ID= '$ID'";
    $run=sqlsrv_query($conn,$sql);
    if($run){
        ?>
        <script>
            alert('updated successfully');
            window.open('entry.php','_self');
        </script>
        <?php
    }else{
        print_r(sqlsrv_errors());
    }

}

?>