<?php
include("../includes/conn.php");
if(isset($_POST['method']))
{

	 $name=$_POST['name'];
	 $phone=$_POST['phone'];
	 $contact=$_POST['contact'];
	 $shippingaddress=$_POST['shippingaddress'];
	 $state=$_POST['state'];
	 $method=$_POST['method'];
	 $trans_id="COD".uniqid(rand(100,10000));
  	 $user_id=$session_id;
  	 $success=false;
  	 $total=0;

  	$sqltot = "SELECT SUM((products.productPrice-products.productDiscount)*cart.product_quantity) as subtotal ,SUM(products.shippingCharge) as shipping FROM cart INNER JOIN products ON cart.product_id=products.id WHERE user_id='$user_id'";
    $stmtot = $conn->prepare($sqltot);
    $stmtot->execute();
    $rowtot = $stmtot->fetch(PDO::FETCH_ASSOC);
	$subtotal=$rowtot['subtotal'];
	$shipping=$rowtot['shipping'];
	$total=$subtotal+$shipping;

  	if($method=="COD")
  	 {
  	 	
	$sql1 = "SELECT * FROM cart INNER JOIN products ON products.id=cart.product_id WHERE user_id='$user_id'";
    $stm1 = $conn->prepare($sql1);
    $stm1->execute();
    $count=$stm1->rowCount();
    if($count==0){

        echo '<div class="alert alert-warning" role="alert">
        Opps! This is no Item in the Cart
        </div>';
    }
    else 
    {
    	$row1 = $stm1->fetchall();
    	foreach ($row1 as $data) {

    	$product_id=$data['product_id'];
    	$product_qty=$data['product_quantity'];
    	$usermainid=$_SESSION['user_id'];

    	$payable=($data['productPrice']-$data['productDiscount'])*$product_qty;
		$shipping=$data['shippingCharge'];

	    $sql = "INSERT INTO `orders`(`userId`, `productId`, `quantity` ,`paymentMethod`,`trans_id` ,`payableprice`,`shipping`) VALUES ('$usermainid','$product_id','$product_qty','$method','$trans_id','$payable','$shipping')";
	    $stm = $conn->prepare($sql);
	    if($stm->execute())
	    {
	        $success=true;
	    }
	    
	    else
	    {
	    	$success=false;
	    	echo '<div class="alert alert-warning" role="alert">
	        Opps! Error This Item could not added to your Order
	        </div>';
	    }
   }

   if($success==true)
   {
   	 $sqlu = "UPDATE `users` SET `phone`='$phone',`contactno`='$contact',`shippingAddress`='$shippingaddress',`shippingState`='$state' WHERE id='$usermainid'";
	    $stmu = $conn->prepare($sqlu);
	    if($stmu->execute())
	    {
	    	echo  '<div class="alert alert-success" role="alert">
	        Congratulations! Your Order has been Submited Successfully. Thank You for Choosing Us.
	        </div>';
	        $sqldel = "DELETE FROM `cart` WHERE user_id ='$user_id'";
		    $stmdel = $conn->prepare($sqldel);
		    $stmdel->execute();
	    }	
     }
   } 	
  }

}
else
{
	echo '<div class="alert alert-warning" role="alert">
	        Opps! Error Invalid Request
	        </div>';
}

?>