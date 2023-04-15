<?php
include("../includes/conn.php");
if(isset($_POST['product']))
{
	  $product_id=$_POST['product'];
	  $user_id=$session_id;

	$sql1 = "SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$user_id'";
    $stm1 = $conn->prepare($sql1);
    $stm1->execute();
    $count=$stm1->rowCount();
    $row1 = $stm1->fetch(PDO::FETCH_ASSOC);
    if($count > 0){

        echo '<div class="alert alert-warning" role="alert">
        Opps! This Item is already in your Cart
        </div>';
    }
    else 
    {
	    $sql = "INSERT INTO cart(user_id,product_id) VALUES ('$user_id','$product_id')";
	    $stm = $conn->prepare($sql);
	    if($stm->execute())
	    {
	    	echo  '<div class="alert alert-success" role="alert">
	        Congratulations! Item has been Added to Your Cart.
	        </div>';
	    }
	    else
	    {
	    	echo '<div class="alert alert-warning" role="alert">
	        Opps! Error This Item could not added to your Cart
	        </div>';
	    }
   }
}

?>