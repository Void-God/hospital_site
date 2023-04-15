<?php 
include("includes/conn.php");
?>
<?php 
include("includes/head.php");
include("includes/navbar.php");
?>
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title">Register<span> Form</span></h3>
			<p>Register Your Account to Place Orders</p>
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Already have an Account ?<a href="signin">  Sign In »</a> </h4>
			</div>
			<div class="login-body">
				<form id="register_form" class="wow fadeInUp animated" data-wow-delay=".7s">
					<input type="text" name="fname" placeholder="First Name" required="">
					<input type="text" name="lname" placeholder="Last Name" required="">
					<input type="text" name="email" class="email" placeholder="Email Address" required="">
					<input type="password"  name="password" class="lock" placeholder="Password">
					<input type="text" name="phone" placeholder="Phone" required="">
					<input type="text" name="address" placeholder="Address" required="">
					<div style="text-align: center;" id="message"></div>
					<input type="submit" name="Register" value="Register">
				</form>
			</div>
		</div>
	</div>
	<!--//login-->
	<?php include("includes/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){

	$("#register_form").on('submit', function() {
	event.preventDefault();
    var register_form=$(this).serialize();
    $.ajax({
    type: "POST",
    url: "php_actions/user_register.php",
    data: register_form,
    success: function(result){
    	$("#message").html(result);
    }
    });

});



});
</script>
</body>
</html>