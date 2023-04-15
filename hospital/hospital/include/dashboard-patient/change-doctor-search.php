<?php 
  session_start();
  if(isset($_SESSION['userID']) && isset($_POST['app_id'])){
    include "../config.inc.php";
    $appointment = $_POST['app_id'];
    $actual_data = explode(",",$appointment);
    $query = "SELECT * FROM appointment_detail WHERE appointment_ID='".$actual_data[0]."' AND patient_email = '".$_SESSION['userID']."';" ;
    $query_run = mysqli_query($con,$query);          //check false information
    $detail = mysqli_fetch_assoc($query_run);
    if(mysqli_num_rows($query_run) == 1){    //info is correct
      if($detail['appointment_status'] == 'rescheduled' || $detail['appointment_status'] == 'applied' ){
        $query = "SELECT doctor_email,doctor_name,visit_hour_start,visit_hour_end FROM doctors WHERE specialization_ID = '".$actual_data[1]."'";
        $query_run = mysqli_query($con,$query);



?>
<label class="control-label black" for="time">Available Doctors</label>
<select id="changed-doctor" name="time" class="form-control">
<?php
  while($rows = mysqli_fetch_assoc($query_run)){
      $date1 = DateTime::createFromFormat('h:i a', $detail['appointment_time']);
      $date2 = DateTime::createFromFormat('h:i a', $rows['visit_hour_start']);
      $date3 = DateTime::createFromFormat('h:i a', $rows['visit_hour_end']);
      if ($date1 > $date2 && $date1 < $date3)
      {
?>
      <option value="<?php echo $rows['doctor_email'] ?>"><?php echo $rows['doctor_name']  ?></option>
<?php
         
      }  
  }


?>
  </select>
  <div class="row" style="padding-left:20px;padding-top:10px;"></div>
  <img src="../images/load-med.gif" style="width:50px;height:50px;display:none;" ></br>
  <button id="doc-change-now" type="button" name="singlebutton" class="btn btn-success">Change Now</button>
  <script type="text/javascript">
                  $("#doc-change-now").on('click',function() {
                    app_id = sessionStorage.getItem("doctor-change");
                     doc = $('#changed-doctor').val();
                     $('#doc-change-sec .well-block img').css("display", "inline");
                     $('#doc-change-sec .well-block .row').empty();
                      $.post("../include/dashboard-patient/change-doctor.php",{app_id:app_id,doc:doc},
                        function(data) {
                        $('#doc-change-sec .well-block .row').html(data);
                        $('#doc-change-sec .well-block img').css("display","none"); 
                        // $("#myModalX").modal('hide');       
                      });    
                  });
  </script>




<?php

      }
      else {
        echo "<p style='color:red'>Error!</P>";
      }
    }
    else {            //info is false
      echo "<p style='color:red'>Error!</P>";
    }
  

  }


?>