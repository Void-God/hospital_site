
<label class="control-label black" for="appointmentfor">CHOOSE YOUR CITY</label>
<select id="" name="appointmentfor" class="form-control">
<?php
  if(isset($_POST['mode'])){
    session_start();
    require "../config.inc.php";
    $query = "SELECT * FROM branches";
    $query_run = mysqli_query($con,$query);
    while($rows = mysqli_fetch_assoc($query_run)){
?>
  <option value="<?php echo $rows['branch_ID'] ?>"><?php echo $rows['branch_name'] ?></option>
<?php 
      
    }
  }
?> 
</select>
