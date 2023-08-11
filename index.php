<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <style>
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {     /*   remove up down arrows for number type*/
                -webkit-appearance: none;
                margin: 0;
            }
        </style> 
</head>
<body>
<?php
     if(isset($_SESSION['name'])){
        header('location:dashboard.php');
    }
    ?>
<div class="hero">
    <div  class="form-box">
        <form  action="add_db.php" method="post" id="login" class="input-group">
            <div class="logo">
            <img src="suyoglogo.png" alt="Girl in a jacket" class="image" width="80" height="70" > 
            </div>
            <div class="reel ">
            <input type="number" placeholder="Emp Id" class="input-field " name="empid" require>
            <input type="password" placeholder="Enter password" class="input-field" name="pwd" require> 
            </div>
            <div class="forget">
               <a href="forget-password.php" style="font-weight:20; height:40px; text-decoration:none;">Forget password?</a>
            </div>
            <div class="abc">
            <button  style="background-color:#de5b7c;border:none;"type="submit" class="btn btn-success btn-bg rounded-pill mt-60 px-3 btn" name="login" form="login"  >Submit</button>
            </div>
        </form>
    </div>
</div>   
</body>
</html>