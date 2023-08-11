<?php 
include('header.php'); 
include('dbcon.php');
// $sql = "SELECT count(Sr) as todayCount FROM Table_1 where Date= '".date('Y-m-d')."'";
// $run = sqlsrv_query($conn,$sql);
// $row = sqlsrv_fetch_array($run,SQLSRV_FETCH_ASSOC);

// $sql1 = "SELECT count(Sr) as totalCount FROM Table_1";
// $run1 = sqlsrv_query($conn,$sql1);
// $row1 = sqlsrv_fetch_array($run1,SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container-fluid ">
        <div class="cards">
            <div class="card-single">
                    <div>
                        <!-- <h1><?php echo $row['todayCount'] ?></h1>
                        <span><?php echo date('d-m-Y'); ?></span> -->
                        <h1>abc</h1>
                        <span>xyz</span>
                    </div>
                    <div>
                        <div class="la la-users"></div>
                    </div>
            </div>    
        
            <div class="card-single">
                    <div>
                        <!-- <h1><?php echo $row1['totalCount'] ?></h1> -->
                        <h1>adf</h1>
                        <span>Total Gatepass</span>
                    </div>
                    <div>
                        <div class="la la-clipboard"></div>
                    </div>
            </div> 
            <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <div class="la la-users"></div>
                    </div>
            </div> 
            <div class="card-single">
                    <div>
                        <h1>6k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <div ><i width="30px;"class="fa-sharp fa-solid fa-indian-rupee-sign"></i></div>
                    </div>
            </div>
        </div>
    
        <div class="recent-grid">
                 <div class="projects">
                        <div class="card">   
                            <div class="card-header">
                                <h3>Recent Projects</h3>
                                <button>See all<span class="las la-arrow-right"></span></button>
                            </div>

                            <div class="card-body">
                                <table width="100%"> 
                                    <thead>
                                        <tr>
                                            <th>Project Title</th>
                                            <th>Department </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>    
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                        
                                            <td>    
                                                <span class="status pink"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team </td>
                                            <td>    
                                                <span class="status orange"></span>
                                                pending     
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                        
                                            <td>    
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web Development</td>
                                            <td>Frontend</td>
                                        
                                            <td>    
                                                <span class="status pink"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team </td>
                                            <td>    
                                                <span class="status orange"></span>
                                                pending     
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team </td>
                                            <td>    
                                                <span class="status orange"></span>
                                                pending     
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="customers">
                        <div class="card">    
                            <div class="card-header">
                                <h3>New Customer</h3>
                                <button>See all<span class="las la-arrow-right></span"></span></button>
                            </div>

                            <div class="card-body">
                                <div class="customer">
                                    <img src="images/abcd.jpg" width="40px" height="40px" alt="">
                                    <h4>Lewis S. Cunningham</h4>
                                    <small>CEO Except</small>
                                </div>
                            </div>
                            <span class="las la-user-circle"></span>    
                            <span class="las la-comment"></span> 
                            <span class="las la-phone"></span> 
                        </div>
                    </div>
         </div>
</div>
</body>
</html>
<script>
    $('#dashboard').addClass('active');
</script>
<?php include('footer.php'); ?>