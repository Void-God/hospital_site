	<!--header-->
	<div class="header">
		<div class="top-header navbar navbar-default"><!--header-one-->
			<div class="container">
				<div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
					<p>Welcome to Our Pharmacy
					<?php 
						if(isset($_SESSION['user_email']) && isset($_SESSION['user_id']) && isset($_SESSION['user_name']))
						{

							echo '<i style="margin-left:10px;" class="fa fa-user"></i> <a href="user-dashboard">User Dashboard</a>';
						}
						else
						{
							echo '<a href="register">Register </a> Or <a href="signin">Sign In </a>';
						}
					 ?>
					
					</p>
				</div>
				<div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li><a href="#"> </a></li>
						<li><a href="#" class="pin"> </a></li>
						<li><a href="#" class="in"> </a></li>
						<li><a href="#" class="be"> </a></li>
						<li><a href="#" class="you"> </a></li>
						<li><a href="#" class="vimeo"> </a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="top-nav navbar navbar-default"><!--header-three-->
			<div class="container">
				<div style="margin-top: 15px;" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
					<h2><a href="home"> <img style="width:60px;height:50px;margin-bottom:6px; padding-right:10px;" src="images/logo.png"> United Pharmacy</a></h2>
				</div>
				<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav top-nav-info">
							<li><a href="home" class="active">Home</a></li>
							<li class="dropdown grid">
								<a id="products" href="products" class="dropdown-toggle list1">Products</a>
							</li>
							<li class="dropdown grid">
								<a id="about" href="about-us" class="dropdown-toggle list1">About Us</a>
							</li>				
							<li class="dropdown grid">
								<a id="contact" href="contact-us" class="dropdown-toggle list1" >Contact Us</a>
							</li>
							<li class="dropdown grid">
								<a id="faq" href="FAQ" class="dropdown-toggle list1">FAQ</a>
							</li>
							<li><a id="cart" href="cart" >Cart</a></li>
						</ul> 
						<div class="clearfix"> </div>
						<!--//navbar-collapse-->
						
					</div>
					<!--//navbar-header-->
				</nav>
				
			</div>
		</div>
	</div>