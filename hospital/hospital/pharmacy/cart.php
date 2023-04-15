<?php include("includes/conn.php");?>
<?php 
$msg="";
$order_success=false;
if(isset($_POST['success']) && !empty($_POST['success']) 
	&& isset($_POST['method']) && !empty($_POST['method']) && isset($_POST['contact']) && isset($_POST['phone']) && isset($_POST['shippingaddress']) && isset($_POST['state']) && isset($_POST['trans_id']))
{
	$success=$_POST['success'];
	$method=$_POST['method'];
	if(!empty($_POST['contact']))
	{
		$contact=$_POST['contact'];
	}
	else
	{
		$contact="";
	}
	$phone=$_POST['phone'];
	$shippingaddress=$_POST['shippingaddress'];
	$state=$_POST['state'];
	$trans_id=$_POST['trans_id'];
  	$user_id=$session_id;
	if($success=="success" && $method=="online")
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
	        $paid=1;

	        $sql = "INSERT INTO `orders`(`userId`, `productId`, `quantity` ,`paymentMethod`,`trans_id` ,`payableprice`,`shipping`,`payment_status`) VALUES ('$usermainid','$product_id','$product_qty','$method','$trans_id','$payable','$shipping','$paid')";
	        $stm = $conn->prepare($sql);
	        if($stm->execute())
	        {
	            $order_success=true;
	        }
	        
	        else
	        {
	            $order_success=false;
	            $msg='<div class="alert alert-warning" role="alert">
	            Opps! Error This Item could not added to your Order
	            </div>';
	        }
	   }

		   if($order_success==true)
		   {
		     $sqlu = "UPDATE `users` SET `phone`='$phone',`contactno`='$contact',`shippingAddress`='$shippingaddress',`shippingState`='$state' WHERE id='$usermainid'";
		        $stmu = $conn->prepare($sqlu);
		        if($stmu->execute())
		        {
		            $msg= '<div class="alert alert-success" role="alert">
			        Congratulations! Your Order has been Submited Successfully.Your Payment has been Done! Thank You for Choosing Us.
			        </div>';
		            $sqldel = "DELETE FROM `cart` WHERE user_id ='$user_id'";
		            $stmdel = $conn->prepare($sqldel);
		            $stmdel->execute();
		        }   
		     }
		     else
		     {
		     	$msg= '<div class="alert alert-warning" role="alert">
		        Opps! Error in Placing your Order. Please Check your Internet Connection.
		        </div>';
		     }
	   }
	}
	else
	{
		$msg= '<div class="alert alert-warning" role="alert">
        Your Payment did not Paid Successfully. Please Try again or Place Order By Cash on Delivery Method.
        </div>';
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
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Cart</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--cart-items-->
	<div  class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart</h3>
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
			<!-- Cart Item Here-->
			<div class="col-md-6">
			<?php 

				if(!empty($msg) && isset($_POST['success']) && isset($_POST['method']))
				{
					echo $msg;
				}

			?>
			  <div  style="text-align: center;" id="message"></div>
                <div id="contentDiv" class="feature-block">	
                    <table class="table table-bordered table-dark">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name</th>
					      <th scope="col">Price</th>
					      <th scope="col">Qauntity - Update</th>
					      <th scope="col">Delete</th>
					    </tr>
					  </thead>
					  <tbody>
					  	 <?php
                $user_id=$session_id;
                $sql1 = "SELECT * FROM cart INNER JOIN products ON cart.product_id=products.id WHERE cart.user_id='$user_id' ORDER BY cart.cart_id DESC";
			    $stm1 = $conn->prepare($sql1);
			    $stm1->execute();
			    $count = $stm1->rowCount();
			    $row1 = $stm1->fetchall();
			    $cnt=0;
			    if($count>0)
			    {
			    	foreach ($row1 as $row) {
			    		$cnt+=1;
			   
                ?>
					    <tr>
					      <th scope="row"><?php echo $cnt;?></th>
					      <td><?php echo $row['productName'];?></td>
					      <td><?php echo $row['productPrice']-$row['productDiscount'];?></td>
					      <td>
					      	<div class="quantity_div">
							   <input style="font-weight: bold;border-radius: 50%;background-color: #1f9c66;color: white;" type="button" value="-" class="qty-minus">
							   <input style="width: 40px;" type="number" name="quantity" value="<?php echo $row['product_quantity'] ?>" class="qty">
							   <input style="font-weight: bold;border-radius: 50%;background-color: #143069;color: white;" type="button" value="+" class="qty-plus">
							   <input type="hidden" id="cart_id" value="<?php echo $row['cart_id'];?>" name="cart_id">

							</div>
					      </td>
					      <td><a href="php_actions/cart_actions.php?del_cart=<?php echo $row['cart_id'];?>"><i style="color: white;text-align: center;border-radius: 50%;background-color:#1f9c66;padding:10px; " class="fa fa-times"></i></a></td>
					    </tr>
					    <?php } } ?>
					  </tbody>
					</table>

					<table class="table table-bordered table-dark">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">SubTotal</th>
					      <th scope="col">Shipping</th>
					      <th scope="col">Total</th>
					    </tr>
					  </thead>
					  <tbody>
					  	 <?php
                $user_id=$session_id;
                $sql2 = "SELECT * FROM cart INNER JOIN products ON cart.product_id=products.id WHERE cart.user_id='$user_id' ORDER BY cart.cart_id DESC";
			    $stm2 = $conn->prepare($sql1);
			    $stm2->execute();
			    $count = $stm2->rowCount();
			    $row2 = $stm2->fetchall();
			    $cnt=0;
			    $grandtotal=0;
			    if($count==0)
			    {
			    }
			    else
			    {
			    	foreach ($row2 as $rows) {
			    		$cnt+=1;
			    		$grandtotal+=(($rows['productPrice']-$rows['productDiscount'])*$rows['product_quantity'])+$rows['shippingCharge'];
			   
                ?>
					    <tr>
					      <th scope="row"><?php echo $cnt;?></th>
					      <td><?php echo ($rows['productPrice']-$rows['productDiscount'])." x ".$rows['product_quantity']." = ". ($rows['productPrice']-$rows['productDiscount'])*$rows['product_quantity'];?></td>
					      <td><?php echo $rows['shippingCharge'];?></td>
					      </td>
					      <td><?php echo (($rows['productPrice']-$rows['productDiscount'])*$rows['product_quantity'])+$rows['shippingCharge'];?></td>
					    </tr>
					    <?php } } ?>

					  </tbody>
					</table>
					<div style="text-align: center;background-color: #fc5d0c;;padding: 10px;font-size: 20px;color: white;border-bottom-right-radius: 25px;border-top-right-radius: 25px;border-bottom-left-radius: 25px;border-top-left-radius: 25px;"><lable style="margin-right: 25px;">Grand Total : <?php echo $grandtotal;?></lable></div>
                </div>
                 </div>

               <div class="col-md-6">
			     <div style="padding: 0px; width: 100%;" class="col-md-12 login-page">
					<div  class="widget-shadow col-md-12">

						<h3 style="text-align: center; margin-top: 20px;padding-top: 20px;">Checkout Details</h3>

						<?php 

						if(!isset($_SESSION['user_email']) && !isset($_SESSION['user_id']) && !isset($_SESSION['user_name']) || $count==0)
						{
							echo '<h4 style="text-align: center;margin-bottom:20px;margin-top:-10px;padding-bottom:20px;">For Checkout Please Add items in your Cart and Signin your Account for Checkout! </h4> ';
						}
						else
						{
							$user_email=$_SESSION['user_email'];
			                $sql1 = "SELECT * FROM users where email='$user_email'";
						    $stm1 = $conn->prepare($sql1);
						    $stm1->execute();
						    $row= $stm1->fetch(PDO::FETCH_ASSOC);
						    $name=$row['name'];
						    $phone=$row['phone'];
						    $address=$row['shippingAddress'];
						    $shippingState=$row['shippingState'];
						?>
						<div style="margin-top: -30px;" class="login-body">
							<form id="order_form" action="php_actions/pay_script.php" method="POST" class="wow fadeInUp animated" data-wow-delay=".7s">
								<input id="cus_name" class="col-md-12" name="name" value="<?php echo $name; ?>" type="text" placeholder="Full Name" required="">
								<input id="cus_email" class="col-md-12" name="email" disabled="" value="<?php echo $user_email; ?>" type="text" class="email" placeholder="Email" required="">
								<input id="cus_phone" class="col-md-12" name="phone" type="text" value="<?php echo $phone; ?>" placeholder="Phone" required="">
								<input id="cus_contact" class="col-md-12" name="contact" type="text" placeholder="Contact (Optional)">
								<input id="cus_address" class="col-md-12" name="shippingaddress" type="text" value="<?php echo $address; ?>" placeholder="Shipping Address" required="">
								<input id="cus_state" class="col-md-12" name="state" value="<?php echo $shippingState; ?>" type="text" placeholder="Country & State" required="">
								<div class="col-md-12">
									<table>
										<tr>
											<td><input checked="" id="cod" name="method" value="COD" type="radio"/></td>
											<td><img style="height:60px;width:120px;margin-left: 10px;" src="images/cod.png"/></td>
											<td style="padding-left: 40px;"><input id="online" name="method" value="online" type="radio"/></td>
											<td><img style="height:60px;width:120px;margin-left: 10px;" src="images/online.png"/></td>
										</tr>
									</table>
								</div>
									<input id="form_btn_order" style="text-align: center;background-color: #fc5d0c;;padding: 10px;font-size: 20px;color: white;border-bottom-right-radius: 25px;border-top-right-radius: 25px;border-bottom-left-radius: 25px;border-top-left-radius: 25px;margin-top: 20px;margin-bottom: 20px;" class="col-md-10" name="place_order" type="submit" value="Place Order">	
									<input id="form_btn_pay" style="text-align: center;background-color: #fc5d0c;;padding: 10px;font-size: 20px;color: white;border-bottom-right-radius: 25px;border-top-right-radius: 25px;border-bottom-left-radius: 25px;border-top-left-radius: 25px;margin-top: 20px;margin-bottom: 20px;display: none;" class="col-md-10" name="pay_online" type="submit" value="Pay Now">
							</form>
							
							<div style="text-align: center;" id="message"></div>
						</div>
					<?php } ?>
					</div>
				 </div>
 			  </div>

			</div>
		</div>
	</div>
	<!--//cart-items-->	
<?php include("includes/footer.php");?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){

    $('a').removeClass('active');
    $("#cart").addClass('active');

$(document).on('click', '.qty-plus', function () {
   $(this).prev().val(+$(this).prev().val() + 1);
    var action="update";
    var cart_id = $(this).closest("div.quantity_div").find('#cart_id').val();
    var quantity =$(this).closest("div.quantity_div").find("input[name='quantity']").val();
    $.ajax({
    type: "POST",
    url: "php_actions/cart_actions.php",
    data: {"cart_id":cart_id,"quantity":quantity ,"action":action},
    success: function(result){
    	$("#message").html(result);
        $('#contentDiv').load(location.href + " #contentDiv");
    }
    });
});
$(document).on('click', '.qty-minus', function () {
   if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
    var action="update";
    var cart_id = $(this).closest("div.quantity_div").find('#cart_id').val();
    var quantity =$(this).closest("div.quantity_div").find("input[name='quantity']").val();

    $.ajax({
    type: "POST",
    url: "php_actions/cart_actions.php",
    data: {"cart_id":cart_id,"quantity":quantity ,"action":action},
    success: function(result){
    	$("#message").html(result);
       $('#contentDiv').load(location.href + " #contentDiv");
    }
    });
});

$("#cod").on('click', function () {
   
$("#form_btn_order").css("display","block");
$("#form_btn_pay").css("display","none");

});

$("#online").on('click', function () {
   
$("#form_btn_pay").css("display","block");
$("#form_btn_order").css("display","none");

});


var getdata='<?php if(isset($_GET['product'])){echo $_GET['product'];}else {echo "";} ?>';
if(getdata=="")
{
	
}
else
{
    $.ajax({
    type: "POST",
    url: "php_actions/add_to_cart.php",
    data: {"product":getdata},
    success: function(result){
    	$("#message").html(result);
    $('#contentDiv').load(location.href + " #contentDiv");
    }
    });
}

if ($("#cod").prop("checked")) {
    

$("#form_btn_order").on('click', function() {

	event.preventDefault();
    var name=$("#cus_name").val();
    var email=$("#cus_email").val();
    var phone=$("#cus_phone").val();
    var contact=$("#cus_contact").val();
    var shippingaddress=$("#cus_address").val();
    var state=$("#cus_state").val();
    var method=$("#cod").val();
    $.ajax({
    type: "POST",
    url: "php_actions/place_order.php",
    data: {"name":name,"email":email,"phone":phone,"shippingaddress":shippingaddress ,"contact":contact,"state":state,"method":method},
    success: function(result){
    	$("#message").html(result);
    $('#contentDiv').load(location.href + " #contentDiv");
    }
    });
});
}

});
</script>
</body>
</html>