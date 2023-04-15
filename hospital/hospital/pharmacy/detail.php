<?php 
include("includes/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Pharmacy Shop</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//Custom Theme files -->
<!--js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--//js-->
<!--flex slider-->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider1.css" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<!--flex slider-->
<script src="js/imagezoom.js"></script>
<!--cart-->
<script src="js/simpleCart.min.js"></script>
<!--cart-->
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
<!--web-fonts-->
<!--animation-effect-->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smooth-scrolling-->
</head>
<?php 
include("includes/navbar.php");
?>
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Product Detail</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->

		<?php
			$product_id=$_GET['product'];
			$sqlf = "SELECT * FROM products where id='$product_id'";
		    $stmf = $conn->prepare($sqlf);
		    $stmf->execute();
		    $res = $stmf->fetch(PDO::FETCH_ASSOC);
		     $image1=root_path."admin/productimages/Product-".$res['id']."/".$res['productImage1'];
		     $image2=root_path."admin/productimages/Product-".$res['id']."/".$res['productImage2'];
		     $image3=root_path."admin/productimages/Product-".$res['id']."/".$res['productImage3'];
		?>

	<!--single-page-->
	<div class="single">
		<div class="container">
			<div class="single-info">		
				<div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">	
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="<?php echo $image1; ?>">
								<div class="thumb-image"> <img src="<?php echo $image1; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="<?php echo $image2; ?>">
								 <div class="thumb-image"> <img src="<?php echo $image2; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="<?php echo $image3; ?>">
							   <div class="thumb-image"> <img src="<?php echo $image3; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li> 
						</ul>
					</div>
				</div>
				<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
					<h3><?php echo $res['productName']; ?></h3>
					<div class="single-rating">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5" checked>
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
						
					</div>
					<h6 class="item_price"><?php echo $res['productPrice']; ?></h6>			
					<p><?php echo $res['productDescription']; ?></p>
					<div class="clearfix"> </div>
					<div class="btn_form">
						<a href="cart?product=<?php echo $res['id'];?>" class="add-cart item_add">ADD TO CART</a>	
					</div>
				</div>
			   <div class="clearfix"> </div>
			</div>
			<!--collapse-tabs-->
			<div class="collpse tabs">
				<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".5s">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								  Description
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								Description here
							</div>
						</div>
					</div>
					<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".6s">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								   additional information
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								 additional information Comes at here
							</div>
						</div>
					</div>
					<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".7s">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									reviews (5)
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								Review comes at here
							</div>
						</div>
					</div>
					<div class="panel panel-default wow fadeInUp animated" data-wow-delay=".8s">
						<div class="panel-heading" role="tab" id="headingFour">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									help
								</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								Recommeded Text / Info here
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--//collapse -->
			<!--related-products-->
			<div class="related-products">
				<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
					<h3 class="title">Related<span> Products</span></h3>
					
				</div>
				<div class="related-products-info">
					<?php
					$cat_id=$_GET['cat'];
					$sqlr = "SELECT * FROM product where brand_id='$cat_id' ORDER BY product_id ASC";
				    $stmr = $conn->prepare($sqlr);
				    $stmr->execute();
				    $rowr = $stmr->fetchall();
				    foreach ($rowr as $resr) {
				    $image=root_path."admin/product_images/".$resr['product_image'];
				    echo'
					<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
						<div class="new-top">
							<a href="single.html"><img style="height:210px;" src="'.$image.'" class="img-responsive" alt=""/></a>
							<div class="new-text">
								<ul>
									<li><a href="product-detail?product='.$res['product_id'].'&cat='.$res['brand_id'].'">Quick View </a></li>
									<li><a class="item_add" href="cart?product='.$res['product_id'].'"> Add to cart</a></li>
								</ul>
							</div>
						</div>
						<div class="new-bottom">
							<h5><a class="name" href="product-detail?product='.$res['product_id'].'">'.$resr['product_name'].' </a></h5>
							<div class="ofr">
								<p><span class="item_price">'.$resr['rate'].'</span></p>
							</div>
						</div>
					</div>
					';
				}	
				?>
					
					<div class="clearfix"> </div>
				</div>
			</div>
			<!--//related-products-->
		</div>
	</div>
	<!--//single-page-->
	<!--footer-->
<?php 
include("includes/footer.php")
?>
</body>
</html>