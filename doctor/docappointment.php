<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
     <title>Total Appoinment</title>
</head>
<body>
    <?php

    include("../include/header.php");
    include("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                <?php
                include("docsidenav.php");

                ?>

                </div>
                <div class="col-md-10">
                <h4 class="text-center my-4" style="color:brown;">ALL APPOINTMENTS</h4>

          

                    <?php 
                    $query = "SELECT * FROM appointment WHERE status = 'Pendding'";

                    $res = mysqli_query($connect, $query);

                    $output = "";

                    $output .= "
                    
                    <table class= 'table table-bordered table-hover'>
                    <tr>
                    <td><b>ID</b></td>
                    <td><b>Firstname</b></td>
                    <td><b>Surname</b></td>
                    <td><b>Gender</b></td>
                    <td><b>Phone</b></td>
                    <td><b>Appoinment Date</b></td>
                    <td><b>Symptoms</b></td>
                    <td><b>Date Booked</b></td>
                    <td><b>Action</b></td>
                    
                    </tr>
                    ";
                    
                    if(mysqli_num_rows($res) < 1){
                        
                        $output .= "
                        <tr>
                        <td class='text-center' colspan='8'>No Appoinment Yet</td>
                        
                        </tr>
                        
                        
                        "; 

                    }
                    while($row = mysqli_fetch_array($res)){
                        $output .= "
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['surname']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['appointment_date']."</td>
                        <td>".$row['symptoms']."</td>
                        <td>".$row['date_booked']."</td>
                        <td>
                        <a href='discharge.php?id=".$row['id']."'><button class='btn btn-info'>Check</button></a>
                        
                        
                        </td>
                        


                        
                        
                        </tr>
                        
                        
                        ";

                    }

                    $output .= "</tr> </table>";

                    echo $output;

                    ?>
                </div>

            </div>

        </div>




    </div>
    
</body>
</html>