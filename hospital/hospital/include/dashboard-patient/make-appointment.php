<?php 
session_start();
require "../config.inc.php";
if(isset($_SESSION['priv'])){

?>
            <div class="appointment-main dashboard-form">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="title-box">
                      <h2>Appointment</h2>
                      <p class="black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="well-block">
                                  <div class="well-title">
                                      <h2 style="text-align:center;">Book an Appointment</h2>
                                  </div>
                                  <form method="post" enctype="multipart/form-data">
                                      <!-- Form start -->
                                      <div class="row">

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="name">Name</label>
                                                  <input id="app-name" value="" name="name" type="text" placeholder="Name" class="form-control input-md">
                                              </div>
                                          </div>
                                          <!-- Text input-->
                                          <!-- <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="email">Email</label>
                                                  <input id="email" name="email" value="" type="text" placeholder="E-Mail" class="form-control input-md">
                                              </div>
                                          </div> -->
                                          <!-- Text input-->
                                          
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="appointmentfor">Mode of Appointment</label>
                                                  <select id="appointment-mode" name="appointmentfor" class="form-control">
                                                      <option value="">Choose-Mode</option>
                                                      <option value="offline">Go to Hospital(offline)</option>
                                                      <option value="online">Audio/Vedio call(online)</option>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div id="app-city" class="form-group">  

                                                  <label class="control-label black" for="appointmentfor">CHOOSE YOUR CITY</label>
                                                  <select id="" name="appointmentfor" class="form-control">
                                                  <?php
                                                      $query = "SELECT * FROM branches";
                                                      $query_run = mysqli_query($con,$query);
                                                      while($rows = mysqli_fetch_assoc($query_run)){
                                                  ?>
                                                    <option value="<?php echo $rows['branch_ID'] ?>"><?php echo $rows['branch_name'] ?></option>
                                                  <?php 
                                                        
                                                      }
                                                  ?> 
                                                  </select>


                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="appointmentfor">SELECT category</label>
                                                  <select id="app-category" name="appointmentfor" class="form-control">
                                                      <option value="">CHOOSE CATEGORY</option>
                                                      <?php 
                                                          // $query = "SELECT DISTINCT homecare_category FROM home_care WHERE homecare_responsible LIKE '%doctor%'";
                                                        $query = "SELECT * FROM specialization";
                                                          $query_run = mysqli_query($con,$query);
                                                          while($rows = mysqli_fetch_assoc($query_run)){
                                                            echo "<option value='".$rows['spe_ID']."'>".$rows['spe_name']."</option>";  
                                                          }

                                                      ?>
                                                  </select>
                                              </div>
                                          </div>





                                          <!-- <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="appointmentfor">Department</label>
                                                  <select id="app-specialization" name="appointmentfor" class="form-control">
                                                      <option value="">SELECT MODE FIRST</option>
                                                  </select>
                                              </div>
                                          </div> -->

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="appointmentfor">Preffered Gender of Doctor</label>
                                                  <select id="pre-gender" name="appointmentfor" class="form-control">
                                                    <option value="any">Any</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Preferred Date</label>
                                                  <input id="app-date" name="date" type="date" placeholder="Preferred Date" class="form-control input-md">
                                              </div>
                                          </div>
                                          
                                          <!-- Select Basic -->
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Preferred Time</label>
                                                  <input id="app-time-main" name="date" type="text" class="form-control input-md time-format">
                                              </div>
                                          </div>

                                          <!-- Select Basic -->
                                          <div class="col-md-12">
                                              <div id="searchedDoctor" class="form-group">
                                              </div>
                                          </div>

                                          <!-- Button -->
                                          <div id="searchDoctor" class="col-md-12">
                                              <div id="appointmentButton" class="form-group">
                                                  <button id="searchforDoctor" type="button" name="singlebutton" class="new-btn-d br-2">Search For Doctors</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                                  <!-- form end -->
                              </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Appointment -->    
            <script type="text/javascript">
              var appointmentsubmit= 0;
              var removeStorage = 0;

              // $('#app-category').on('change', function() {
              //   var category = $('#app-category').val();
              //     if(!(category == '')){

              //   
              //       $.post("../include/dashboard-patient/homcare_subcategory.php",{category : category},
              //         function(data) {
              //         $('#app-subcategory').html(data);
              //         // $("#myModalX").modal('hide');       
              //       });   
              //     }                             
              //  });

              $(".time-format").inputmask({
                  mask: "h:s t\\m",
                  placeholder: "hh:mm xm",
                  alias: "datetime",
                  hourFormat: "12"
              });

              // $('#appointment-mode').on('change', function() {
              //       var mode = $('#appointment-mode').val(); 
              //       if(mode == 'online'){
              //         $('#app-city').empty();
              //       } 
              //       if(!(mode == '') && mode== 'offline'){
              //           $('#app-city').html("<img  style='width:50px;height:50px;display:block;' src='../images/load-med.gif' />");
              //         $.post("../include/dashboard-patient/change-mode.php",{mode:mode},
              //           function(data) {
              //           $('#app-city').html(data);
              //         });  
              //         // $("#myModalX").modal('toggle');               
              //       }
              // }); 

              $('#searchforDoctor').on('click', function() {
                    var name = $('#app-name').val();
                    var gender = $('#pre-gender').val();
                    var category = $('#app-category').val(); 
                    var time = $('#app-time-main').val();
                    var date = $('#app-date').val();
                    var mode = $('#appointment-mode').val();
                    var city = $('#app-city select').val();
                    // Put the object into storage


                    if(!(gender=='' || name == '' || category == '' || name == '')){
                        var appoint = {'city':city,'mode':mode, 'name': name, 'category': category , 'gender': gender , 'time' : time,'date' : date};
                        sessionStorage.setItem('appoint', JSON.stringify(appoint));
                        // $('#myModalX').modal({
                        //   backdrop: 'static',
                        //   keyboard: true, 
                        //   show: true
                        // });
                      $.post("../include/dashboard-patient/search-doctor.php",appoint,
                        function(data) {
                        $('#searchedDoctor').html(data);
                      });  
                      // $("#myModalX").modal('toggle');               
                    }
                    else {
                      $('#searchedDoctor').html("<p style='color:red'>Please fill the form correctly!</p>");
                    }
              });

            </script>
<?php
}

?>