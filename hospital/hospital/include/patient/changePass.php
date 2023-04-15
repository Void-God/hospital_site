<?php
  session_start(); 
  if(isset($_SESSION['forgotUser'])){
    require "../config.inc.php";
    $pass = $_POST['password'];
    $query = "UPDATE users SET userPassword ='".$_POST['password']."' WHERE userEmail = '".$_SESSION['forgotUser']."'";
    if(mysqli_query($con,$query)){
      unset($_SESSION['forgotOTP']);
      unset($_SESSION['forgotUser']);
      unset($_SESSION['forgotAttempt']);
      echo "<script>alert('password changed!')</script>";
    }
    else {
      echo "<script>alert('Oops some problem occured!')</script>";
    }
  }

?>