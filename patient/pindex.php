<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paitent's Dashboard</title>
</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style = "margin-left:-30px;">
                <?php
                include("psidenav.php");

                ?>
               
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <h4 class="my-4 text-center" style="color:green;">PATIENT DASHBOARD</h4>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 my-2 bg-danger mx-4" style="height:150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My Profile</h5>

                                        </div>
                                        <div class="col-md-4">
                                           <a href="patprofile.php"> <i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
                                        </a>

                                        </div>

                                    </div>
                                </div>

                                </div>


                                <div class="col-md-3 my-2 bg-dark mx-4" style="height:150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">Book Appointment</h5>
                                          
                                        </div>
                                        <div class="col-md-4">
                                           <a href="appointment.php"> <i class="fa  fa-calendar fa-3x my-4" style="color:white;"></i></a>

                                        </div>

                                    </div>
                                </div>

                                </div>

                                <div class="col-md-3 my-2 bg-success mx-4" style="height:150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4" >My Invoice</h5>

                                        </div>
                                        <div class="col-md-4">
                                           <a href="invoice.php"> <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i></a>

                                        </div>

                                    </div>
                                </div>

                                </div>
                                

                                
                            </div>

                        </div>

                        <?php 
                        if(isset($_POST['send'])){
                            $title = $_POST['title'];
                            $message = $_POST['message'];

                            if(empty($title)){

                            }else if(empty($message)){

                            }else{
                                $user = $_SESSION['patient'];
                                $query ="INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user', NOW())";

                                $res = mysqli_query($connect,$query);
                                
                                if ($res){
                                  echo"<script>alert('Successfully !!! You have sent your Report')</script>";
                                }
                            }
                        }
                        
                        
                        
                        ?>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron bg-info my-5 shadow p-3 bg-body rounded">
                                    <h5 class="text-center my-2">Send Your Report</h5>
                                    <form method="post">
                                        <label>Report Name</label>
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the Report"><br>

                                        <label>Message To Doctor</label>
                                        <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">

                                        <input type="submit" name="send" value="Send Report" class="btn btn-success my-3">

                                    </form>

                                </div>
                                <div class="col-md-3"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    
</body>
</html>