<?php 
  session_start();
  if(isset($_SESSION['forgotOTP'])){
    if($_SESSION['forgotOTP'] == $_POST['otp']){
      ?>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"  for="name">New password</label>
                                                <input id="forgotPass" pattern=".{8,}" title="Must contain at least 8 or more characters" name="password" type="password" placeholder="New password" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"  title="Must contain at least 8 or more characters"for="name">Confirm password</label>
                                                <input id="forgotconPass" pattern=".{8,}" name="conPassword" type="password" placeholder="Confirm Password" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div id="changePassErr" class="col-md-12">
                                            
                                        </div>
                                        
                                        <div class="col-md-12 spe-btn"> 
                                          <button id="fogotChange" class="btn btn-success">Change Password</button>
                                        </div>
      <script type="text/javascript">
        $("#pasteFP").empty();
        forgot = 2;
      </script>

<?php
    }
    else {
      echo '<script>document.getElementById("forgotError").innerHTML = "OTP does not match!"</script>';
      $_SESSION['forgotAttempt'] += 1;
      // echo "<span style='color:red'>OTP does not match</span>";
    }
  }

?>