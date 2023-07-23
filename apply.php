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
    $area = $_POST['area'];
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
    }else if($area == ""){
        $error['apply'] = "Select your Specialist Area";
    
    }else if(empty($password)){
        $error['apply'] = "Enter your password";
    }else if($confirm_password != $password){
        $error['apply'] = "Both Password do not match";
    }
    if(count($error) == 0){
        $query = "INSERT INTO doctors (firstname,surname,username,email,gender,phone,branch,area,password,salary,data_reg) 
        VALUES('$firstname','$surname','$username','$email','$gender','$phone','$branch','$area','$password','0',NOW())";

        $result = mysqli_query($connect,$query);

        if($result){
            echo "<script>alert('You have Successfully Applied')</script>";
            header("Location:doctorlogin.php");
        }else{
            echo "<script>alert('Failed')</script>";
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
    <title>Doctor Registration</title>
</head>
<body>
    <?php
    include("include/header.php");

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron" style="background-color:#9bb9eb;">
                    <h4 class="text-center" style="color:blue;">NEW DOCTOR REGISTRATION</h4>

                    <div>
                        <?php echo $show; 
                        ?>

                    </div>

                    <form method="post">
                    <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                    </div>
                       <!-- <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname"  
                            value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?> ">
                        </div>-->

                    <div class="form-group">
                         <label>Surname</label>
                         <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname">
                    </div>

                        <!--<div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname" 
                            value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?> ">
                        </div>-->

                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                         </div>

                       <!-- <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" 
                            value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?> ">
                        </div>-->
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" 
                            value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?> ">
                        </div>

                        <div class="form-group">
                            <label>Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" 
                            value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?> ">
                        </div>

                        <div class="form-group">
                            <label>Select Branch</label>
                            <select name="branch" class="form-control">
                                <option value="">Select Branch</option>
                                <option value="Galle">Galle</option>
                                <option value="Kurunagala">Kurunagala</option>
                                <option value="Jaffna">Jaffna</option>
                            </select>
                        </div>

                      <div class="form-group">
                            <label>Specilist Area</label>
                            <select name="area" class="form-control">
                                <option value="">Select Area</option>
                                <option value="FamilyPhysicians">Family Physicians</option>
                                <option value="Allergists">Allergists</option>
                                <option value="Anesthesiologists">Anesthesiologists</option>
                                <option value="Cardiologists">Cardiologists</option>
                                <option value="EmergencyMedicineSpecialists">Emergency Medicine Specialists</option>
                                <option value="SportsMedicineSpecialists">Sports Medicine Specialists</option>
                                <option value="GeneralSurgeons">General Surgeons</option>
                            
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                           
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>

                        <input type="submit" name="apply" class="btn btn-success" value="Apply Now">
                        <p>I already have an account <a href ="doctorlogin.php">Login</a></p>
                       
                        

                        
                       
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>