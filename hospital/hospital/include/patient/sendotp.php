<?php 
  if(isset($_POST['email'])){
    session_start();
    require "../config.inc.php";
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE userEmail = '$email'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)) {
      echo '<p style="color:red">Email already exists!</p>';      
    }

    else { 
          $_SESSION['signOTP'] = rand(100000, 999999);
          $_SESSION['verified_email'] = $_POST['email'];
          $_SESSION['signAttempt'] = 0;
      ?>
        
        <div class="form-group">
          <label class="control-label" for="name">OTP</label>
          <input id="signOTP" name="otp" type="password" placeholder="OTP" class="form-control input-md" required> 
        </div>
        <p id="signError" style="color:red"></p>
        <p style="color:black">OTP sent! Please check your mail.:<?php echo $_SESSION['signOTP'] ?></p>
        <button name="submit" value="alloha" id="signContinue" class="btn btn-success ">CONTINUE</button>
        <script type="text/javascript">
            checkthisone = 1;
            $('#signEmail').attr("disabled", true);
            $('#signName').attr("disabled", true);
            $('#signDOB').attr("disabled", true);
            $('#signGender').attr("disabled", true);
            $('#signMob').attr("disabled", true);
            $('#signPass').attr("disabled", true);
            $('#signcPass').attr("disabled", true);

            $("#buttonalpha").empty();
            // $('#buttonalpha').load(document.URL +  ' #buttonalpha');
            // $( "#buttonalpha" ).load(window.location.href + " #buttonalpha" );
        </script>
      <?php
        
    }
  }
?>