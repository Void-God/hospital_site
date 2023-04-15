<?php 
session_start();
if(isset($_SESSION['userID']) && isset($_POST['de'])){
  require "../config.inc.php";
  $value = json_decode($_POST['sent'],true);
  $send = json_decode($_POST['de'],true);               //0 app id , 1 spe_id
  $send = explode(",", $send);
  $query = "SELECT * FROM appointment_detail WHERE doctor_email = '".$_SESSION['userID']."' AND appointment_ID = '".$send[0]."';";
  $query_run = mysqli_query($con,$query);
  $detail = mysqli_fetch_assoc($query_run);
  $valid = ['applied','rescheduled'];
  if(in_array($detail['appointment_status'], $valid)){        //change only if appointment status is applied or rescheduled
      if(mysqli_num_rows($query_run) == 1){  //check valid data 
          try {
            $con->begin_transaction();
            foreach ($value as $key => $out) {
              $query = "INSERT INTO prescribed_medicine(medicine,appointment_ID,morning,afternoon,evening,take_medicine) VALUES('".$out['medicine']."','".$send[0]."','".$out['morning']."','".$out['afternoon']."','".$out['evening']."','".$out['time']."');";
                if(!($con->query($query))){
                  throw new Exception("Problem Occured!");
                }
            }    
            $query = "UPDATE appointment_detail SET appointment_status = 'completed' WHERE appointment_ID = '".$send[0]."';";
            if(!($con->query($query))){
              throw new Exception("Problem Occured!");
            }        
            $con->commit();        //if there is no problem save changes
            echo "<p style='color:black'>Successfully priscribed medicine.</p>";
          } catch (Exception $e) {
                  echo $e;
                  // An exception has been thrown
                  // We must rollback the transaction
                  $con->rollback();
                  echo "<p style:'red'>Problem Occured! Please Try again;</p>";
          }
        
      }
      else {           //if data is not valid
        echo "<p style='color:red'>Error!</p>";
      }    
  } else {    //if is's not app or resch it's  problem
    echo "<p style='color:red'>Already prescribed medicine...</p>";
  }
    
}



?>