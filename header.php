<?php
session_start();
    if(!isset($_SESSION['name'])){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css"/>
    

</head>
<body>
<div >
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h3><i class="fa-solid fa-earth-americas"></i><span>SEPL</span></h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                    <li>
                        <a href="dashboard.php" id="dashboard"><i class="fa-solid fa-house"></i>
                        <span>Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="entry.php" id="entery"><i class="fa-solid fa-video"></i>
                            <span>Camera</span>
                        </a>
                    </li>  
                     <li>
                        <a href="report.php" id="report"><i class="fa-solid fa-file"></i>
                            <span>Report</span>
                        </a>
                    </li> 
                    <li>
                        <a href="weekly.php" id="weekly"><i class="fa-solid fa-calendar-week"></i>
                            <span>Weekly</span>
                        </a>
                    </li>
                    <li>
                        <a href="wreport.php" id="rweekly"><i class="fa-solid fa-calendar-week"></i>
                            <span>Report-weekly</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                        </a>
                    </li>
            </ul>
    
    
        </div>
   </div>
   <div class="main-content">
        <header>
            <div class="header-title">
                <label for="nav-toggle">
                    <i class="fa-solid fa-bars"></i> 
                </label> 
                <span>Dashboard</sapn> 
            </div>

            <!-- <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input  type="search" placeholder="search here"/>
            </div> -->

            <div class="user-wrapper">
                <img src="images/abcd.jpg" width="40px" height="30px" alt="">
                <div>
                       
                    <small >Super admin</small>
                </div>
            </div>
        </header>       

     

<main>
