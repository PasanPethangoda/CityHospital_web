<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab Report</title>
</head>
<body >

<?php
include("../include/header.php");

?>
   
    <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -32px;">
            <?php
            include("psidenav.php");
            ?>
         </div>
         <div class="col-md-10">
              <h4 class="text-center my-4" style="color:purple;">PATIENT LAB REPORT</h4>
              <div class="row">
                <div class="col-md-3"> 
                   
                </div>
                <div class="col-md-6 jumbotron">
                    <form method="post" class="my-2">
                        <div class="form-group" >
                            <h4 class='text-center' style='color:red;'>LAB REPORT</h4>
                            <label>Bill Referecnce No</label>
                            <input type="text"  name="uname" class="form-control" placeholder="Enter Bill Reference No " autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="pass" class="form-control" placeholder="Enter Email">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Sent">
           </div>
        </div>
    </div>
    </div>
    


    <!--<div class="container">
        <div class="col-md-12">
        <h4 class="text-center my-4" style="color:purple;"> PATIENT LAB REPORT</h4>

            <div class="row">
                <div class="col-md-3"> 
                   
                </div>
                <div class="col-md-6 jumbotron">
                    <form method="post" class="my-2">
                        <div class="form-group" >
                            <h4 class='text-center' style='color:red;'>LAB REPORT</h4>
                            <label>Bill Referecnce No</label>
                            <input type="text"  name="uname" class="form-control" placeholder="Enter Bill Reference No " autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="pass" class="form-control" placeholder="Enter Email">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Sent">-->

                    
                      <!--  <?php 
                        echo "<script>alert('Succuessfully Sent Your Report in your email')</script>"
                        ?> -->
                       

                  <!--  </form>
                </div>
                <div class="col-md-3"></div>

            </div>

        </div>
    </div> -->
    
    
</body>
</html>