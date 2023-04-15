var checkthisone  = 0 ;
var forgot = 0;

$('#loginform').submit(function () {
  return false;
});

$('#forgotForm').submit(function () {
  if(forgot == 1){
     var otp = $('#forgotOTP').val();
    if(!(otp == '')){
      $.post("include/patient/pcp.php",{otp:otp},
       function(data) {
        $('#leastFP').html(data);        
      });
    }
  }
  else if(forgot == 2) {
        var password = $('#forgotPass').val();
        var conPassword = $('#forgotconPass').val();
        if(password != conPassword){
          alert('Password and confirm password does not match!')
        }
        else {
          $.post("include/patient/changePass.php",{password:password},
          function(data) {
            $('#changePassErr').html(data); 
            window.location.href = "include/../";    
          });
        }
  }
  return false;
});

$('#signForm').submit(function () {
  if(checkthisone == 0 ){    
    return false;
  }
  else {
      var email = $('#signEmail').val();
      var name = $('#signName').val();
      var DOB = $('#signDOB').val();
      var gender = $('#signGender').val();
      var Mob = $('#signMob').val();
      var pass = $('#signPass').val();
      var con_pass = $('#signcPass').val();  
      var otp = $('#signOTP').val();
      var blood_group = $('#signBlood').val();
          // $('#myModalX').modal({
          //   backdrop: 'static',
          //   keyboard: true, 
          //   show: true
          // });    
      $.post("include/patient/afterotp.php",{email : email,
          blood_group : blood_group,
          name : name,
          DOB : DOB ,
          gender : gender,
          Mob : Mob ,
          pass : pass ,
          con_pass : con_pass,
          otp : otp},
        function(data) {
        $('#signError').html(data);
        $("#myModalX").modal('hide');       
      });
    return false;
  }
});


$('#signOTP').click(function () {
    var email = $('#signEmail').val();
    var pass = $('#signPass').val();
    var con_pass = $('#signcPass').val();
    $('#signEmail').attr("type", "email");
    // $('#signPass').attr("pattern", ".{8,}");
    // $('#signcPass').attr("pattern", ".{8,}");
    if(email == '' || pass== '' || con_pass == '' ){
      $('#signEmail').attr("required", true);      
      $('#signPass').attr("required", true);
      $('#signcPass').attr("required", true);
    }
    else {
      if(pass != con_pass){
        alert('password and confirm password are not same');
      }
      else {
        if(pass.length >= 8){

          $.post("include/patient/sendotp.php",{email:email},
            function(data) {
              $('#otpSection').html(data);
      
            });
        }
      }
    }
});


$('#loginNow').click(function () {
    var password = $('#loginPassword').val();
    var ID = $('#loginUser').val();

    if(password == '' || ID == ''){
      $('#loginUser').attr("required", true);
      $('#loginPassword').attr("required", true);
    }
    else {
      $('#loginNow span').css("display","none");
      $('#loginNow img').css("display","inline");
      $.post("php/login_user.php",{ID:ID,password:password},
      function(data) {
        $('#errorhendle').html(data); 
      $('#loginNow span').css("display","block");
      $('#loginNow img').css("display","none");       
      });

    }
});

$('#searchUFP').click(function () {
    var forgotUser = $('#inputUFP').val();
    $.post("include/patient/confirmForgotPassword.php",{forgotUser:forgotUser},
      function(data) {
        $('#pasteFP').html(data);        
      });
});


$('#signUpNow').click(function () {
    $('#myModal01').modal('hide');
    $('#myModal02').modal({
      backdrop: 'static',
      keyboard: true, 
      show: true
    });  
});

$('#passwordReset').click(function () {
    $('#myModal01').modal('hide');
    $('#myModal03').modal({
      backdrop: 'static',
      keyboard: true, 
      show: true
    });  
});


