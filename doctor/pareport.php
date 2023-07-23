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
                include("docsidenav.php");

                ?>
               
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <h4 class="my-4 text-center" style="color:green;">PATIENT REPORT</h4>
                        <div class="col-md-12">
                            <div class="row">
                    
                                
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
                                  echo"<script>alert('Successfully !!! Sent the Report')</script>";
                                }
                            }
                        }
                        
                        
                        
                        ?>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 jumbotron bg-info my-5 shadow p-3 bg-body rounded">
                                    <h5 class="text-center my-2">Send Patient Report</h5>
                                    <form method="post">
                                  
                                        <label><b>Report Title</b></label>
                                        <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the Report"><br>

                                        <label><b>Message</b></label>
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