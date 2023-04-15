<?php 
  session_start();
  if(isset($_SESSION['priv'])){
    if($_POST['pass'] == $_SESSION['password']){      //if password matches continue
      require "../config.inc.php";
      $name = $_POST['name'];
      $dob = date("Y-m-d", strtotime($_POST['dob'])) ;
      $blood = $_POST['blood'];

      $mobile = $_POST['mobile'];
      if($_SESSION['priv'] == 'patient'){
        $query = "UPDATE patients SET user_name = '".$name."', user_dob = '".$dob."', mob = '".$mobile."' , blood_group = '".$blood."' WHERE user_email = '".$_SESSION['userID']."'";        
      }
      else if($_SESSION['priv'] == 'doctor'){
        $query = "UPDATE doctors SET doctor_name = '".$name."', doctor_dob = '".$dob."', mob = '".$mobile."' , blood_group = '".$blood."' WHERE doctor_email = '".$_SESSION['userID']."'";         
      }

      if(mysqli_query($con,$query)){
        echo "<p style='color:black'>Profile Updated Successfully!</p>";
      }
      else {
        echo "<p style='color:red'>FAILED!</p>";
      }
    }
    else {         //if password do not matches show the msg
        echo "<p style='color:red'>Incorrect Password</p>";
    }
  }
?>