<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    
    <title>All Patient Report</title>
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
                include("docsidenav.php");
                ?>

                </div>
                <div class="col-md-10">
                <h4 class="text-center my-4" style="color:brown;">ALL PATIENTS REPORTS</h4>
                    <?php
                    $query = "SELECT * FROM report";
                    $res = mysqli_query($connect,$query);

                    $output ="";

                    $output .= "
                    
                    <table class= 'table table-bordered'>
                    <tr>
                    <td><b>ID</b></td>
                     <td><b>Title</b></td>
                      <td><b>Message</b></td>
                      <td><b>Username</b></td>
                        <td><b>Date Send</b></td>
                    </tr>
                    "; 

                    if(mysqli_num_rows($res) < 1){
                        $output .= "
                        <tr>
                        <td class='text-center' colspan='6'>No Report Yet</td>
                        </tr>
                        ";
                    }
                
                    while($row = mysqli_fetch_array($res)){
                        $output .= "
                            <tr>
                            <td>" .$row['id']."</td>
                            <td>" .$row['title']."</td>
                            <td>" .$row['message']."</td>
                            <td>" .$row['username']."</td>
                            <td>" .$row['date_send']."</td>
                            </tr>
                        ";
                    }

                    $output .= "</tr></table>";

                    echo $output;


                    ?>

                </div>
            </div>
        </div>
    </div>
    
</body>
</html>