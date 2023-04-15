
<?php 
session_start();
if(isset($_POST['time'])){
  require "../config.inc.php";

           $date_now = date("Y-m-d"); // this format is string comparable

          if ($date_now > $_POST['date']) {
              echo "<p style='color:red'>Please check the date</p>";
          
?>
  <script type="text/javascript">
    sessionStorage.clear("appoint");   
  </script>   

<?php
            exit();
          }
  $doctors = 0;
  $search_time = $_POST['time'];
  $spe = $_POST['category'];
  $gender = $_POST['gender'];
  $branch = $_POST['city'];

  $query = "SELECT * FROM specialization WHERE spe_ID = '$spe'";
  $query_run = mysqli_query($con,$query);
  if(mysqli_num_rows($query_run) == 0){
    echo "<p style='color:red'>Error!</P";
    exit();
  }
  $detail = mysqli_fetch_array($query_run);
  $spe = $detail['spe_name'];


  if($gender == 'male' || $gender == 'female'){
    $query = "SELECT doctor_email,doctor_name,visit_hour_start,visit_hour_end FROM doctors WHERE specialization = '$spe' AND gender = '$gender' and branch = '$branch' ";    
  }
  else {
    $query = "SELECT doctor_email,doctor_name,visit_hour_start,visit_hour_end FROM doctors WHERE specialization = '$spe' and branch = '$branch'"; 
  }
  $query_run = mysqli_query($con,$query);

?>
<label class="control-label black" for="time">Available Doctors</label>
<select id="app-doctor" name="time" class="form-control">
<?php
  while($rows = mysqli_fetch_assoc($query_run)){
      $date1 = DateTime::createFromFormat('h:i a', $search_time);
      $date2 = DateTime::createFromFormat('h:i a', $rows['visit_hour_start']);
      $date3 = DateTime::createFromFormat('h:i a', $rows['visit_hour_end']);
      if ($date1 > $date2 && $date1 < $date3)
      {
?>
      <option value="<?php echo $rows['doctor_email'] ?>"><?php echo $rows['doctor_name']  ?></option>
<?php
          $doctors += 1;
      }  
  }

}

?>
  </select><br/>
<?php if($doctors) {?>

  <div class="col-md-12">
    <div id="applyResult" class="form-group">
    </div>
  </div>
  <button id="applyforAppointment" type="button" name="singlebutton" class="new-btn-d br-2">Book Appointment</button>
  <script type="text/javascript">
    $('#applyforAppointment').on('click', function() {
          var appoint = JSON.parse(sessionStorage.getItem("appoint"));
          var doc_id = $('#app-doctor').val();
          appoint['doc_id'] = doc_id;
          if(doc_id == ''){
            $('#applyResult').html("<p style='color:red'>Error!</p>");
          }
          else {
            $.post("../include/dashboard-patient/appointment-apply.php",appoint,
              function(data) {
              $('#applyResult').html(data);
              // $("#myModalX").modal('hide');       
            });            
          }
    });
    $('#app-name').attr("disabled", true);
    $('#appointment-mode').attr('disabled',true);
    $('#app-city select').attr("disabled", true);
    $('#app-category').attr("disabled", true); 
    $('#pre-gender').attr("disabled", true); 
    $('#app-date').attr("disabled", true);
    $('#app-time-main').attr("disabled",true);

    $( "#searchforDoctor" ).remove();
<?php 
  }
  else {
    echo "<script>alert('no doctor found!')</script>";    
  }

?>