<?php  
  session_start();
  if(isset($_SESSION['priv']) && isset($_POST['app'])){
    //datases' connections 
    require "../config.inc.php";
    require "../config.pharma.php";
    
    //starting the code
    $app = $_POST['app'];
    //check for priviledge type
    if($_SESSION['priv'] == 'patient'){

      // $query =  "select *
      //   from hospital.prescribed_medicine c
      //   join capricor_pharmacy.products m on c.medicine = m.id WHERE patient_email =  '".$_SESSION['userID']."' AND c.appointment_ID = '".$_POST['app']."'";

      $query = "SELECT * FROM appointment_detail WHERE patient_email =  '".$_SESSION['userID']."' AND appointment_ID = '".$_POST['app']."'";
    }
    else if($_SESSION['priv'] == 'doctor'){
      // $query =  "select *
      //   from hospital.prescribed_medicine c
      //   join capricor_pharmacy.products m on c.medicine = m.id WHERE doctor_email = '".$_SESSION['userID']."' AND patient_email =  '".$_SESSION['userID']."' AND c.appointment_ID = '".$_POST['app']."'";
      
      $query = "SELECT * FROM appointment_detail WHERE doctor_email = '".$_SESSION['userID']."' AND appointment_ID = '".$_POST['app']."'";
    }
    if(mysqli_num_rows(mysqli_query($con,$query)) == 1){     //valid data
    ?>

                                                        <div id="med-pris-primary" class="row">
                                                          <table class="align-table">
                                                            <thead>
                                                              <tr>
                                                                <th rowspan="2">medicine Name</th>
                                                                <th colspan="3">Time</th>
                                                                <th rowspan="2">Take Medicine</th>
                                                              </tr>
                                                              <tr >
                                                                <th>Morning</th>
                                                                <th>Afternoon</th>
                                                                <th>Evening</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody> 
  <?php
    $query = "SELECT * FROM prescribed_medicine WHERE appointment_ID = '$app'";
    $query_run = mysqli_query($con,$query);

                  while($get = mysqli_fetch_assoc($query_run)) {

      $pharQuery = "SELECT productName FROM products WHERE id = '".$get['medicine']."'";
      $pharQueryRun = mysqli_query($conn,$pharQuery);
      $pharRow = mysqli_fetch_assoc($pharQueryRun);

   ?>
                                                              <tr>
                                                                <td><?php echo $pharRow['productName'] ?></td>
                                                                <td><?php echo $get['morning'] ?></td>
                                                                <td><?php echo $get['afternoon'] ?></td>
                                                                <td><?php echo $get['evening'] ?></td>
                                                                <td><?php echo $get['take_medicine']." eating" ?></td>
                                                              </tr>
  <?php if($_SESSION['priv'] == 'patient'){echo "<tr><td colspan='5'><button value='".$get['medicine']."' class='mojojojo btn btn-success' type='button'>ADD TO CART</button></td></tr>";}}?>
                                                            
                                                            </tbody>
                                                          </table>

                                                        </div>
  <?php
    }
    else {                          //if data is not valid
      echo "<tr colspan='5'><td><p style='color:red'>Error!</p></td><tr>";
    }
  }

?>
<script type="text/javascript">
  $('.mojojojo').on('click',function() {
    var product = this.value;
            $.post("../pharmacy/php_actions/add_to_cart.php",{product:product},
                function(data) {
                alert("ADDED TO CART!");     
            });
  });
</script>
