<label class="control-label black" for="appointmentfor">sub-catagory</label>
<select  name="appointmentfor" class="form-control">
  <?php 
    session_start();
    if(isset($_SESSION['userID']) && isset($_POST['category'])){
      require "../config.inc.php";
      $category = $_POST['category'];
    $query = "SELECT homecare_ID,homecare_subcategory FROM home_care WHERE homecare_category = '$category'";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) == 1){
      $detail = mysqli_fetch_assoc($query_run);
      if($detail['homecare_subcategory'] == 'None'){
    ?>
        <script type="text/javascript">
          $('#homcare_subcategory').empty();
        </script>
    <?php
      }
    }
    while($rows = mysqli_fetch_assoc($query_run)){

        echo "<option value='".$rows['homecare_ID']."'>".$rows['homecare_subcategory']."</option>";

      }

    }

  ?>  
</select>
  <?php 

  ?>
