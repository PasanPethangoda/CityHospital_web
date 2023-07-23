<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Check Paitent Appoinment</title>
</head>
<body>
    <?php 
    include("../include/header.php");

    include("../include/connection.php"); 
    ?>

    <div class="containe-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                <?php

                include("docsidenav.php");

                ?>

                </div>
                <div class="col-md-10">
                    <h4 class="text-center my-4" style="color:purple;">VIEW APPOINTMENT</h4>

                    <?php
                    if(isset($_GET['id'])){

                        $id = $_GET['id'];

                        $query = "SELECT * FROM appointment WHERE id= '$id'";

                        $res = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($res);
                    }

                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td colspan="2" class="text-center" style="color:blue;"><b>Appoinment Details</b></td>
                                    </tr>
                                    
                                    <tr>
                                       <td><b>Firstname</b></td>
                                       <td><?php echo $row['firstname']; ?></td>
                                    </tr>

                                    <tr>
                                       <td><b>Surname</b></td>
                                       <td><?php echo $row['surname']; ?></td>
                                    </tr>

                                    <tr>
                                       <td><b>Gender</b></td>
                                       <td><?php echo $row['gender']; ?></td>
                                    </tr>

                                    <tr>
                                       <td><b>Phone No</b></td>
                                       <td><?php echo $row['phone']; ?></td>
                                    </tr>

                                    <tr>
                                       <td><b>Appoinment Date</b></td>
                                       <td><?php echo $row['appointment_date']; ?></td>
                                    </tr>

                                    <tr>
                                       <td><b>Symptoms</b></td>
                                       <td><?php echo $row['symptoms']; ?></td>
                                    </tr>



                                </table>

                            </div>

                            <div class="col-md-6">
                                <h5 class="text-center my-2" style="color:blue;">Invoice</h5>

                                <?php
                                if(isset($_POST['send'])){

                                    $fee = $_POST['fee'];
                                    $des = $_POST['des'];

                                    if(empty($fee)){

                                    }else if (empty($des)){

                                }else{

                                    $doc = $_SESSION['doctor'];

                                    $fname = $row['firstname'];


                                    $query = "INSERT INTO income(doctor,patient, 
                                    date_discharge,amount_paid,description) VALUES('$doc','$fname', NOW(),'$fee', '$des')";

                                    $res = mysqli_query($connect,$query);

                                    if($res){
                                        echo "<script>alert('You have sent invoice')</script>";

                                        mysqli_query($connect,"UPDATE appointment SET status='Discharge' WHERE id = '$id'");
                                    }
                                    
                                }
                            }
                                ?>

                                <form method="post">
                                    <label><b>Fee</b></label>
                                    <input type="number" name="fee" class="form-control"
                                     autocomplete="off" placeholder="Enter patient Fee"><br>

                                     <label><b>Description</b></label>
                                     <input type="text" name="des" class="form-control"
                                     autocomplete="off" placeholder="Enter Decsription">

                                     <input type="submit"  name="send"class="btn btn-info my-2" value="send">

                                </form>

                            </div>

                        </div>

                    </div>
                    
                </div>

            </div>

        </div>




    </div>

    
</body>
</html>