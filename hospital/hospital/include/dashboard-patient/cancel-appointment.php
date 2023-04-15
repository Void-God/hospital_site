<?php
  session_start(); 
  if(isset($_SESSION['userID'])&&$_POST['app']){
    require "../config.inc.php";
    $appointment = $_POST['app'] ;
    if($_SESSION['priv'] == 'patient'){
    $query = "SELECT * FROM appointment_detail WHERE appointment_ID='$appointment' AND patient_email = '".$_SESSION['userID']."';" ;
    }
    else if($_SESSION['priv'] == 'doctor'){
      $query = "SELECT * FROM appointment_detail WHERE appointment_ID='$appointment' AND doctor_email = '".$_SESSION['userID']."';" ;      
    }
    $query_run = mysqli_query($con,$query);
    $detail = mysqli_fetch_assoc($query_run);


    if(mysqli_num_rows($query_run) == 1){        //if there is no false information
      $valid = ['applied','reschedule'];
      $query = "UPDATE appointment_detail SET appointment_status = 'cancelled' WHERE appointment_ID = '$appointment'";
      if(in_array($detail['appointment_status'],$valid)){           //check validity 
          if(mysqli_query($con,$query)){
            echo "<p style='color:black'>Appointment cancelled Successfully!</P>"; 
            echo "<script>$('#reson_alt').load(document.URL +  ' #reson_alt');</script>";
          }
          else {
            echo "<p style='color:black'>problem occured!</P>"; 
          }
      }
      else {           //validity failed
          echo "<p style='color:red'>Error!</P>";
      }
    } 

    else {                        //if there is some false information
      echo "<p style='color:red'>Error!</P>";
    }
  }
?>
