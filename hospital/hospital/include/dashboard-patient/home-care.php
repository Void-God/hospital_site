<?php require "../config.inc.php"; ?>
            <div class="appointment-main dashboard-form">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="title-box">
                      <h2>Home Care</h2>
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
                                                  <input id="homecare_name"  value="" name="name" type="text" placeholder="Name" class="form-control input-md">
                                              </div>
                                          </div>
                                          
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="appointmentfor">Catagory</label>
                                                  <select  id="homcare_category" name="appointmentfor" class="form-control">
                                                    <option value="">SELECT CATEGORY</option>
                                                    <?php 
                                                      $query = "SELECT DISTINCT homecare_category FROM home_care";
                                                      $query_run = mysqli_query($con,$query);
                                                      while($rows = mysqli_fetch_assoc($query_run)){
                                                    ?>
                                                      <option value="<?php echo $rows['homecare_category'] ?>"><?php echo $rows['homecare_category'] ?></option>
                                                    <?php 
                                                      }

                                                    ?>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div id="homcare_subcategory" class="form-group">
                                                  <!-- <label class="control-label black" for="appointmentfor">sub-catagory</label>
                                                  <select  name="appointmentfor" class="form-control">
                                                    <option value=''>CHOOSE CATAGORY FIRST</option>
                                                  </select> -->
                                              </div>
                                          </div>


                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="appointmentfor">City</label>
                                                  <select id="homecare_city" name="appointmentfor" class="form-control">
                                                      <?php 
                                                        $query = "SELECT * FROM branches";
                                                        $query_run = mysqli_query($con,$query);
                                                        while($rows = mysqli_fetch_assoc($query_run))
                                                       {
                                                      ?>
                                                        <option value="<?php echo $rows['branch_ID']; ?>"><?php echo $rows['branch_name']; ?></option>
                                                      <?php }
                                                      ?>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Address</label>
                                                  <input id="homecare_address" name="date" type="text" placeholder="Your Address" class="form-control input-md">
                                              </div>
                                          </div>

                                          

                                          

                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Preferred Date</label>
                                                  <input id="homecare_date" name="date" type="date" placeholder="Preferred Date" class="form-control input-md">
                                              </div>
                                          </div>
                                          
                                          <!-- Select Basic -->
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label class="control-label black" for="date">Preferred Time</label>
                                                  <input id="homecare_time" name="date" type="text" class="form-control input-md time-format">
                                              </div>
                                          </div>

                                          <!-- Select Basic -->
                                          <div class="col-md-12">
                                              <div id="homecare_result"  class="form-group">
                                              </div>
                                          </div>

                                          <!-- Button -->
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <button id="homecaresearch" type="button" name="singlebutton" class="new-btn-d br-2">Search For Doctors</button>
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
              $('#homcare_category').on('change', function() {
                var category = $('#homcare_category').val();
                  if(!(category == '')){
                    $('#homcare_subcategory').html("<img  style='width:50px;height:50px;display:block;' src='../images/load-med.gif' />");
                    $.post("../include/dashboard-patient/homcare_subcategory.php",{category : category},
                      function(data) {
                      $('#homcare_subcategory').html(data);
                      // $("#myModalX").modal('hide');       
                    });   
                  }                             
               });
              $('#homecaresearch').on('click', function() {
                var name = $('#homecare_name').val();
                var category = $('#homcare_category').val();  
                var homeAdd = $('#homecare_address').val();
                var city = $('#homecare_city').val();
                var date = $('#homecare_date').val();
                var time = $('#homecare_time').val();
                var validTime = time.match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
                if(!validTime || date == '' || city == '' || category == '' || name == ''|| homeAdd == '') {
                  $('#homecare_result').html("<p style='color:red'>Please fill the form correctly</p>");
                }
                else {
                  var homecare = {'address': homeAdd , 'name': name, 'category':category , 'city': city , 'time' : time,'date' : date};
                  if (!$('#homcare_subcategory').is(':empty')){
                    var subcat = $('#homcare_subcategory select').val();
                    homecare['subcat'] = subcat;                   
                  }
                  else {
                    homecare['subcat'] = 'None';
                  }
                  sessionStorage.setItem('homecare', JSON.stringify(homecare));
                  $('#homecare_result').html("<img  style='width:50px;height:50px;display:block;' src='../images/load-med.gif' /><br/>");
                  $('#homecaresearch').prop("disabled",true)
                  $.post("../include/dashboard-patient/homecare-doctor-search.php",homecare,
                      function(data) {
                      $('#homecare_result').html(data);
                      // $("#myModalX").modal('hide');       
                  }); 
                  $('#homecaresearch').prop("disabled",false);  
                }
              });
              
              $(".time-format").inputmask({
                mask: "h:s t\\m",
                placeholder: "hh:mm xm",
                alias: "datetime",
                hourFormat: "12"
              });


            </script>