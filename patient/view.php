<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Invoice</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-32px;">

                <?php
                
                include("psidenav.php");
  
                
                ?>
                    
                </div>
                <div class="col-md-10">
                    <h4 class="text-center my-4" style="color:purple;">VIEW PATIENT INVOICE</h4>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM income WHERE id = '$id'";
                                    $res = mysqli_query($connect, $query);

                                    $row = mysqli_fetch_array($res);
                                }

                                ?>
                                <table class="table table-bordered"><br>
                                    <tr>
                                        <th colspan="2" class="text-center" style="color:darkblue;"><h5>Invoice Details</h5></th>
                                    </tr>

                                    <tr>
                                        <td><b>Doctor</b></td>
                                        <td><?php echo $row['doctor']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td><?php echo $row['patient']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Date Dischatge</b></td>
                                        <td><?php echo $row['date_discharge']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Amount Paid (Rs.)</b></td>
                                        <td><?php echo $row['amount_paid']; ?></td>
                                    </tr>

                                    <tr>
                                        <td><b>Description</b></td>
                                        <td><?php echo $row['description']; ?></td>
                                    </tr>
                                     
                                </table>
                            </div>
                            <div class="col-md-3"></div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


    </div>
    
</body>
</html>