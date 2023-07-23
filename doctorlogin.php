<?php 
session_start();
include("include/connection.php");

if (isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();
   
    
    if(empty($uname)){
        $error['login'] = "Enter username";  
    }else if(empty($password)){
        $error['login'] = "Enter password";
    }

    if(count($error)==0){
        $query = "SELECT * FROM doctors WHERE username = '$uname' AND password = '$password'";

        $res = mysqli_query($connect,$query);

        if(mysqli_num_rows($res)){
            
            echo "<script>alert('Successfully Done')</script>";

            $_SESSION['doctor'] = $uname;

            header("Location:doctor/docindex.php");
            

        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }

    }

}

if(isset($error['login'])){
    $l = $error['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";

}else{
    $show ="";
}

?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Doctor Login Page</title>
</head>
<body style="background-image: url(img/bck2.jpg); background-repeat:no-repeat; background-size: cover;">  <!-- background img -->
    <?php
include("include/header.php");

    ?>
    <div style="margin-top:60px"></div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron my-3" style="background-color:#9bb9eb;">

                <h4 class="text-center my-2" style="color:blue;">DOCTOR LOGIN</h4>
                <div>
                    <?php echo $show;
                    ?>
                </div>

                 <form method ="post">
                    <div class="form-group">
                        <label><b>Username</b></label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter UserName">
                    </div>

                    <div class="form-group">
                        <label><b>Password</b></label>
                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>

                    <input type="submit" name="login" class="btn btn-success" value="Login">

                    <p>I don't have an account <a href="apply.php">Sign Up</a></p>


                 </form>
            </div>
            <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>