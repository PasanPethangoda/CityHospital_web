<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   
    <title>View Patient Details</title>
</head>
<body>

<?php
   
     include("../include/header.php");
     include("../include/connection.php");
 

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -32px;">
            <?php
             include("sidenav.php");
            ?>
           </div>
           <div class="col-md-10">
            <h4 class="text-center my-3" style="color:green;"><b>VIEW PATIENT DETAILS</b></h4>

            <?php

            if(isset($_GET['id'])){

                $id = $_GET['id'];

                $query = "SELECT * FROM patient WHERE id = '$id'";
                $res = mysqli_query($connect,$query);

                $row = mysqli_fetch_array($res);

            }

            ?>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" colspan="2">Details</th>
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
                                <td><b>Username</b></td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>

                            <tr>
                                <td><b>Phone</b></td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>

                            <tr>
                                <td><b>Gender</b></td>
                                <td><?php echo $row['gender']; ?></td>
                            </tr>

                            <tr>
                                <td><b>Branch</b></td>
                                <td><?php echo $row['branch']; ?></td>
                            </tr>

                            <tr>
                                <td><b>Date Registered</b></td>
                                <td><?php echo $row['date_reg']; ?></td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>



           </div>
        </div>
    </div>
</div>

    
</body>
</html>