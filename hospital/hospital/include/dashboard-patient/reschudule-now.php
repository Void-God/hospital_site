<?php 
  session_start();
  // sleep(2);
  if(isset($_SESSION['userID']) && isset($_POST['app'])){
    require "../config.inc.php";
    $time = $_POST['time'];
    $date = $_POST['date'];
    $appointment = $_POST['app'];
    $query = "SELECT * FROM appointment_detail WHERE appointment_ID='$appointment' AND patient_email = '".$_SESSION['userID']."';" ;
    $query_run = mysqli_query($con,$query);
    $detail = mysqli_fetch_assoc($query_run);   
    $date_now = date("Y-m-d");
    if ($date_now > $_POST['date']) {
      echo "<p style='color:red'>Please check the date</p>";              
      exit();
    }

    if(mysqli_num_rows($query_run) == 1){        //if there is no false information

            $query = "SELECT doctor_email,doctor_name,visit_hour_start,visit_hour_end FROM doctors WHERE doctor_email = '".$detail['doctor_email']."'"; //fetch data of dcotor from database to check if he is available
            $query_run = mysqli_query($con,$query);
            $doctor = mysqli_fetch_assoc($query_run);

            $date1 = DateTime::createFromFormat('h:i a', $time);
            $date2 = DateTime::createFromFormat('h:i a', $doctor['visit_hour_start']);
            $date3 = DateTime::createFromFormat('h:i a', $doctor['visit_hour_end']);
            if ($date1 > $date2 && $date1 < $date3) {
                $valid = ['applied','rescheduled'];
                $query = "UPDATE appointment_detail SET appointment_status = 'rescheduled', appointment_time = '$time', appointment_date = '$date' WHERE appointment_ID = '$appointment'";
                if(in_array($detail['appointment_status'],$valid)){           //check validity 
                    if(mysqli_query($con,$query)){
                      echo "<p style='color:black'>Appointment reschuled Successfully!</P>"; 
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
            else {
              echo "<p style='color:red'>Doctor not available at this time!</P>";
            }

            
    } 

    else {                        //if there is some false information
      echo "<p style='color:red'>Error!</P>";
    }
  }



?>