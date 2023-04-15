<?php 
  session_start();
  if(isset($_SESSION['priv'])) {

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
    <title>United Interact</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98" class="set-home" >

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
		<nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid padd-nav-auto">
				<a class="navbar-brand" href="css/../"><img src="images/logo.png" style="height:86px;width:112px;" alt="image"></a>
        <div class="curve"></div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
               

                <div class="collapse navbar-collapse justify-content-end a-change" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="#home">Home</a></li>
                        <li><a class="nav-link" href="#" data-toggle='modal' data-target='#myModal00'>Appointment</a></li>
                        <li><a class="nav-link" href="#team">Doctors</a></li>
                        <li><a class="nav-link" href="Pharmacy/">Pharmacy</a></li>
                        <li><a class="nav-link" href="#blog">Blogs</a></li>
                        <li><a class="nav-link" href="#services">Sevices</a></li>
                        <li><a class="nav-link" href="#about">About Us</a></li>
                        <li><a class="nav-link" href="#contact">Contact Us</a></li>
                        <?php if(!isset($_SESSION['userID'])) { ?>
                          <li><a class="nav-link" href="#" data-toggle="modal" data-target="#myModal01">Login</a></li>
                        <?php } else {
                        ?>
                          <li><a class="nav-link" href="dashboard/">Dashboard</a></li>
                        <?php 
                      } ?>
                    </ul>
                </div>                
            </div>
        </nav>
	</header>
  

  <div id="myModal03" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body" style="height:520px;overflow-y:auto;">
            <!-- Start Appointment -->
          <div id="appointment" class="appointment-main">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box">
                    <h2>Forgot Password</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="well-block">
                                <form id="forgotForm" method="post">
                                    <!-- Form start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name"></label>
                                                <input id="inputUFP" name="userID" type="text" placeholder="Enter Your userID" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div id="leastFP" class="container">
                                          
                                        </div>  

                                        <div id="pasteFP" class="container">
                                            
                                        </div>                          


                                        <div class="container">
                                          <div id="confirmFP" class="row pad-14">
                                            <button id="searchUFP" style="float:right !important;" class="btn btn-success"><i class="fa fa-search"></i></button>
                                          </div>                                          
                                        </div>

                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Appointment -->            
        </div>
        <div class="modal-footer modal_bk_color">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 




  <div id="myModal02" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body" style="height:520px;overflow-y:auto;">
            <!-- Start Appointment -->
          <div id="appointment" class="appointment-main">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box">
                    <h2>SIGN UP</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="well-block">
                                <form id="signForm" method="post">
                                    <!-- Form start -->
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Email<span class="require">*</span></label>
                                                <input id="signEmail" name="email" type="email" placeholder="E-mail" class="form-control input-md" required>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name" >Name<span class="require">*</span></label>
                                                <input id="signName" pattern="[A-Za-z]+" name="userName" type="text" placeholder="Name" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="time">Blood Group</label>
                                                <select id="signBlood" name="gender" class="form-control input-md">
                                                    <option value="">Choose Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="date">Date Of Birth<span class="require">*</span></label>
                                                <input id="signDOB" name="DOB" type="date" placeholder="Age" class="form-control input-md" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="time">Gender<span class="require">*</span></label>
                                                <select id="signGender" name="gender" class="form-control input-md" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Mobile No.<span class="require">*</span></label>
                                                <input id="signMob" name="mob" type="number" placeholder="Mobile Number" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"  for="name">Password<span class="require">*</span></label>
                                                <input id="signPass" pattern=".{8,}" title="Must contain at least 8 or more characters" name="password" type="password" placeholder="Password" class="form-control input-md" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"  title="Must contain at least 8 or more characters"for="name">Confirm password<span class="require">*</span></label>
                                                <input id="signcPass" pattern=".{8,}" name="conPassword" type="password" placeholder="Confirm Password" class="form-control input-md" required>
                                            </div>
                                        </div>
                                        
                                        <div id="otpSection" class="col-md-12 spe-btn">
                                            
                                        </div>
                                        
                                        </br><br/><br/>
                                        <div id="buttonalpha" class="col-md-12 spe-btn"> 
                                              <button type="submit" id="signOTP" class="btn btn-success ">SEND OTP</button>
                                        </div>
                                        
                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Appointment -->            
        </div>
        <div class="modal-footer modal_bk_color">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 


  <div id="myModal01" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body" style="height:520px;">
            <!-- Start Appointment -->
          <div id="appointment" class="appointment-main">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box">
                    <h2>Login</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="well-block">
                                <form id="loginform" method="post">
                                    <!-- Form start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Email</label>
                                                <input id="loginUser" name="userID" type="text" placeholder="Enter Email" class="form-control input-md">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Password</label>
                                                <input id="loginPassword" name="password" type="password" placeholder="Password" class="form-control input-md">
                                            </div>
                                            <div id="errorhendle" class="row">
                                              
                                            </div>
                                        </div>
                                        <br/></br>

                                        <div class="col-md-12 spe-btn"> 
                                          <button id="loginNow" class="btn btn-success "><img src="images/load-med.gif" style="width:40px;height:40px;display:none;"><span>LOGIN</span></button>
                                        </div>

                                        <br/>
                                        
                                        <div class="container">
                                          <div class="row">
                                            <div class="lid-6">
                                              <a id="signUpNow" href="#">Sign Up</a>
                                            </div>
                                            <div class="lid-6">
                                              <a id="passwordReset" href="#" style="float:right;">Forgot Password?</a>
                                            </div>
                                          </div>
                                        </div>

                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Appointment -->            
        </div>
        <div class="modal-footer modal_bk_color">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 





  <div id="myModal00" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="height:520px;overflow-y:auto;">
          <!-- Start Appointment -->
          <div id="appointment" class="appointment-main">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box">
                    <h2>Appointment</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="well-block">
                                <div class="well-title">
                                    <h2 style="text-align:center;">Book an Appointment</h2>
                                </div>
                                <form method="post">
                                    <!-- Form start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Name</label>
                                                <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="email">Email</label>
                                                <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md">
                                            </div>
                                        </div>
                                        <!-- Text input-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="date">Preferred Date</label>
                                                <input id="date" name="date" type="date" placeholder="Preferred Date" class="form-control input-md">
                                            </div>
                                        </div>
                                        <!-- Select Basic -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="time">Preferred Time</label>
                                                <select id="time" name="time" class="form-control">
                                                    <option value="8:00 to 9:00">8:00 to 9:00</option>
                                                    <option value="9:00 to 10:00">9:00 to 10:00</option>
                                                    <option value="10:00 to 1:00">10:00 to 1:00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Select Basic -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="appointmentfor">Department</label>
                                                <select id="appointmentfor" name="appointmentfor" class="form-control">
                                                    <option value="Choose Department">Choose Department</option>
                                                    <option value="Gynacology">Gynacology</option>
                                                    <option value="Dermatologist">Dermatologist</option>
                                                    <option value="Orthology">Orthology</option>
                                                    <option value="Anesthesiology">Anesthesiology</option>
                                                    <option value="Ayurvedic">Ayurvedic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button id="singlebutton" name="singlebutton" class="new-btn-d br-2">Make An Appointment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="well-block">
                                <div class="well-title">
                                    <h2>Why Appointment with Us</h2>
                                </div>
                                <div class="feature-block">
                                    <div class="feature feature-blurb-text">
                                        <h4 class="feature-title">24/7 Hours Available</h4>
                                        <div class="feature-content">
                                            <p>Integer nec nisi sed mi hendrerit mattis. Vestibulum mi nunc, ultricies quis vehicula et, iaculis in magnestibulum.</p>
                                        </div>
                                    </div>
                                    <div class="feature feature-blurb-text">
                                        <h4 class="feature-title">Experienced Staff Available</h4>
                                        <div class="feature-content">
                                            <p>Aliquam sit amet mi eu libero fermentum bibendum pulvinar a turpis. Vestibulum quis feugiat risus. </p>
                                        </div>
                                    </div>
                                    <div class="feature feature-blurb-text">
                                        <h4 class="feature-title">Low Price & Fees</h4>
                                        <div class="feature-content">
                                            <p>Praesent eu sollicitudin nunc. Cras malesuada vel nisi consequat pretium. Integer auctor elementum nulla suscipit in.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Appointment -->          
        </div>
        <div class="modal-footer modal_bk_color">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
	<!-- End header -->
	
	<!-- Start Banner -->
	<div class="ulockd-home-slider">
		<div class="container-fluid">
			<div class="row">
				<div class="pogoSlider" id="js-main-slider">
					<div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image:url(images/slider-01.jpg);">
						<div class="lbox-caption pogoSlider-slide-element">
							<div class="lbox-details">
								<h1>Welcome to United Interact</h1>
								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum </p>
								<a href="#" class="btn">Contact Us</a>
							</div>
						</div>
					</div>
					<div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image:url(images/slider-02.jpg);">
						<div class="lbox-caption pogoSlider-slide-element">
							<div class="lbox-details">
								<h1>We are Expert in The Field of United Interact</h1>
								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum</p>
								<a href="#appointment" class="btn">Appointment</a>
							</div>
						</div>
					</div>
					<div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image:url(images/slider-03.jpg);">
						<div class="lbox-caption pogoSlider-slide-element">
							<div class="lbox-details">
								<h1>Welcome to United Interact</h1>
								<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum </p>
								<a href="#" class="btn">Contact Us</a>
							</div>
						</div>
						
					</div>
				</div><!-- .pogoSlider -->
			</div>
		</div>
	</div>
	<!-- End Banner -->

  <!-- Start Team -->
  <div id="team" class="team-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="title-box">
            <h2>Our Doctor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
      </div>
      
      <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/img-1.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Williamson</h3>
                            <span class="post">web developer</span>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/img-2.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">kristina</h3>
                            <span class="post">Web Designer</span>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="images/img-3.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Steve Thomas</h3>
                            <span class="post">web developer</span>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>
  </div>  
  <!-- End Team -->

  <!-- Start Blog -->
  <div id="blog" class="blog-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="title-box">
            <h2>Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="blog-inner">
            <div class="blog-img">
              <img class="img-fluid" src="images/blog-img-01.jpg" alt="" />
            </div>
            <div class="item-meta">
              <a href="#"><i class="fa fa-comments-o"></i> 5 Comment </a>
              <a href="#"><i class="fa fa-user-o"></i> Admin</a>
              <span class="dti">25 July 2018</span>
            </div>
            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
            <a class="new-btn-d br-2" href="#">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="blog-inner">
            <div class="blog-img">
              <img class="img-fluid" src="images/blog-img-02.jpg" alt="" />
            </div>
            <div class="item-meta">
              <a href="#"><i class="fa fa-comments-o"></i> 5 Comment </a>
              <a href="#"><i class="fa fa-user-o"></i> Admin</a>
              <span class="dti">25 July 2018</span>
            </div>
            <h2>Proin vel sem ut lorem rhoncus lacinia. </h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
            <a class="new-btn-d br-2" href="#">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="blog-inner">
            <div class="blog-img">
              <img class="img-fluid" src="images/blog-img-03.jpg" alt="" />
            </div>
            <div class="item-meta">
              <a href="#"><i class="fa fa-comments-o"></i> 5 Comment </a>
              <a href="#"><i class="fa fa-user-o"></i> Admin</a>
              <span class="dti">25 July 2018</span>
            </div>
            <h2>Aliquam egestas magna a malesuada rutrum. </h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
            <a class="new-btn-d br-2" href="#">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog -->

  <!-- Start Services -->
  <div id="services" class="services-box" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="title-box">
            <h2>Services</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme">
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-h-square" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-wheelchair" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item"> 
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-user-md" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
            <div class="item">
              <div class="serviceBox">
                <div class="service-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></div>
                <h3 class="title">Lorem ipsum dolor</h3>
                <p class="description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
                </p>
                <a href="#" class="new-btn-d br-2">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>
  <!-- End Services -->
	
	<!-- Start About us -->
	<div id="about" class="about-box" style="background-color:lightyellow;">
		<div class="about-a1">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title-box">
							<h2>About Us</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="row align-items-center about-main-info">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<h2> Welcome to United Interact </h2>
								<p class="about_p">Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit. Nulla ut magna eu purus cursus sagittis. Praesent fermentum tincidunt varius. Proin sit amet tempus magna. Fusce pellentesque vulputate urna. </p>
								<p class="about_p">Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum, suscipit sit amet auctor quis, vehicula ut leo. Maecenas felis nulla, tincidunt ac blandit a, consectetur quis elit. Nulla ut magna eu purus cursus sagittis. Praesent fermentum tincidunt varius. Proin sit amet tempus magna. Fusce pellentesque vulputate urna. </p>
								<a href="#" class="new-btn-d br-2">Read More</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="about-m">
									<ul id="banner">
										<li>
											<img src="images/about-img-01.jpg" alt="">
										</li>
										<li>
											<img src="images/about-img-02.jpg" alt="">
										</li>
										<li>
											<img src="images/about-img-03.jpg" alt="">
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About us -->
	
	
	<!-- Start Gallery -->
<!-- 	<div id="gallery" class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Gallery</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>
			
			<div class="popup-gallery row clearfix">
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="images/gallery-01.jpg" alt="">
						<div class="box-content">	
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-01.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="images/gallery-02.jpg" alt="">
						<div class="box-content">
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-02.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">					
					<div class="box-gallery">
						<img src="images/gallery-03.jpg" alt="">
						<div class="box-content">							
							<ul class="icon">
								<li><a href="images/gallery-03.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="images/gallery-04.jpg" alt="">
						<div class="box-content">	
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-04.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="images/gallery-05.jpg" alt="">
						<div class="box-content">							
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-05.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">					
					<div class="box-gallery">
						<img src="images/gallery-06.jpg" alt="">
						<div class="box-content">
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-06.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="images/gallery-07.jpg" alt="">
						<div class="box-content">
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-07.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="box-gallery">
						<img src="images/gallery-08.jpg" alt="">
						<div class="box-content">		
							<h3 class="title">Lorem ipsum dolor</h3>
							<ul class="icon">
								<li><a href="images/gallery-08.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- End Gallery -->
	

	

	
	<!-- Start Contact -->
	<div id="contact" class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Contact us</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-12 col-xs-12">
				  <div class="contact-block">
					<form id="contactForm">
					  <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div>                                 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
								<div class="help-block with-errors"></div>
							</div> 
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Your number" id="number" class="form-control" name="number" required data-error="Please enter your number">
								<div class="help-block with-errors"></div>
							</div> 
						</div>
						<div class="col-md-12">
							<div class="form-group"> 
								<textarea class="form-control" id="message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="submit-button text-center">
								<button class="btn btn-common" id="submit" type="submit">Send Message</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div> 
								<div class="clearfix"></div> 
							</div>
						</div>
					  </div>            
					</form>
				  </div>
				</div>
				
				
				<div class="col-lg-12 col-xs-12">
					<div class="left-contact">
						<h2>Address</h2>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-location-arrow" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Address</h4>
								<p>Fleming 196 Woodside Circle Mobile, FL 36602</p>
							</div>
						</div>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Email</h4>
								<a href="#">demoinfo@gmail.com</a><br>
								<a href="#">demoinfo@gmail.com</a>
							</div>
						</div>
						<div class="media cont-line">
							<div class="media-left icon-b">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
							</div>
							<div class="media-body dit-right">
								<h4>Phone Number</h4>
								<a href="#">12345 67890</a><br>
								<a href="#">12345 67890</a>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
	<!-- End Contact -->
	
	<!-- Start Subscribe -->
	<div class="subscribe-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="subscribe-inner text-center clearfix">
						<h2>Subscribe</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<form action="#" method="post">
							<div class="form-group">
								<input class="form-control-1" id="email-1" name="email" placeholder="Email Address" required="" type="text">
							</div>
							<div class="form-group">
								<button type="submit" class="new-btn-d br-2">
									Subscribe
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Subscribe -->

  <div class="main-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-top">
            <a class="new-btn-d br-2" href="#"><span>Book Appointment</span></a>
            <div class="mail-b"><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> demo@gmail.com</a></div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-top">
            <ul>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            </ul>
          </div>
<!-- 
          <div class="wel-nots">
            <p>Welcome to Our United Interact!</p>
          </div> -->

        </div>
      </div>
    </div>
  </div>
	
	<!-- Start Footer -->
	<footer class="footer-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="footer-company-name">All Rights Reserved. © Gaurav Arora/God slayer 2018</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->


	
	<a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>
  <?php 
    include "php/onload.php"; 
  ?>

	<!-- ALL JS FILES -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/js.js"></script>  
  <script type="text/javascript" src="js/check_alpha.js"></script> 
    <!-- ALL PLUGINS -->
	<script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script> 
	<script src="js/slider-index.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/TweenMax.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
	<script src="js/isotope.min.js"></script>	
	<script src="js/images-loded.min.js"></script>	
  <script src="js/custom.js"></script>

  
</html>