<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];

//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/"."Product-".$productid;
if(!is_dir($dir)){
		mkdir($dir);
	}

//checking Image1 Format
	$valid1=false;
    $img1type = explode('.', $_FILES['productimage1']['name']);
    $img1type = $img1type[count($img1type)-1];
    $img1_name=uniqid(rand()).'.'.$img1type; 
    $img1url = $dir."/".$img1_name;
    //Cheking either file aleary uploaded or not
    if(in_array($img1type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
         $valid1=true;
       }
     else
     {
     	$valid1=false;
     }

    //checking Image2 Format
	$valid2=false;
    $img2type = explode('.', $_FILES['productimage2']['name']);
    $img2type = $img2type[count($img2type)-1];
    $img2_name=uniqid(rand()).'.'.$img2type; 
    $img2url = $dir."/".$img2_name;
    //Cheking either file aleary uploaded or not
    if(in_array($img2type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
         $valid2=true;
       }
     else
     {
     	$valid2=false;
     }

      //checking Image3 Format
	$valid3=false;
    $img3type = explode('.', $_FILES['productimage3']['name']);
    $img3type = $img3type[count($img3type)-1];
    $img3_name=uniqid(rand()).'.'.$img3type; 
    $img3url = $dir."/".$img3_name;
    //Cheking either file aleary uploaded or not
    if(in_array($img3type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
         $valid3=true;
       }
     else
     {
     	$valid3=false;
     }


     if($valid1==true && $valid2==true && $valid3==true)
     	{

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],$img1url);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],$img2url);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],$img3url);

$sql=mysqli_query($con,"insert into products(category,subCategory,productName,productPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3,productDiscount ) values('$category','$subcat','$productname','$productprice','$productdescription','$productscharge','$productavailability','$img1_name','$img2_name','$img3_name','$productpricebd')");
if($sql==1)
{
	$_SESSION['msg']="Product Inserted Successfully !!";
}
else
{
	$_SESSION['msg']="Opps There is an error in Inserting Product !!";
}
}
else
{
	$_SESSION['msg']=" Opps error : One of you Image Formate is Not JPG , PNG , JPEG. Please Chage it and Try again.";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Insert Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Insert Product</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

				<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

				<div class="control-group">
				<label class="control-label" for="basicinput">Category</label>
				<div class="controls">
				<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
				<option value="">Select Category</option> 
				<?php $query=mysqli_query($con,"select * from category");
				while($row=mysqli_fetch_array($query))
				{?>

				<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
				<?php } ?>
				</select>
				</div>
				</div>						
				
				<div class="control-group">
				<label class="control-label" for="basicinput">Product Name</label>
				<div class="controls">
				<input type="text"    name="productName"  placeholder="Enter Product Name" class="span8 tip" required>
				<input type="hidden" name="subcategory" value="1" id="subcategory" class="span8 tip" >
				</input>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Product Price(PKR)</label>
				<div class="controls">
				<input type="number"    name="productprice"  placeholder="Enter Product Price" class="span8 tip" required>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Product Discount(PKR)</label>
				<div class="controls">
				<input type="number"    name="productpricebd"  placeholder="Enter Product Discount" value="0" class="span8 tip" required>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Product Description</label>
				<div class="controls">
				<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="span8 tip">
				</textarea>  
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Shipping Charge(PKR)</label>
				<div class="controls">
				<input type="number"    name="productShippingcharge" value="100"  placeholder="Enter Product Shipping Charge" class="span8 tip" required>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Product Availability</label>
				<div class="controls">
				<select   name="productAvailability"  id="productAvailability" class="span8 tip" required>
				<option value="In Stock">In Stock</option>
				<option value="Out of Stock">Out of Stock</option>
				</select>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Product Image1 (Main)</label>
				<div class="controls">
				<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
				</div>
				</div>


				<div class="control-group">
				<label class="control-label" for="basicinput">Product Image2</label>
				<div class="controls">
				<input type="file" name="productimage2"  class="span8 tip" required>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Product Image3</label>
				<div class="controls">
				<input type="file" name="productimage3"  class="span8 tip" required>
				</div>
				</div>

				<div class="control-group">
				<div class="controls">
					<button type="submit" name="submit" class="btn-success">Insert</button>
				</div>
				</div>
				</form>
				</div>
				</div>


	
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

</script>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>

	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');


		} );
	</script>
</body>
<?php } ?>