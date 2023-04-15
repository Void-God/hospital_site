<?php 
  session_start();
  if(isset($_SESSION['priv'])) {
    require "../config.inc.php";

    if($_SESSION['priv'] == 'patient'){
      $query = "SELECT * FROM patients WHERE user_email = '".$_SESSION['userID']."'"; 
      $flag = 'user';
    }  
    else if($_SESSION['priv'] == 'doctor'){
      $query = "SELECT * FROM doctors WHERE doctor_email = '".$_SESSION['userID']."'"; 
      $flag = 'doctor';
    }
    $query_run = mysqli_query($con,$query);
    $detail = mysqli_fetch_assoc($query_run);
?> 
            <div class="form-cs dashboard-form">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="title-box">
                      <h2>Profile</h2>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="well-block">
                                  <!-- <form id="profileForm" method="post"> -->
                                      <!-- Form start -->


                                      <div class="row">

                                        <form class="form-100" method="post" enctype="multipart/form-data" action="../include/dashboard-patient/upload-image.php" style="padding-bottom:40px">
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="name">Email</label>
                                                  <input id="" value="<?php echo $_SESSION['userID'] ?>" name="name" type="text" class="form-control input-md" disabled>
                                              </div>
                                          </div>                                       
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="name">Update Profile Image</label>
                                                  <input id="profilePicFile" name="file" type="file" class="form-control input-md file-input" required>
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-12">
                                              <div id="picError" class="form-group">
                                                  
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <button name="singlebutton" class="new-btn-d br-2">Change</button>
                                              </div>
                                          </div>
                                        </form>
                                          <!-- Text input-->
                                          <!-- <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="email">Email</label>
                                                  <input id="email" name="email" value="" type="text" placeholder="E-Mail" class="form-control input-md">
                                              </div>
                                          </div> -->
                                          <!-- Text input-->
                                        <form id="updatedData" class="form-100"  method="post">
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="name">User Name</label>
                                                  <input id="updatedName" name="file" type="text" value="<?php echo $detail[$flag.'_name'] ?>" class="form-control input-md file-input" required>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Date of Birth</label>
                                                  <input id="updatedDOB" name="date" type="date" value="<?php echo $detail[$flag.'_dob'] ?>" class="form-control input-md" >
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="time">Blood Group</label>
                                                  <select id="app-Blood" value="<?php echo $detail['blood_group'] ?>" name="gender" class="form-control input-md">
                                                      <option value="" <?php if($detail['blood_group'] == ""){echo "selected";} ?>>Choose Blood Group</option>
                                                      <option value="A+" <?php if($detail['blood_group'] == "A+"){echo "selected";} ?>>A+</option>
                                                      <option value="A-" <?php if($detail['blood_group'] == "A-"){echo "selected";} ?>>A-</option>
                                                      <option value="B+"<?php if($detail['blood_group'] == "B+"){echo "selected";} ?>>B+</option>
                                                      <option value="B-" <?php if($detail['blood_group'] == "B-"){echo "selected";} ?>>B-</option>
                                                      <option value="AB+" <?php if($detail['blood_group'] == "AB+"){echo "selected";} ?>>AB+</option>
                                                      <option value="AB-"<?php if($detail['blood_group'] == "AB-"){echo "selected";} ?>>AB-</option>
                                                      <option value="O+"<?php if($detail['blood_group'] == "O+"){echo "selected";} ?>>O+</option>
                                                      <option value="O-"<?php if($detail['blood_group'] == "O-"){echo "selected";} ?>>O-</option>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Moblile Number</label>
                                                  <input id="updatedMob" name="date" type="number" value="<?php echo $detail['mob'] ?>" class="form-control input-md" required>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Enter Your Password</label>
                                                  <input id="passwordforUpdate" name="pass" type="password"  class="form-control input-md" required>
                                              </div>
                                          </div>
                                          

                                          <!-- Select Basic -->
                                          <div class="col-md-12">
                                              <div id="updateOut" class="form-group">
                                                 
                                              </div>
                                          </div>
                                          <!-- Select Basic -->

                                          <!-- Button -->
                                          <div class="col-md-12">
                                              <div id="updateSubmit" class="form-group">
                                                  <button   name="singlebutton" class="new-btn-d br-2">Update</button>
                                              </div>
                                          </div>
                                        </form>
                                      </div>
                                  <!-- form end -->
                              </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
                $('#updatedData').on('submit', function() {
                
                var name= $('#updatedName').val();
                var dob = $('#updatedDOB').val();
                var mobile = $('#updatedMob').val();
                var blood = $('#app-Blood').val();
                var pass = $('#passwordforUpdate').val();

                $('#passwordforUpdate').val('');
                var valid_blood = ['','A+','A-','B+','B-','AB+','AB-','O+','O-'];
                // if(password == '' || ID == ''){
                //   $('#loginUser').attr("required", true);
                //   $('#loginPassword').attr("required", true);
                // }
                if(valid_blood.includes(blood)){
                    if(!(name == '' || dob == '' || mobile == '')) {
                    $.post("../include/dashboard-patient/update-profile.php",{name:name,dob:dob,mobile:mobile,blood:blood,pass:pass},
                    function(data) {
                      $('#updateOut').html(data);        
                      });
                  }
                }
                  return false;
                });
                
                          
            </script>

            <?php if(isset($_SESSION['response'] )) {
                  unset($_SESSION['response']);
            ?>
            <script type="text/javascript">
              $('#myModalPR').modal('show');
              d = new Date();
              if('<?php echo $_SESSION['priv'] ?>' == 'patient'){
                $("#profile-image img").attr("src", "../profile-images/pat-images/<?php echo $detail['img_loc'] ?>"+"?"+d.getTime());                
              }
              else if('<?php echo $_SESSION['priv'] ?>'  == 'doctor'){
                $("#profile-image-doc img").attr("src", "../profile-images/doc-images/<?php echo $detail['img_loc'] ?>"+"?"+d.getTime()); 
              }

            </script>

            <?php } ?>
            

            <!-- End Appointment --> 
<?php
  }  

?>