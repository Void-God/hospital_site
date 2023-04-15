<!DOCTYPE html>
<html>
<head>
  <title>Special Select</title>
  <link rel="stylesheet" type="text/css" href="dashboard/select2.css">
</head>
<body>
  
<!-- Dropdown --> 
    <select id='selUser' style='width: 200px;'>
      <option value='0'>Select User</option> 
      <option value='1'>Yogesh singh</option> 
      <option value='2'>Sonarika Bhadoria</option> 
      <option value='3'>Anil Singh</option> 
      <option value='4'>Vishal Sahu</option> 
      <option value='5'>Mayank Patidar</option> 
      <option value='6'>Vijay Mourya</option> 
      <option value='7'>Rakesh sahu</option> 
    </select>

    <input type='button' value='Seleted option' id='but_read'>

    <br/>
    <div id='result'></div>
  


  <script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>  
  <script type="text/javascript">

    
$(document).ready(function(){
 
  // Initialize select2
  $("#selUser").select2();

  // Read selected option
  $('#but_read').click(function(){
    var username = $('#selUser option:selected').text();
    var userid = $('#selUser').val();

    $('#result').html("id : " + userid + ", name : " + username);

  });
});


  </script>
</body>
</html>