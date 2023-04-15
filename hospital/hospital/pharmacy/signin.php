<?php 
include("includes/conn.php");
?>
<?php 
$error="";
if(isset($_POST['email']))
{
	$email=trim($_POST['email']);
	$password=trim($_POST['password']);

    //First Check User Exist or not

    $sql1 = "SELECT COUNT(email) AS num FROM users WHERE email = :username";
    $stm1 = $conn->prepare($sql1);
    $stm1->bindValue(':username', $email , PDO::PARAM_STR);
    $stm1->execute();
    $row1 = $stm1->fetch(PDO::FETCH_ASSOC);
  
    if($row1['num'] ==0){

        $error= 'Wrong Username ! This User is not Exist .';
    }
    else 
    {

    $sql = "SELECT  id ,email, name ,password FROM users WHERE email = :username";
    $stm = $conn->prepare($sql);
    $stm->bindValue(':username', $email ,PDO::PARAM_STR);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    if(md5($password)===$row['password'])
    {
        //regeneration Session id

        $_SESSION['user_email'] =$row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        //Creating CSRF Token

		//Update User Log
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=1;
		$query="insert into userlog(userEmail,userip,status) values('".$_SESSION['ulogin']."','$uip','$status')";
		$stmt = $conn->prepare($query);
		$stmt->execute();
        header("location: user-dashboard");
        exit();
    }
    else
    {
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=0;
		$query1="insert into userlog(userEmail,userip,status) values('$email','$uip','$status')";
		$stmt1 = $conn->prepare($query1);
		$stmt1->execute();
        $error=" Wrong Username and Password Combination. ";
    }
    
    }
}
?>

<?php 
include("includes/head.php");
include("includes/navbar.php");
?>
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Sign In</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title">SignIn<span> Form</span></h3>
			<p>Please Signin to Start your Session</p>
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to Big Pharmacy ! <br> Not a Member? <a href="register">  Register Now »</a> </h4>
			</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form action="" method="POST">
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<input type="submit" name="Sign In" value="Sign In">
					<lable style="text-align: center;margin: 16px;padding-top:6px;color: red;font-style: bold;"><?php echo  $error; ?></lable> 
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" checked="" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--//login-->
	<!--footer-->
	
	<?php include("includes/footer.php"); ?>

</body>
</html>