<?php
session_start();
if(isset($_SESSION['userID'])&&isset($_POST['doctor'])){  //set 
  require "../config.inc.php";
  $doctor = $_POST['doctor'];
  $userName = $_POST['name'];
  $city = $_POST['city'];
  $time = $_POST['time'];
  $date = date("Y-m-d", strtotime($_POST['date']));  
  $category = $_POST['category'];
  $address = $_POST['address'];
  $subcat = $_POST['subcat'];
	if($subcat == 'None'){
		$query = "SELECT * FROM home_care WHERE homecare_category = '$category'";
		$query_run = mysqli_query($con,$query);
  	$detail = mysqli_fetch_assoc($query_run);
  	$subcat = $detail['homecare_ID'];
	}
  $query = "SELECT * FROM doctors WHERE doctor_email = '$doctor'";
  $query_run = mysqli_query($con,$query);


  if(mysqli_num_rows($query_run)){          //if doctor email exist and there is nothing wrong with code
    $query = "INSERT INTO appointment_detail(homecare_present,homecare_ID,doctor_email, patient_name,appointment_date,appointment_time,appointment_status,paying_status,address,patient_email) VALUES('1','$subcat','$doctor','$userName','$date','$time','applied','unpaid','$address','".$_SESSION['userID']."')";
    if(mysqli_query($con,$query)){    //appoinment have been made
?>
  <script>
    $( "#homecareSubmit" ).remove();
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
 echo "<p style='color:red'>Error!</p>"; 

}

?>