<?php session_start(); require "../config.inc.php"; ?>
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
                                                  $date_now = date("Y-m-d");
                                                  $query = "SELECT * FROM appointment_detail WHERE appointment_date = '$date_now' AND (appointment_status = 'applied' OR appointment_status = 'rescheduled') AND homecare_present = '0' AND doctor_email = '".$_SESSION['userID']."';";
                                                  if(isset($_POST['view'])){
                                                      if($_POST['view'] == 'current'){
                                                        $query = "SELECT * FROM appointment_detail WHERE  (appointment_status = 'applied' OR appointment_status = 'rescheduled') AND homecare_present = '0'  AND doctor_email = '".$_SESSION['userID']."' ORDER BY appointment_ID DESC;";  
                                                      }
                                                      else if($_POST['view'] == 'previous'){
                                                          $query = "SELECT * FROM appointment_detail WHERE (appointment_status = 'cancelled' OR appointment_status = 'completed') AND homecare_present = '0'  AND doctor_email = '".$_SESSION['userID']."' ORDER BY appointment_ID DESC;";
                                                      }
                                                      else if($_POST['view'] == 'all'){
                                                         $query = "SELECT * FROM appointment_detail WHERE homecare_present = '0'  AND doctor_email = '".$_SESSION['userID']."' ORDER BY appointment_ID DESC;";
                                                      }
                                                  }
                                                  $query_run = mysqli_query($con,$query);
                                                  if(mysqli_num_rows($query_run)==0){    //no appointment     
                                                    echo "<p style='color:red;text-align:center'>No appointment found!</p>";
                                                    exit();
                                                  }
                                                  while($detail = mysqli_fetch_assoc($query_run)){ ?>
                                                    <i><div class="row black-border" style="padding-left:20%;"><b><p style="font-size:35px;color:black;">Appointment <?php echo $count; ?></p></b></div>
                                                  <?php 
                                                    $put_patient = "SELECT user_name FROM patients WHERE user_email = '".$detail['patient_email']."'";
                                                    $put_spe = "SELECT spe_name FROM specialization WHERE spe_id = '".$detail['specialization_ID']."'";
                                                    $get_patient = mysqli_fetch_assoc(mysqli_query($con,$put_patient)); 
                                                    $get_spe = mysqli_fetch_assoc(mysqli_query($con,$put_spe));
                                                  ?>
                                                  <div class="row black-border margin-down">


                                                    
                                                    <table>
                                                      <tr>
                                                        <td>Patient Name</td>
                                                        <td> :   <?php echo $detail['patient_name']; ?></td>
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
                                                          <button type="button" value="<?php echo $detail['appointment_ID'].",".$detail['specialization_ID']; ?>" class="prescribe-medicine btn btn-success">Prescribe</button>
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
                                                <hr style="color:black;" />
                                          </div>
                                      </div>
                                  </form>
<script type="text/javascript">
  
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
                //onload javascript
                  $('#cancel-app').on('click', function() {
                    var edit = sessionStorage.getItem("edit");
                    $("#myModal_cancel").modal('hide');
                    $('#load-reschedule img').css("display","block");    
                    $.post("../include/dashboard-patient/cancel-appointment.php",{app:edit},
                        function(data) {
                        $('#re-response').html(data);
                        $('#load-reschedule img').css("display","none");       
                    });
                    
                  });

                  $(".reschedule").on('click',function() {
                    edit = this.value;
                    $('#re-response').empty();
                    $('#med-pres-resoponse').empty();
                    medicine_pres = {};
                    med_count = 0;
                    sessionStorage.setItem("edit", edit);
                    $('#myModaledit').modal({
                      backdrop: 'static',
                      keyboard: true, 
                      show: true
                    });      
                  });
                 //pop up for medicine prescribed by doctor

                  $(".prescribe-medicine").on('click',function() {
                    medicine = this.value;
                    sessionStorage.setItem("detail_pres", medicine);
                    $('#doctor-pres-med .align-table tbody').empty();
                    $('#doctor-pres-med .align-table tbody').append('<tr><td colspan="6"><span style="color:red;text-align:center;">Nothing yet</span></td><tr>');
                    medicine_pres = {};
                    med_count = 0;
                    $('#doctor-pres-med').modal({
                      backdrop: 'static',
                      keyboard: true, 
                      show: true
                    }); 
                  });
</script>