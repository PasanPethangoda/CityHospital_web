<?php 
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Profile</title>
</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");
    
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php 
                    include("psidenav.php");
                    ?>



                </div>
                
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                            <h4 class="text-center my-3" style="color:orange;">MY PROFILE</h4>

                                <?php
                                    $patient = $_SESSION['patient'];
                                    $query = "SELECT * FROM patient WHERE username='$patient'";

                                    $res =mysqli_query($connect,$query);

                                    $row = mysqli_fetch_array($res);

                                    ?>
                                    
                                    <table class="table table-bordered">
                                            <tr>
                                                <th colspan ="2" class="text-center" style="color:darkblue;">Patient Details</th>
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
                                                <td><b>Age</b></td>
                                                <td><?php echo $row['age']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Gender</b></td>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Branch</b></td>
                                                <td><?php echo $row['branch']; ?></td>
                                            </tr>

                                           
                                        </table>
                                 
                                

                            </div>

                            <div class="col-md-6">
                            <h5 class="text-center my-3">Edit Username</h5>
                                    <?php 
                                    if(isset($_POST['update'])) {
                                        $uname = $_POST['uname'];

                                        if(empty($uname)) {

                                        }else{
                                            $query = "UPDATE patient SET username = '$uname' WHERE username = '$patient'";

                                            $res = mysqli_query($connect, $query);
                                            if($res){
                                                $_SESSION['patient'] = $uname;
                                            }
                                        }

                                    }
                                    
                                    ?>
                                    <form method="post">
                                        <label>Edit Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off"
                                        placeholder="Enter New Username"> <br>

                                        <input type="submit" name="update" class="btn btn-success" 
                                        placeholder="Change Username">
                                        

                                    </form>

                                    <?php 
                                    if(isset($_POST['change'])){
                                        $old = $_POST['old_pass'];
                                        $new = $_POST['new_pass'];
                                        $con = $_POST['con_pass'];

                                        $q = "SELECT * FROM patient WHERE username = '$patient'";

                                        $re = mysqli_query($connect,$q);
                                        $row = mysqli_fetch_array($re);

                                        if(empty($old)){
                                            echo "<script>alert('Enter Old Password ')</script>";

                                        }else if(empty($new)){
                                            echo "<script>alert('Enter New Password')</script>";

                                        }else if($con != $new){
                                            echo "<script>alert('Both Password do not match')</script>";
                                        }else if($old != $row['password']){
                                            echo "<script>alert('Check the Password')</script>";

                                        }else{
                                            $query = "UPDATE patient SET password='$new' WHERE username='$patient'";

                                            mysqli_query($connect, $query);
                                        }

                                    }
                                    ?>
                                     <h5 class="text-center my-2">Edit Password</h5>
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

                                    <input type="submit" name="change" class="btn btn-info" value="Change Password">



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

