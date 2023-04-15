<?php 
	session_start();
	if(isset($_SESSION['priv'] ) && $_SESSION['priv'] == 'admin' && isset($_POST['name'])) {
		//code
		include "../config.inc.php";
		$branchName = $_POST['name'] ; 
		$branchNumber = $_POST['number']; 
		$branchAddress = $_POST['address']; 
		if(empty($branchName) || empty($branchNumber) || empty($branchAddress)){
			$_SESSION['msg'] =  "Some fields are empty please fill form correctly";
		}
		else {
			$query = "INSERT INTO branches(branch_name,branch_number,branch_address) VALUES ('$branchName','$branchNumber','$branchAddress')";
			if(mysqli_query($con,$query)){
				$_SESSION['msg'] =  "Branch Added Successfully!";
			}
			else {
				$_SESSION['msg'] =  "Some Problem Occured Please Try again";
			}	
		}			
	}
	header("Location:../../dashboard/");
?>