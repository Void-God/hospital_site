appointmentMode = 0;

//paste data for instant appoinment
$('#takeApp-pat').on('click', function() {
$('#sec-secondary').html("<br/><br/><br/><br/><br/><img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />");     
      $.post("../include/dashboard-patient/make-appointment.php",{},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});



//paste data for profile change 
$('#pat-profile').on('click', function() {           
$('#sec-secondary').html("<br/><br/><br/><br/><br/><img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />"); 
      $.post("../include/dashboard-patient/profile-change.php",{},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});

//to show my appointment
$('#App-pat').on('click', function() { 
      $('#sec-secondary').html("<br/><br/><br/><br/><br/><img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />");           
      $.post("../include/dashboard-patient/my-appointment.php",{},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});


//home care 
$('#home-care-maine').on('click', function() { 
    $('#sec-secondary').html("<br/><br/><br/><br/><br/><img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />");           
      $.post("../include/dashboard-patient/home-care.php",{},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});






