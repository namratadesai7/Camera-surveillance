<?php
session_start();
include('dbcon.php');
if(isset($_POST['empid'])){

    $empid=$_POST['empid'];
    $pwd=$_POST['pwd']; 

    $sql="SELECT * FROM [Workbook].[dbo].[user] where employee_id= '$empid'";
    $run= sqlsrv_query($conn,$sql);
    $row=sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);

    if($pwd==$row['password']){
        $_SESSION['Sr']= $row['Sr'];
        $_SESSION['empid']=$row['employee_id'];
        $_SESSION['name']=$row['user_name'];
       
        ?>
            <script>
                //  alert('User logged in');
                window.open('dashboard.php','_self');
            </script>
        <?php
    }else{
        ?>
        <script>
            alert('Password not match');
            window.open('index.php','_self');
        </script>
        <?php
    }
}
?>