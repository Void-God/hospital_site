<label class="control-label black" for="appointmentfor">Doctors</label>
 <select id="home_doctor" name="appointmentfor" class="form-control">
<?php 
	session_start();
	if(isset($_SESSION['userID']) && isset($_POST['category'])){//check if it is directly accessed by link aur through form
		include "../config.inc.php";
		$category = $_POST['category'];
		$city = $_POST['city'];
		$found = 0;
		$query = "SELECT * FROM home_care WHERE homecare_category = '$category' ";
		$query_run = mysqli_query($con,$query);
		$detail = mysqli_fetch_assoc($query_run);
		if($category == 'Physiotherapy' || $category == 'NUTRITION SERVICES'){    //for doctors
			$q = "SELECT * FROM doctors WHERE homecare_present = 1 AND specialization = '$category' AND branch = '$city' ";
			echo $q;
		}
		else if($category=='CARE FOR PREGNANT MOTHERS AND BABIES' || $category == 'NURSING ATTENDANTS' || $category == 'SPECIALLY ABLED CHILD MANAGEMENT') { //for nurses

		}
		else if($category=='LAB TEST'){       //for lab_assiss

		}
		else if($category == 'VACCINATION'){       //for doctor nurse

		}
		else if($category = 'HOME CLEANLINESS ASSISTANCE'){         //for sweeper

		}
		$q_run = mysqli_query($con,$q);
  		while($rows = mysqli_fetch_assoc($q_run)){
	      $date1 = DateTime::createFromFormat('h:i a', $_POST['time']);
	      $date2 = DateTime::createFromFormat('h:i a', $rows['visit_hour_start']);
	      $date3 = DateTime::createFromFormat('h:i a', $rows['visit_hour_end']);
	      if ($date1 > $date2 && $date1 < $date3)
	      {
?>
	<option value="<?php echo $rows['doctor_email']; ?>"><?php echo $rows['doctor_name'];  ?></option>
<?php
			$found++;
		  }	
		}	
	}		

?>	
</select>
<script type="text/javascript">
<?php 
	if(!$found){
?>
		$('#homecare_result').children().empty();
		$('#homecare_result').html('<p style="color:red">Nothing found!!!</p>');
<?php
	}
	else {
?>
		$('#homecaresearch').parent().html('<button id="homecareSubmit" type="button" name="singlebutton" class="new-btn-d br-2">CONFIRM BOOKING</button>');
		$("#homecareSubmit" ).on('click',function(){
			var doctor = $('#home_doctor').val();
			 var homecare = JSON.parse(sessionStorage.getItem("homecare"));
			if(!(doctor == '')){
				homecare['doctor'] = doctor;
                  $.post("../include/dashboard-patient/submit-homecare.php",homecare,
                      function(data) {
                      $('#homecare_result').append('<br>'+data);      
                  }); 
			}
		});

<?php
	}
?>
</script>
