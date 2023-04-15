<?php
session_start();
if(isset($_SESSION['userID'])&&isset($_POST['doc_id'])){  //set 
  require "../config.inc.php";
  $userName = $_POST['name'];
  $spec = $_POST['category'];
  $pre_doc = $_POST['doc_id'];
  $time = $_POST['time'];
  $date = date("Y-m-d", strtotime($_POST['date']));
  $query = "SELECT * FROM doctors WHERE doctor_email = '$pre_doc'";
  $query_run = mysqli_query($con,$query);
  

  if(mysqli_num_rows($query_run)){          //if doctor email exist and there is nothing wrong with code
    $query = "INSERT INTO appointment_detail(specialization_ID, doctor_email, patient_name,appointment_date,appointment_time,appointment_status,paying_status,patient_email) VALUES('$spec','$pre_doc','$userName','$date','$time','applied','unpaid','".$_SESSION['userID']."')";
    if(mysqli_query($con,$query)){    //appoinment have been made
?>
  <script>
    $( "#applyforAppointment" ).remove();
  </script>
  <p style='color:black'>Appointment has been made</p>
  <a href="../dashboard/"><button class="new-btn-d br-2">Go to My Appointment</button></a>

<?php
    }
    else {          //problem occured
      echo "<p style='color:red'>Oops! some problem occured.</p>";
    }
  }
  else{
    echo "<p style='color:red'>Error!</p>";
  }
}
else {             //if variable is not set
 echo "<p style='color:red'>Error!</p>"; //<br/> reconfiguring";
  
  // for($i=0; $i<3; $i++){
  //   sleep(1);
  //   echo ".";
  // }
  // echo "<br/>target complete";sleep(1);
  // echo "<br/>data retreiving start";
  //   for($i=0;$i < 3; $i++){
  //   sleep(1);
  //   echo ".";
  // }
  // echo "<br/>hacking process complete";

}

?>