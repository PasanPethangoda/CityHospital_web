<?php
include("include/connection.php");


if (isset($_POST['create'])){

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $branch = $_POST['branch'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];

    $error = array();

    if (empty($fname)) {
        $error['ac'] = "Enter Firstname";
    }else if (empty($sname)){
        $error['ac'] = "Enter Surname";
    }else if (empty($uname)){
        $error['ac'] = "Enter Surname";
    }else if (empty($phone)){
        $error['ac'] = "Enter Phone Number";
    }else if (empty($age)){
        $error['ac'] = "Enter Your Age";
    }else if ($gender == ""){
        $error['ac'] = "Select Your Gender";
    }else if ($branch == ""){
        $error['ac'] = "Select Your Branch";
    }else if (empty($password)){
        $error['ac'] = "Enter Password";
    }else if ($con_pass != $password){
        $error['ac'] = "Both password do not match";
    }

    if(count($error) ==0) {

        $query = "INSERT INTO patient(firstname,surname,username,phone,age,
         gender,branch,password,date_reg) VALUES('$fname','$sname','$uname',
         '$phone','$age','$gender','$branch','$password',NOW())";

         $res= mysqli_query($connect,$query);

         if($res) {
            header("Location:patienlogin.php");
         }else{
            echo "<script>alert('failed')</script>";
         }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Patient Registration</title>
</head>
<body>
    
<?php
include("include/header.php");

?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-2 jumbotron" style="background-color:#bbe0ed;">
                <h4 class="text-center my-1" style="color:green;">NEW PATIENT REGISTRATION</h4>

                <form method="post">
                    <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                    </div>

                    <div class="form-group">
                    <label>Surname</label>
                    <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname">
                    </div>

                    <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                    <label>Phone No</label>
                    <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                    </div>

                    <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" autocomplete="off" placeholder="Enter Your Age">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Your Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Branch</label>
                        <select name="branch" class="form-control">
                            <option value="">Select Your Branch</option>
                            <option value="Galle">Galle</option>
                            <option value="Kurunagala">Kurunagala</option>
                            <option value="Jaffna">Jaffna</option>
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
                    <input type="submit" name="create" value="Create Account" class="btn btn-info">

                    <p> I already have an account <a href="patienlogin.php">Login</a></p>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>

</body>
</html>