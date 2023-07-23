<?php 
session_start();
include("include/connection.php");

if (isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();
    
    if(empty($username)){
        $error['admin'] = "Enter username";  
    }else if(empty($password)){
        $error['admin'] = "Enter password";

    }

    if(count($error)==0){

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result)==1){
            echo "<script>alert('Successfully')</script>";

            $_SESSION['admin'] = $username;

            header("Location:admin/adindex.php");
            exit();

        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body style="background-image: url(img/hm1.jpg); background-repeat:no-repeat; background-size: cover;">
    <?php
    include("include/header.php");
   
    
    ?>
    
    <div style="margin-top:80px"></div>


    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron"  style="background-color:#f0e5c9;">
                    <form method="post" class="my-2">
                        <div>
                        <?php 

                        if(isset($error['admin'])){
                            $sh = $error['admin'];

                            $show = "<h4 class='alert alert-danger'>$sh</h4>";

                            echo $show;
                        }else{
                            $show = "";

                        }

                        echo $show;

                        ?>
                        </div>

                        <div class="form-group">
                            <h4 class='text-center' style='color:purple;'>ADMIN LOGIN</h4>
                            <label><b>Username</b></label>
                            <input type="text"  name="uname" class="form-control" placeholder="Enter Username" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                        <p>I don't have an account <a href="adminapply.php">Sign Up</a></p>

                    </form>
                </div>
                <div class="col-md-3"></div>

            </div>

        </div>

    </div>
    
</body>
</html>