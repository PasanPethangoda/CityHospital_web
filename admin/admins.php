<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>All Admins</title>
</head>
<body>

<?php

include("../include/header.php");
include("../include/connection.php");
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2"style="margin-left: -32px;">
                <?php
                include("sidenav.php");
                ?>
            </div>
            <div class="col-md-10">
                <h4 class="text-center my-4" style="color:blue"><b>ALL ADMIN DETATILS</b></h4>

                <?php

                $query = "SELECT * FROM admin";
                $res = mysqli_query($connect, $query);

                $output = "";

                $output = "
                
                <table class= 'table table-bordered table-hover'>
                     <tr>
                    
                      <td><b>ID</b></td>
                      <td><b>Firstname</b></td>
                      <td><b>Surname</b></td>
                      <td><b>Username</b></td>
                      <td><b>Phone</b></td>
                      <td><b>Gender</b></td>
                      <td><b>Branch</b></td>
                      <td><b>Date Reg.</b></td>

                     </tr>
                ";

                if(mysqli_num_rows($res) < 1) {
                  $output .="
                  
                  <tr>
                  <td class='text-center' colspan='10'>NO Admins Yet</td>
                  </tr>
                  
                  ";
                }

                while($row = mysqli_fetch_array($res)){
                           
                    $output .= "

                    <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['surname']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['gender']."</td>
                    <td>".$row['branch']."</td>
                    <td>".$row['date_reg']."</td>
                    
                    ";
                }

                $output .= "
                </tr>
                </table>";

                echo $output;


                ?>

            </div>
        </div>
    </div>
</div>
    
</body>
</html>