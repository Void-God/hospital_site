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
				<li><a href="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">User DashBoard</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--products-->
	<div class="products">	 
		<div style="text-align: center;" class="container">
			<div style="background-color:#fc5d0c; " class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4 style="color:white;">User Dashboard</h4>            
						<div id="slider-range"></div>							
						<table style="text-align: center;width: 100%; ">

							<?php 

							$user_email=$_SESSION['user_email'];
			                $sql1 = "SELECT * FROM users where email='$user_email'";
						    $stm1 = $conn->prepare($sql1);
						    $stm1->execute();
						    $row= $stm1->fetch(PDO::FETCH_ASSOC);
						    $name=$row['name'];
						    $phone=$row['phone'];
						    $address=$row['address'];
						    $isvarified=$row['email_varified'];
						    $regDate=$row['regDate'];
						    $varify="";

						    if($isvarified==1)
						    {
						    	$varify='<span><i style="margin-right:4px;" class="fa fa-check"></i> Email Varified</span>';
						    }
						    else
						    {
						    	$varify='<i style="margin-right:4px;" class="fa fa-times"></i> Not Varified</span>';
						    }
							?>


							<tr>
								<td>
									<img style="text-align: center; width: 100px;height: 100px;border-radius: 50%;" src="images/user.png">
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 30px;">
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;"><?php echo $name;?></button>
									</div>
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 0px;">
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;"><?php echo $user_email;?></button>
									</div>
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 0px;">
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;"><?php echo $phone;?></button>
									</div>
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 0px;">
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;"><?php echo $address;?></button>
									</div>
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 0px;">
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;"><?php echo $varify;?></button>
									</div>
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 0px;">
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;"><?php echo $regDate;?></button>
									</div>
								</td>
							</tr>
							<tr>
								<td >
									<div style="margin-top: 10px;">
									<a href="includes/logout.php">	
										<button style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; background-color:#242222;color: white;font-size: 14px; width:100%;height:40px;">Logout</button>
									</a>
									</div>
								</td>
							</tr>

						</table>
					</div>	
					
				</div>
			</div>

			<div style="margin-top: 10px; text-align:center;height: 100%;" class="product_div col-md-9 product-model-sec">
				<div class=" simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s" style="width: 100%; text-align: left;margin-bottom:10px;">
					<div style="text-align: center;background-color: green;">
						<h2 style="padding: 6px; color: white;">Order History</h2>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Product</th>
								<th>Name</th>
								<th>Qty </th>
								<th>Price</th>
								<th>Shipping</th>
								<th>Payable</th>
								<th>Payment </th>
								<th>Status</th>
								<th>Order Date</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							$query="select products.id as productid,products.productName as productname, products.productImage1 as image1 ,orders.quantity as quantity,orders.trans_id as trans_id,orders.payableprice as payable,orders.orderDate as orderdate,orders.payment_status as payment_status,orders.shipping as shipping,orders.paymentMethod as payment_method,products.productPrice as productprice,products.productDiscount as productdiscount,orders.id as id , orders.orderStatus as orderstatus  from orders join users on  orders.userId=users.id join products on products.id=orders.productId ";
							$stm1 = $conn->prepare($query);
						    $stm1->execute();
						    $count = $stm1->rowCount();
						    $row1 = $stm1->fetchall();
						    $cnt=0;
						    $status="";
						    foreach ($row1 as $row) {
						    	$cnt+=1;
						    	if($row['orderstatus']=="Delivered")
						    	{
						    		 $status='<span class="badge badge-success">'.$row['orderstatus'].'</span>';
						    	}
						    	else if($row['orderstatus']=="InProcess")
						    	{
						    		$status='<span class="badge badge-warning">'.$row['orderstatus'].'</span>';
						    	}
						    	else
						    	{
						    		$status='<span class="badge badge-warning">Pending</span>';
						    	}

							?>

							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo'<img style="width:50px;height:50px;" src="admin/productimages/Product-'.$row['productid']."/".$row['image1'].'">';  ?></td>
								<td><?php echo $row['productname']; ?></td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo $row['productprice']-$row['productdiscount']; ?></td>
								<td><?php echo $row['shipping']; ?></td>
								<td><?php echo $row['payable']+$row['shipping']; ?></td>
								<td><?php if($row['payment_status']==1){echo "Done";}else{echo "Pending";} ?></td>
								<td><?php echo $status; ?></td>
								<td><?php echo $row['orderdate']; ?></td>
								
							</tr>
						<?php }?>
							
						</tbody>
					</table>

				</div>

				
			<div class="clearfix"> </div>
		</div>

	</div>
	<!--//products-->
<?php include("includes/footer.php");?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

$(document).ready(function(){


});

</script>
</body>
</html>