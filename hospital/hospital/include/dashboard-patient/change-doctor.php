<?php 
session_start();
if(isset($_SESSION['userID']) && isset($_POST['app_id'])){
    include "../config.inc.php";
    $appointment = $_POST['app_id'];
    $actual_data = explode(",",$appointment);
    $doctor = $_POST['doc'];
    $query = "SELECT * FROM doctors WHERE doctor_email = '$doctor' AND specialization_ID = '".$actual_data[1]."'";
    if(mysqli_num_rows(mysqli_query($con,$query)) == 1){ //check valid data 
      $query = "UPDATE appointment_detail SET doctor_email = '$doctor' WHERE appointment_ID = '".$actual_data[0]."';";
      if(mysqli_query($con,$query)){              //if doctor gets updated
        echo "<p style='color:black'>Doctor Changed Successfully!</P>";        
      }
      else {
        echo "<p style='color:red'>Oops! Some problem occured.</P>";
      }
    }
    else {         //if data is not valid
      echo "<p style='color:red'>Error!</P>";
    }

}


?>