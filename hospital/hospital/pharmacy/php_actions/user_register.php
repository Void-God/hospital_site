<?php
include("../includes/conn.php");

if(isset($_POST['email']) && isset($_POST['password']))
{

	 $fname=$_POST['fname'];
	 $lname=$_POST['lname'];
	 $name=$fname." ".$lname;
	 $email=$_POST['email'];
	 $password=md5($_POST['password']);
	 $phone=$_POST['phone'];
	 $address=$_POST['address'];
	
	if(empty($fname) || empty($lname) || empty($email) ||empty($password) ||empty($phone) ||empty($address))
	{
		echo '<div class="alert alert-warning" role="alert">
		Some of your field is empty! Please fill it Carefully.
		</div>';
	}

	else
	{

	$sql1 = "SELECT COUNT(email) AS num FROM users WHERE email = :username";
    $stm1 = $conn->prepare($sql1);
    $stm1->bindValue(':username', $email , PDO::PARAM_STR);
    $stm1->execute();
    $row1 = $stm1->fetch(PDO::FETCH_ASSOC);
  
    if($row1['num'] >0){

    	echo '<div class="alert alert-warning" role="alert">
		Warning ! This User is Already Exist. Please try with another Email.
		</div>';
    }
    else 
    {

	$csrf_token = md5(uniqid(rand(100,500), TRUE));
	$query="INSERT INTO `users`(`name`, `email`, `password`, `phone`, `address`, `csrf_token`)
	 VALUES ('$name','$email','$password','$phone','$address','$csrf_token')";
	$stmt = $conn->prepare($query);
	if($stmt->execute())
	{
		echo '<div class="alert alert-success" role="alert">
		Congratulations your account has been registered!<br> A varification link has been sent to your given Email Address.<br> Please Varify your Email!
		</div>';
		
	}
	else
	{
		echo '<div class="alert alert-warning" role="alert">
		Sorry Something went Wrong , please try again or Check your internet Connection.
		</div>';
	}
}
}

}
else
{
	echo '<div class="alert alert-warning" role="alert">
		You cannot access this file directly
		</div>';

}

?>