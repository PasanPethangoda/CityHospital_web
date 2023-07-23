<?php
include("include/connection.php");

if(isset($_POST['apply'])){
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if(empty($firstname)) {
        $error['apply'] = "Enter Firstname";    
    }else if(empty($surname)){
        $error['apply'] = "Enter Surname"; 
    }else if(empty($username)){
        $error['apply'] = "Enter Username";  
    }else if(empty($email)){
        $error['apply'] = "Enter Email Address";  
    }else if($gender == ""){
        $error['apply'] = "Select Your Gender"; 
    }else if(empty($phone)){
        $error['apply'] = "Enter your phone number";  
    }else if($branch == ""){
        $error['apply'] = "Select your branch";
    }else if(empty($password)){
        $error['apply'] = "Enter your password";
    }else if($confirm_password != $password){
        $error['apply'] = "Both Password do not match";
    }
    if(count($error) == 0){
        $query = "INSERT INTO admin (firstname,surname,username,email,gender,phone,branch,password,date_reg) 
        VALUES('$firstname','$surname','$username','$email','$gender','$phone','$branch','$password',NOW())";

        $result = mysqli_query($connect,$query);

        if($result){
            echo "<script>alert('You have Successfully Applied')</script>";
            header("Location:adminlogin.php");
        }else{
            echo "<script>alert('Failed Applied')</script>";
        }


    }
}

if(isset($error['apply'])){
    $s = $error['apply'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";

}else{
    $show = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
</head>
<body>
    <?php
    include("include/header.php");

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron" style="background-color:#cbcbd1;">
                    <h4 class="text-center" style="color:purple;">NEW ADMIN REGISTRATION</h4>

                    <div>
                        <?php echo $show; 
                        ?>

                    </div>

                    <form method="post">
                    <div class="form-group">
                    <label><b>Firstname</b></label>
                    <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                    </div>
                       

                        <div class="form-group">
                         <label><b>Surname</b></label>
                         <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname">
                        </div>

                        <div class="form-group">
                          <label><b>Username</b></label>
                          <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        
                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" 
                            value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?> ">
                        </div>

                        <div class="form-group">
                            <label><b>Select Gender</b></label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><b>Phone Number</b></label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" 
                            value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?> ">
                        </div>

                        <div class="form-group">
                            <label><b>Select Branch</b></label>
                            <select name="branch" class="form-control">
                                <option value="">Select Branch</option>
                                <option value="Galle">Galle</option>
                                <option value="Kurunagala">Kurunagala</option>
                                <option value="Jaffna">Jaffna</option>
                            </select>
                            </div>

                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                           
                        <div class="form-group">
                            <label><b>Confirm Password</b></label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>

                        <input type="submit" name="apply" class="btn btn-success" value="Apply Now">
                        <p>I already have an account <a href ="adminlogin.php">Login</a></p>
           
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>