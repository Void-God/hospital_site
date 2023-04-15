<?php 
  include "../include/config.inc.php";
  session_start();
  $userID = $_POST['ID'];
  $password = $_POST['password'];
  // query to check for if user exists
  $query = "SELECT * FROM users WHERE userEmail = '$userID' AND userPassword LIKE BINARY '$password'";
  $query_run = mysqli_query($con,$query);
  if(mysqli_num_rows($query_run) == 1){
    $detail = mysqli_fetch_assoc($query_run);
    $_SESSION['userID'] = $detail['userEmail'];
    $_SESSION['password'] = $detail['userPassword'];
    $_SESSION['priv'] = $detail['userPriv'];
?>
    <script type='text/javascript'>
       window.location.href = "include/../"; 
      // $('#myModal01').modal('hide');
      // $('#navbar-wd').load(document.URL +  ' #navbar-wd');
    </script>";

<?php
  } 
  else {
    echo "<p style='color:red;padding-left:15px'>Wrong Input!</p>";
    //echo "<script>alert('WRONG INPUT!!!!')</script>";
  }
?>