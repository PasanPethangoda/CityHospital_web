<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   
    <title>Book Appointment</title>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md" style="margin-left: -32px;">
                <?php
                include("psidenav.php");
                
                ?>
              </div>
              <div class="col-md-10">
              <h4 class="text-center my-4" style="color:orange;">BOOK DOCTOR APPOINTMENT</h4>
                <?php
                  $pat = $_SESSION['patient'];
                  $sel =mysqli_query($connect,"SELECT * FROM patient WHERE username='$pat'");

                 $row = mysqli_fetch_array($sel);

                  $firstname = $row['firstname'];
                  $surname = $row['surname'];
                  $gender = $row['gender'];
                  $phone = $row['phone'];

                  $error = array();

                  if(isset($_POST['book'])){
                    $date = $_POST['date'];
                    $sym = $_POST['sym'];


                    if(empty($sym)){

                    }else{
                        $query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date,symptoms,status,date_booked)
                         VALUES('$firstname','$surname','$gender','$phone','$date','$sym','Pendding',NOW())";

                         $res = mysqli_query($connect,$query);

                         if($res){
                            echo"<script>alert('Successfully!!! You booked on appoinment')</script>";
                         }else{
                            echo"<script>";
                         }
                    }
                  }

                ?>

                <div class="col=md-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 jumbotron">
                            <form method="post">

                            <div class="form-group">

                            <label><b>Select Doctor</b></label>
                            <select name="doctor" class="form-control">
                                <option value="">Select Doctor</option>
                                <option value="d1">Dr.Prasnna Perera</option>
                                <option value="d2">Dr.Nilanka Dias </option>
                                <option value="d3">Dr.Sanjeewa Fernando</option>
                                <option value="d4">Dr.Upul Gunasekara</option>
                                <option value="d5">Dr.Janaka Perera </option>
                                <option value="d6">Dr.Lalith Kannangara </option>
                                <option value="d7">Dr.Ruwan Gunathilka</option>
                                <option value="d8">Dr.Gamini De Silv </option>
                                <option value="d9">Dr.Nimal Zoysa </option>
                                <option value="d10">Dr.Avishka Mendis</option>
                            </select><br>

                            <label><b>Select Branch</b></label>
                            <select name="branch" class="form-control">
                                <option value="">Select Branch</option>
                                <option value="Galle">Galle</option>
                                <option value="Kurunagala">Kurunagala</option>
                                <option value="Jaffna">Jaffna</option>
                            </select>
                        </div>
                                
                                <label><b>Appoinment Date</b></label>
                                <input type="date" name="date" class="form-control"><br>

                                <label><b>Your Symptoms</b></label>
                                <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Your Symptoms"><br>
                                <input type="submit" name="book" class="btn btn-info my-2" value="Book Appoinment">
                                

                            </form>

                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>

              </div>
            </div>
        </div>
    </div>
    
</body>
</html>