<?php
include("../includes/conn.php");
if(isset($_POST['cart_id']) && isset($_POST['quantity']) && isset($_POST['action']))
{

	if($_POST['action']=='update')
	{

	 $cart_id=$_POST['cart_id'];
	 $quantity=$_POST['quantity'];

	    $sql = "UPDATE cart set product_quantity=' $quantity' WHERE cart_id='$cart_id' ";
	    $stm = $conn->prepare($sql);
	    if($stm->execute())
	    {
	    	echo  '<div class="alert alert-success" role="alert">
	        Congratulations! Quantity has been Updated.
	        </div>';
	    }
	    else
	    {
	    	echo '<div class="alert alert-warning" role="alert">
	        Opps! Error This Item could not Update
	        </div>';
	    }
   }

}

if(isset($_GET['del_cart']))
{
	$cart_id=$_GET['del_cart'];
	 $sql = "DELETE FROM cart  WHERE cart_id='$cart_id' ";
	    $stm = $conn->prepare($sql);
	    if($stm->execute())
	    {

	    	header("location:../cart");
	    }
	    else
	    {
	    	echo '<div class="alert alert-warning" role="alert">
	        Opps! Error This Item could not Deleted
	        </div>';
	    }
}

?>