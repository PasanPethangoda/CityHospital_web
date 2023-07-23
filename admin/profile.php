<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
</head>
<body>
    <?php
    include("../include/header.php");

    include("../include/connection.php");

    $ad = $_SESSION['admin'];

    $query = "SELECT * FROM admin WHERE username = '$ad'";

    $res = mysqli_query($connect,$query);

    while ($row = mysqli_fetch_array($res)){
        $username = $row['username'];
        
    }
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                <?php
                include("sidenav.php");
                ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-7" >
                                <div class="col-md-6">
                                    <?php 
                                if(isset($_POST['change'])){

                                    $uname = $_POST['uname'];

                                    if(empty($uname)){

                                }else{
                                    $query = "UPDATE admin SET username = '$uname' WHERE username = '$ad'";

                                    $res = mysqli_query($connect, $query);

                                    if($res){
                                        $_SESSION['admin'] = $uname;
                                        

                                    }
                                }
                            }
                            ?>
                       
                           <form method="post">
                           <h4 class="text-left" style="color:green"><b>EDIT ADMIN DETATILS</b></h4>

                           <h5 class="text-center my-2">Edit Username</h5>
                           <label>Enter New Username</label>
                                <input type= "text" name="uname" class="form-control" autocomplete="off"><br>
                                <input type="submit" name="change" value = "Change" class="btn btn-success">       
                            </form>
                            <br>

                            <?php 
                                if(isset($_POST['update_pass'])){

                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();

                                    $old = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$ad'");

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];

                                    if(empty($old_pass)){
                                        $error['p'] = "Enter Old Password";
                                    }else if(empty($new_pass)){
                                        $error['p'] = "Enter New Password";

                                    }else if(empty($con_pass)){
                                        $error['p'] = "Confirm New Password";
                                    }else if($old_pass != $con_pass){
                                        $error['p'] = "Invalid Password";
                                    }else if($new_pass != $con_pass){
                                        $error['p'] = "Both Password does not Match";
                                    }

                                        if(count($error)==0){
                                            $query = "UPDATE admin SET password= '$new_pass' WHERE username= '$ad'";

                                            mysqli_query($connect,$query);
                                        }
                                        
                                    }
                                
                                if (isset($error['p'])){

                                    $e = $error['p'];

                                    $show = "<h5 class= 'text-center alert alert-danger'>$e</h5>";
                                }else{
                                    $show = "" ;
                                }
                            ?>
                            
                            <form method="post"></form>
                                <h5 class="text-center my-2">Edit Password</h5>
                                <div>
                                    <?php
                                      echo $show; 
                                    ?>
                                </div>

                            <div class="form-group">
                                <label>Old Password</label>
                                <input type= "password" name="old_pass" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type= "password" name="new_pass" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type= "password" name="con_pass" class="form-control">
                            </div>
                            
                            <input type="submit" name="update_pass" value = "Update Password" class="btn btn-success">

                                   
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