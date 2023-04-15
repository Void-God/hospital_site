<?php 
  session_start();
  if(!isset($_SESSION['userID'])){
    header("Location:../");
  }
  else {
    require "../include/config.inc.php";
    if($_SESSION['priv'] == 'patient'){
      $query = "SELECT * FROM ".$_SESSION['priv']."s WHERE user_email = '".$_SESSION['userID']."'";
    }
    else if($_SESSION['priv'] == 'admin'){
      $query = "SELECT * FROM ".$_SESSION['priv']."s WHERE admin_email = '".$_SESSION['userID']."'";  
    }
    else if($_SESSION['priv'] == 'doctor'){
      $query = "SELECT * FROM ".$_SESSION['priv']."s WHERE doctor_email = '".$_SESSION['userID']."'";      
    }
    else if($_SESSION['priv'] == 'nurse'){
      $query = "SELECT * FROM ".$_SESSION['priv']."s WHERE nurse_email = '".$_SESSION['userID']."'"; 
    }
    else if($_SESSION['priv'] == 'lab_assistant'){
      $query = "SELECT * FROM ".$_SESSION['priv']."s WHERE la_email = '".$_SESSION['userID']."'"; 
    }
    else if($_SESSION['priv'] == 'sweeper'){
      $query = "SELECT * FROM ".$_SESSION['priv']."s WHERE sw_email = '".$_SESSION['userID']."'"; 
    }
    $query_run = mysqli_query($con,$query);
    $detail = mysqli_fetch_assoc($query_run);
    if(is_null($detail['img_loc']) || $detail['img_loc'] == ''){
      $detail['img_loc'] = "../../images/Photo.jpg";
    }
  }

  
  //$_SESSION['verified_email'] = 'nothing';
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Dashboard</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="../css/pogo-slider.min.css">
  <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">

    <link rel="stylesheet" type="text/css" href="select2.css">

                                                        <style type="text/css">

                                                          .align-table{
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            text-align: center;
                                                            margin-bottom:20px; 
                                                          }
                                                          .align-table > thead > tr > th , .align-table > tbody > tr > td  {
                                                            border: 2px black solid;
                                                            padding:4px;
                                                          }
                                                          .removable {
                                                            text-align: center;
                                                            border-radius:50% !important;
                                                            background-color:#dc3545 !important;
                                                            border-color:transparent;
                                                            height: 30px;
                                                              width: 30px;
                                                              color:white;

                                                          }
                                                        </style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98" class="set-home" style="background-image:url('../images/backg1.jpg');">

  <!-- LOADER -->
     <!-- <div id="preloader">
    <div class="loader">
      <img src="images/preloader.gif" alt="" />
    </div>
    </div>end loader -->
    <!-- END LOADER -->
  
  <!-- Start top bar -->
  

  

  <!-- End top bar -->
  
  <!-- Start header -->
  <header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg" style="background-color:white">
          <div class="container-fluid padd-nav-auto">
            <a class="navbar-brand" href="../"><img id="profile-image-main" src="../images/logo.png" style="height:86px;width:112px;" alt="image"></a>
            <div class="curve"></div>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </button>  -->    
          </div>
        </nav>
  </header>
  <?php if($_SESSION['priv'] == 'patient') { ?>
    <div class="container-fluid pad-primary" >
      <div class="container padding-high">
        <div class="col-md-6">
                                        <div id="profile-image" class="row"><img class="profile_image" src="../profile-images/pat-images/<?php echo $detail['img_loc'] ?>"></div><br/>
                                        <!-- Form start -->

                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="pat-profile" class="btn btn-success">Profile</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="takeApp-pat" class="btn btn-success" >Take Appoinment</button>
                                            </div>
                                        </div>
                                             
                                    <!-- Form start -->
                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="home-care-maine" class="btn btn-success ">Home Care</button>
                                            </div>
                                        </div>
                                    <!-- form end -->
                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="App-" class="btn btn-success">Doctor Home Visit</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="App-pat" class="btn btn-success">My Appointment</button>
                                            </div>
                                        </div>

                                        <!-- Form start -->

                                        

                                    <!-- Form start -->
                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <a href="../logout.php"><button  class="btn btn-success ">LOG OUT</button></a>
                                            </div>
                                        </div>
                                    <!-- form end -->      
        </div>
        <div  id="sec-secondary" class="col-md-6 change-scroller" style="max-height:409px;overflow-y: auto;"><br/><br/>
          

        </div>                               
      </div>    

    </div>


    <?php 
      include "../php/onload.php";
    }
    else if($_SESSION['priv'] == 'admin'){
?>
    <div class="container-fluid pad-primary" >
      <div class="container padding-high">
        <div class="col-md-6">
                                        <div id="profile-image" class="row"><img class="profile_image" src="../profile-images/pat-images/<?php echo $detail['img_loc'] ?>"></div><br/>
                                        <!-- Form start -->

                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="pat-profile" class="btn btn-success">Profile</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="admin-option" class="btn btn-success">Admin Options</button>
                                            </div>
                                        </div>
                                             
                                    <!-- Form start -->
                                        <!-- <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="home-care-maine" class="btn btn-success ">Home Care</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="App-" class="btn btn-success">Doctor Home Visit</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <button id="App-pat" class="btn btn-success">My Appointment</button>
                                            </div>
                                        </div> -->

                                        <!-- Form start -->

                                        

                                    <!-- Form start -->
                                        <div class="row">
                                            <div class="col-md-12 dashboard-btn bottom-margin"> 
                                              <a href="../logout.php"><button  class="btn btn-success ">LOG OUT</button></a>
                                            </div>
                                        </div>
                                    <!-- form end -->      
        </div>
        <div  id="sec-secondary" class="col-md-6 change-scroller" style="max-height:409px;overflow-y: auto;"><br/><br/>
          

        </div>                               
      </div>    

    </div>
<?php
        include "../php/total_admin.php";
    }
    else if($_SESSION['priv'] == 'doctor'){
    ?>
     
      <div class="container-fluid pad-primary" >
        <div class="container padding-high">
          <div class="col-md-6">
                                          <div id="profile-image-doc" class="row"><img class="profile_image" src="../profile-images/doc-images/<?php echo $detail['img_loc'] ?>"></div><br/>
                                          <!-- Form start -->
                                          
                                          <div class="row">
                                              <div class="col-md-12 dashboard-btn bottom-margin"> 
                                                <button id="pat-profile" class="btn btn-success">Profile</button>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-md-12 dashboard-btn bottom-margin"> 
                                                <button id="doc-app" class="btn btn-success">Appointments</button>
                                              </div>
                                          </div>
                                          <!-- Form start -->
                                          <?php 
                                            if($detail['homecare_present'] == 1){
                                              $_SESSION['homcare'] = 'exist';
                                          ?>
                                          <div class="row">
                                              <div class="col-md-12 dashboard-btn bottom-margin"> 
                                                <button id="doc-homecare" class="btn btn-success">Homecare</button>
                                              </div>
                                          </div>
                                          <!-- Form start --> 
                                          <?php
                                            }

                                          ?>
                                          <!-- Form start -->
                                          <div class="row">
                                              <div class="col-md-12 dashboard-btn bottom-margin"> 
                                                <a href="../logout.php"><button id="loginNow" class="btn btn-success ">LOG OUT</button></a>
                                              </div>
                                          </div>
                                      <!-- form end -->      
          </div>
          <div  id="sec-secondary" class="col-md-6 change-scroller" style="max-height:409px;overflow-y: auto;"><br/><br/>


          </div>                               
        </div>    

      </div>


    <?php require "../php/onload.php"; require "../php/doctor-onload.php"; } ?>


    <!-- ALL JS FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-mask.js"></script>
    <script type="text/javascript" src="../js/js.js"></script>  

    
    <?php if($_SESSION['priv'] == 'patient'){ ?>
    <script type="text/javascript" src="../js/dashboard.js"></script> 
      <script type="text/javascript">
      var show = <?php if(isset($_GET['show'])){echo '"'.$_GET['show'].'"';} else {echo '""';} ?>;
      if(show == 'appointment'){
        address = "../include/dashboard-patient/make-appointment.php";
      }
      else if(show == 'profile'){
        address = "../include/dashboard-patient/profile-change.php";
      }
      else{
        address = "../include/dashboard-patient/my-appointment.php";
      }
      $.get(address,{},
        function(data) {
          $('#sec-secondary').html(data);    
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
        $(".time-format").inputmask({
          mask: "h:s t\\m",
          placeholder: "hh:mm xm",
          alias: "datetime",
          hourFormat: "12"
        });

        $('#reschedule-button').on('click', function() {
          $('#re-response').empty();
          var date =  $('#res-date').val();
          var time = $('#res-time-main').val();
          var validTime = time.match(/^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/);
          if(!validTime || date == '') {
              $('#re-response').html("<p style='color:red'>Please fill the form correctly</p>");
          }
          else {
            var edit = sessionStorage.getItem("edit");
            $('#load-reschedule img').css("display","block");   
            $.post("../include/dashboard-patient/reschudule-now.php",{app:edit,date:date,time:time},
                function(data) {
                $('#re-response').html(data);
                $('#load-reschedule img').css("display","none");       
            })
          }
          
        });
        </script>
      <?php }  else if($_SESSION['priv'] == 'doctor') { ?>
        <script type="text/javascript" src="../js/select2.js"></script>
        <script type="text/javascript">
          
          //select form prescribing medicine
          $("#medicineInput").select2();

          //next javascripts

          var show = <?php if(isset($_GET['show'])){echo '"'.$_GET['show'].'"';} else {echo '""';} ?>;
          if(show == ''){
            address = "../include/dashboard-doctor/appointment-main.php";
          }
          if(show == 'profile'){
            address = "../include/dashboard-patient/profile-change.php";
          }
          $.get(address,{},
            function(data) {
              $('#sec-secondary').html(data);    
          }); 


           

          $(".time-format").inputmask({
            mask: "h:s t\\m",
            placeholder: "hh:mm xm",
            alias: "datetime",
            hourFormat: "12"
          });
        </script>      
        <script type="text/javascript" src="../js/doc-dash.js"></script>
      <?php } 
        else if($_SESSION['priv'] == 'admin'){
          //code for admin 

      ?>
        <!-- script for admin -->
        <script type="text/javascript">
          // message from admin
          <?php if(isset($_SESSION['msg'])){  ?>
            var msg = "<?php echo $_SESSION['msg'] ?>";
            $("#msgfromadmin").html(msg);
            $('#myModalMsg').modal({
              backdrop: 'static',
              keyboard: true, 
              show: true
            });       
          <?php   } unset($_SESSION['msg']); ?>
          

          $("#admin-option").on('click',function() {
              $('#myModalOption').modal({
                backdrop: 'static',
                keyboard: true, 
                show: true
              });             
          });
        </script>
      <?php
        }

      ?>

      <!-- ALL PLUGINS -->
    <script src="../js/jquery.magnific-popup.min.js"></script>
      <script src="../js/jquery.pogo-slider.min.js"></script> 
    <script src="../js/slider-index.js"></script>
    <script src="../js/smoothscroll.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/form-validator.min.js"></script>
      <script src="../js/contact-form-script.js"></script>
    <script src="../js/isotope.min.js"></script> 
    <script src="../js/images-loded.min.js"></script>  
    <script src="../js/custom.js"></script>

  </body>
  
</html>