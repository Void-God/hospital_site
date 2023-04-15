<?php 
  if(isset($_POST['forgotUser'])){
    session_start();
    require "../config.inc.php";
    if($_POST['forgotUser'] == ''){
      echo "<span style='color:red'>Search field is empty!</span>";
      exit();      
    }
    $email = $_POST['forgotUser'];
    $query= "SELECT * FROM users WHERE userEmail = '$email'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) == 1){
      $_SESSION['forgotOTP'] = rand(100000, 999999);
      $_SESSION['forgotUser'] = $email;
      $_SESSION['forgotAttempt'] = 0;
       ?>
      <div class="col-md-12">
        <div class="form-group">
          <label class="control-label" for="name">OTP</label>
          <input id="forgotOTP" name="userID" type="password" placeholder="OTP" class="form-control input-md">
          <span id="forgotError" style="color:red" ></span></br>
          <span style='color:black'>OTP sent! please check your mail : <?php echo $_SESSION['forgotOTP'] ?></span>
        </div>
      </div>
      <div class="col-md-12 spe-btn"> 
        <button class="btn btn-success">Verify</button>
      </div>
      <script type="text/javascript">
        $("#confirmFP").empty();
        $('#inputUFP').attr("disabled", true);
        forgot = 1;
      </script>
<?php

    }
    else {
      echo "<span style='color:red'>User Not Found!</span>";
    }
  }
?>