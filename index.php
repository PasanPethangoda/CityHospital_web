<!DOCTYPE html>
<html>
<head>
    <title>City Hospital</title>
</head>
<body style="background-image: url(img/hm4.jpg); background-repeat:no-repeat; background-size: cover;">
<?php 
include("include/header.php");  
?>

<div style="margin-top:100px"></div>

<div class="container">
    <div class="col-md-12">
        <div class="row">

        <div class="col-md-3 mx-3 shadow">
                <img src="img/admin.jpg" style="width:100%; height:200px;">
                <h5 class="text-center" style="color:black;"><b>ADMIN LOGIN</b></h5>
                <a href="adminlogin.php">
                    <button class="btn btn-success my-3" style="margin-left:30%; background-color:green;"><h5>Admin</h5></button>
                </a>

            </div>   

            <div class="col-md-4 mx-3 shadow">
                <img src="img/d1.png" style="width:100%; height:200px;">
                <h5 class="text-center" style="color:black;"><b>DOCTOR LOGIN</b></h5>
                <a href="doctorlogin.php">
                    <button class="btn btn-success my-3" style="margin-left:35%; background-color:green;"><h5>Doctor</h5></button>
                </a>
            
            </div>

            <div class="col-md-4 mx-2 shadow">
                <img src="img/p2.png" style="width:100%;  height:195px;">
                <h5 class="text-center" style="color:black;"><b>PATIENT LOGIN</b></h5>
                <a href="patienlogin.php">
                    <button class="btn btn-success my-4" style="margin-left:35%; background-color:green;"><h5>Patient</h5></button>
                </a>
                
            </div>

            

             
</body>
</html>