<?php 

  session_start();
  $flag = 0;
  if(isset($_SESSION['verified_email'])){
    if($_SESSION['verified_email'] == $_POST['email']){
        if($_SESSION['signOTP'] == $_POST['otp']){
            require "../config.inc.php";
            $email = $_POST['email'];
            $name = $_POST['name'];
            $DOB = date("Y-m-d", strtotime($_POST['DOB'])) ;
            $gender = $_POST['gender'];
            $Mob = $_POST['Mob'];
            $pass = $_POST['pass'];
            $con_pass = $_POST['con_pass'];
            $blood_group = $_POST['blood_group'];
            

            // $con -> autocommit(FALSE);
            try {
              // First of all, let's begin a transaction
              $con->begin_transaction();
              // A set of queries; if one fails, an exception should be thrown
              if(!($con->query("INSERT INTO users values('$email','$pass','patient');"))){
                throw new Exception("Problem Occured!");
              }
              if(!($con->query("INSERT INTO patients(user_email,user_name,user_dob,gender,mob,blood_group) values('$email','$name','$DOB','$gender','$Mob','$blood_group');"))){
                throw new Exception("Problem Occured!");
              }
              // If we arrive here, it means that no exception was thrown
              // i.e. no query has failed, and we can commit the transaction
              $con->commit(); ?> 
              <script>
                    $('#myModal02').modal('hide'); 
                    $('#myModalmsg').modal({
                            backdrop: 'static',
                            keyboard: true, 
                            show: true
              });</script>";  
          <?php
            } catch (Exception $e) {
              // An exception has been thrown
              // We must rollback the transaction
              $con->rollback();
              echo "Problem Occured! Refresh the page and Try again";
            }
            $flag = 1;
        }
        else {
            $_SESSION['signAttempt'] += 1;
            if($_SESSION['signAttempt'] == 3){
                echo "<p>     Out of Attempts! Refresh the page and try again.</p>" ;
                $flag = 1;
            }
            else {
              echo "<p>     Wrong OTP! Please try again!</p>" ;
            }
        }
    }
    else {
      $flag == 1;
    }    
  }
  if($flag != 0 ){
    unset($_SESSION['verified_email']);
    unset($_SESSION['signOTP']);
  }
?>

