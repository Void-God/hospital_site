<?php 
  session_start();
  require "../config.inc.php";
?>

            <div class="appointment-main dashboard-form">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="title-box">
                      <h2>My Appointments</h2>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="well-block">
                                  <form id="reson_alt" method="post" enctype="multipart/form-data">
                                      <!-- Form start -->
                                      <div class="row">
                                          <div class="col-md-12">                                 
                                                <style type="text/css">
                                                  tr, tr > span {
                                                   color:black;
                                                   font-size:17px;
                                                  /* font-family: italic;*/
                                                  }
                                                  .black-border {
                                                    border-top:4px black ridge;
                                                  }
                                                  .margin-down {
                                                    margin-bottom:12px;
                                                  }
                                                  .rought {
                                                    background-color:green;
                                                    border-radius:17px;
                                                    text-align: center;
                                                    padding-left:20px;
                                                    padding-right:20px;
                                                    margin-left:3px;
                                                  }
                                                  .loft {
                                                    background-color:red;
                                                    border-radius:17px;
                                                    text-align: center;
                                                    padding-left:15px;
                                                    padding-right:15px;
                                                    margin-left:3px;
                                                  }
                                                  .lid-6 {
                                                      width:50%;
                                                      height:auto;
                                                      float:left;
                                                      padding-left:15px;
                                                      padding-right:45px;
                                                      text-align:center;
                                                    }
                                                    .lid-12 {
                                                      width:100%;
                                                      height:auto;
                                                      float:left;
                                                      padding-left:15px;
                                                      padding-right:65px;
                                                      text-align:center;
                                                    }
                                                    .line-top{
                                                      border-top: 1px black solid;
                                                      padding-top: 12px
                                                    }
                                                  
                                                 </style>                                                                                       
                                                <?php 
                                                  $count = 1;
                                                  $query = "SELECT * FROM appointment_detail WHERE patient_email = '".$_SESSION['userID']."' ORDER BY appointment_ID DESC;";
                                                  $query_run = mysqli_query($con,$query);

                                                  $query_home = "SELECT * FROM homecare_detail WHERE patient_email = '".$_SESSION['userID']."' ORDER BY homecare_ID DESC;";
                                                  $query_home_run = mysqli_query($con,$query_home);
                                                  
                                                  if(mysqli_num_rows($query_run)==0){    //no appointment     
                                                    echo "<p style='color:red'>No appointment found!</p>";
                                                    exit();
                                                  }
                                                  while($detail = mysqli_fetch_assoc($query_run)){ ?>
                                                    <i><div class="row black-border" style="padding-left:20%;"><b><p style="font-size:35px;color:black;">Appointment <?php echo $count; ?></p></b></div>
                                                  <?php 
                                                    $put_doctor = "SELECT doctor_name FROM doctors WHERE doctor_email = '".$detail['doctor_email']."'";
                                                    if($detail['homecare_present'] == 1){
                                                      $put_spe =  "SELECT homecare_category,homecare_subcategory FROM home_care WHERE homecare_ID = '".$detail['homecare_ID']."'";
                                                      $variable = 'homecare_subcategory';
                                                    }
                                                    else {
                                                      $put_spe = "SELECT spe_name FROM specialization WHERE spe_ID = '".$detail['specialization_ID']."'";
                                                      $variable = 'spe_name';
                                                    }
                                                    $get_doctor = mysqli_fetch_assoc(mysqli_query($con,$put_doctor)); 
                                                    $get_spe = mysqli_fetch_assoc(mysqli_query($con,$put_spe));
                                                  ?>
                                                  <div class="row black-border margin-down">


                                                    
                                                    <table class="table-align">
                                                      <tr>
                                                        <td>Type </td>
                                                        <?php if($detail['homecare_present'] == 1){
                                                          echo "<td>:#homecare</td>";
                                                        } 
                                                        else {
                                                          echo "<td>:#N/A</td><td></td>";
                                                        }

                                                        ?> 
                                                      </tr>
                                                      
                                                      <tr>
                                                        <td>Doctor Name</td>
                                                        <td> :   <?php echo $get_doctor['doctor_name']; ?>(<?php echo $get_spe[$variable]; ?>)</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Appointment Date / Time</td>
                                                        <td> : <?php echo date("d-m-Y", strtotime($detail['appointment_date']));?> /<?php echo $detail['appointment_time'] ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Status</td>
                                                        <td> :<span <?php if($detail['appointment_status']=='cancelled') echo "class='loft'"; else echo "class='rought'"; ?> ><?php echo $detail['appointment_status'] ?></span></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Paying status</td>
                                                        <td>:<span <?php if($detail['paying_status']=='unpaid') echo "class='loft'"; else echo "class='rought'"; ?> ><?php echo $detail['paying_status'] ?></span></td>
                                                      </tr>
                                                      
                                                        <?php if(($detail['appointment_status'] == 'applied') || $detail['appointment_status'] == 'rescheduled' ) { ?>
                                                    </table>
                                                    <div class="container-fluid">
                                                      <div class="row line-top">
                                                        <div class="lid-6">
                                                          <button type="button" value="<?php echo $detail['appointment_ID']; ?>" class="reschedule btn btn-success">Reschedule/Cancel</button>
                                                        </div>
                                                        <div class="lid-6">
                                                          <button type="button" value="<?php echo $detail['appointment_ID'].",".$detail['specialization_ID']; ?>" class="doc-change btn btn-success">Change Doctor</button>
                                                        </div>
                                                      </div>
                                                    </div>

                                                        <?php }  
                                                        else if($detail['appointment_status']== 'completed'){ ?>
                                                    </table>
                                                    <div class="container-fluid">
                                                      <div class="row line-top">
                                                        <div class="lid-12">
                                                          <button type="button" value="<?php echo $detail['appointment_ID']; ?>" class="medicine-prescribed btn btn-success">view</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                      

                                                         <?php                                                         
                                                        }else { echo "</table>";}
                                                        ?>
                                                                                                            
                                                 
 

                                                  </div>
                                                <?php
                                                  $count++;
                                                  }
                                                ?>
                                          </div>
                                      </div>
                                  </form>
                                  <!-- form end -->
                              </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
                  
                  //pop up for reschedule
                  $(".reschedule").on('click',function() {
                    edit = this.value;
                    $('#re-response').empty();
                    sessionStorage.setItem("edit", edit);
                    $('#myModaledit').modal({
                      backdrop: 'static',
                      keyboard: true, 
                      show: true
                    });      
                  });
                 //pop up for medicine priscirption 
                  $(".medicine-prescribed").on('click',function() {
                    medicine = this.value;
                    $('#medicine-pris .well-block').empty();
                    $('#medicine-pris .container').css("display", "block") ; 
                    $('#myModal-pris').modal({
                      backdrop: 'static',
                      keyboard: true, 
                      show: true
                    }); 
                      $.post("../include/dashboard-patient/pris-medicine.php",{app:medicine},
                      function(data) {
                      $('#medicine-pris .well-block').html(data);
                      $('#medicine-pris .container').css("display", "none") ;      
                      });     
                  });
                  
                  // pop for doctor change
                  $(".doc-change").on('click',function() {
                    app_id = this.value;
                    sessionStorage.setItem("doctor-change", app_id);
                     $('#doc-change-sec .well-block').empty();
                    $('#doc-change-sec .container').css("display", "block") ; 
                    // $('#re-response').empty();
                    // $('#medicine-pris .container').empty();
                    // sessionStorage.setItem("medicine", medicine);
                    $('#myModal-change').modal({
                      backdrop: 'static',
                      keyboard: true, 
                      show: true
                    }); 
                      $.post("../include/dashboard-patient/change-doctor-search.php",{app_id:app_id},
                      function(data) {
                      $('#doc-change-sec .well-block').html(data);
                      $('#doc-change-sec .container').css("display", "none") ;      
                      });     
                  });                 
            </script>