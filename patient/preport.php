<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   
    <title>Patient Report</title>
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
            include("psidenav.php");
            ?>
         </div>
        </div>
    </div>
    </div>
    
</body>
</html>