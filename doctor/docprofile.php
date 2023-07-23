<?php
session_start();

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Doctors Profile</title>
</head>
<body>
    <?php
    include("../include/header.php"); 
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style= "margin-left:-32px;">
                    <?php
                    include("docsidenav.php");
                    include("../include/connection.php");

                    ?>


                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE username='$doc'";

                                    $res =mysqli_query($connect,$query);

                                    $row = mysqli_fetch_array($res);

                                    ?>

                                    <div class="my-4">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan ="2" class="text-center" style="color:darkblue;"><h4>Doctor Details</h4></th>
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
                                                <td><b>Email</b></td>
                                                <td><?php echo $row['email']; ?></td>
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
                                                <td><b>Specialist Area</b></td>
                                                <td><?php echo $row['area']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Salary</b></td>
                                                <td><?php echo "Rs:" .$row['salary']. ""; ?></td>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Edit Username</h5>
                                    <?php 
                                    if(isset($_POST['change_uname'])) {
                                        $uname = $_POST['uname'];

                                        if(empty($uname)) {

                                        }else{
                                            $query = "UPDATE doctors SET username = '$uname' WHERE username = '$doc'";

                                            $res = mysqli_query($connect, $query);
                                            if($res){
                                                $_SESSION['doctor'] = $uname;
                                            }
                                        }

                                    }
                                    
                                    ?>
                                    <form method="post">
                                        <label>New Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off"
                                        placeholder="Enter New Username"> <br>

                                        <input type="submit" name="change_uname" class="btn btn-success" 
                                        placeholder="Change Username">
                                        

                                    </form>

                                    <h5 class="text-center my-2">Edit Password</h5>
                                    <?php 
                                    if ($_POST['change_pass']){
                                        $old = $_POST['old_pass'];
                                        $new = $_POST['new_pass'];
                                        $con = $_POST['con_pass'];

                                        $ol = "SELECT * FROM doctors WHERE username = '$doc'";

                                        $ols = mysqli_query($connect,$query);
                                        $row = mysqli_fetch_array($ols);


                                        if($old != $row['password']){

                                        }else if(empty($new)){

                                        }elseif($con !=$new){

                                        }else{
                                            $query = "UPDATE doctors SET password='$new' WHERE username='$doc'";

                                            mysqli_query($connect, $query);
                                        }


                                    }
                                    ?>
                                    <form method="post">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control" autocomplete="off"
                                        placeholder="Enter Old Password"> <br>
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control" autocomplete="off"
                                        placeholder="Enter New Password"> <br>
                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                        placeholder="Enter Confirm Password"> <br>
                                    </div>

                                    <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">



                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>
    
</body>
</html>