<?php 
include("includes/conn.php");
?>
<?php 
include("includes/head.php");
include("includes/navbar.php");
?>
	<!--banner-->
	<div style="background:url(images/slider2.jpg);width:100%;" class="banner">
		<div class="container">
			<div class="banner-text">			
				
				<div class="col-sm-7 banner-right wow fadeInRight animated" data-wow-delay=".5s">			
					<section class="slider grid">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<h4>-30%</h4>
									<img style="width: 100%;height: 250px;" src="images/ss1.jpg" alt="">
								</li>
								<li>
									<h4>-25%</h4>
									<img style="width: 100%;height: 250px;" src="images/ss2.jpg" alt="">
								</li>
								<li>
									<h4>-32%</h4>
									<img style="width: 100%;height: 250px;"src="images/ss3.jpg" alt="">
								</li>
							</ul>
						</div>
					</section>
					<!--FlexSlider-->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
						$(window).load(function(){
						  $('.flexslider').flexslider({
							animation: "pagination",
							start: function(slider){
							  $('body').removeClass('loading');
							}
						  });
						});
					</script>
					<!--End-slider-script-->
				</div>

				<div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">			
					<h2>Big Pharmacy </h2>
					<h3>All in One </h3>
					<h4> Get Everything here</h4>
				<!--
					<div class="count main-row">
						<ul id="example">
							<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
							<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
							<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
						</ul>
							<div class="clearfix"> </div>
							<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
							<script type="text/javascript">
								$('#example').countdown({
									date: '12/24/2020 15:59:59',
									offset: -8,
									day: 'Day',
									days: 'Days'
								}, function () {
									alert('Done!');
								});
							</script>
					</div>
				-->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>			
	<!--//banner-->
	<!--new-->
	<div class="new">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">All <span>Categories</span></h3>
			</div>
			<div class="new-info">

				<?php
					$sqlf = "SELECT * FROM category ORDER BY id ASC";
				    $stmf = $conn->prepare($sqlf);
				    $stmf->execute();
				    $rowf = $stmf->fetchall();
				    foreach ($rowf as $res) {
				    $image=root_path."admin/categoryimages/".$res['category_image'];
				    echo 
				    	'<div style="margin-right:2px;" class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
					<div class="new-top">
						<a href="products?category='.$res['id'].'"><img style="height:190px;" src="'.$image.'" class="img-responsive" alt=""/></a>
						<div class="new-text">
							<ul>
								<li><a href="products?category='.$res['id'].'">Show Products </a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="products?category='.$res['id'].'">'.$res['categoryName'].'</a></h5>
						<div class="rating">
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span>☆</span>
						</div>	
						<div class="ofr">
							<p><span class="item_price">'.$res['categoryDescription'].'</span></p>
						</div>
					</div>
				</div>
				    ';
				    }
				?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>		
	<!--//new-->
	<!--gallery-->
	<div class="gallery">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">Popular<span> Products</span></h3>
			</div>
			<div class="gallery-info">

				<?php

					$sqlf = "SELECT * FROM products where productAvailability='In Stock' ORDER BY id ASC";
				    $stmf = $conn->prepare($sqlf);
				    $stmf->execute();
				    $rowf = $stmf->fetchall();
				    foreach ($rowf as $res) {
				    $image=root_path."admin/productimages/Product-".$res['id']."/".$res['productImage1'];

				    echo  '
					<div style="height:360px;margin-right:2px;" class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
						<a href="product-detail?product='.$res['id'].'&cat='.$res['category'].'"><img style="height:190px;" src="'.$image.'" class="img-responsive" alt=""/></a>
						<div class="gallery-text simpleCart_shelfItem">
							<h5><a class="name" href="product-detail?product='.$res['id'].'&cat='.$res['category'].'">'.$res['productName'].'</a></h5>
							<p><span class="item_price">'.$res['productPrice'].'</span></p>
							<ul>
								<li><a href="product-detail?product='.$res['id'].'&cat='.$res['category'].'"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
								<li><a class="item_add" href="cart?product='.$res['id'].'"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
								<li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
							</ul>
						</div>
					</div>
				    ';

					}
				    ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//gallery-->
	<!--trend-->
	<div class="trend wow zoomIn animated" data-wow-delay=".5s">
		<div class="container">
			<div class="trend-info">
				<section class="slider grid">
					<div class="flexslider trend-slider">
						<ul class="slides">
							<li>
								<div class="col-md-5 trend-left">
									<img style="height: 300px;width: 350px;" src="images/ss1.jpg" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
									<h5>Flat 20% OFF</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img style="height: 300px;width: 350px;" src="images/ss1.jpg" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
									<h5>Flat 20% OFF</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img style="height: 300px;width: 350px;" src="images/ss1.jpg" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
									<h5>Flat 20% OFF</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
								</div>
								<div class="clearfix"></div>
							</li>
							<li>
								<div class="col-md-5 trend-left">
									<img style="height: 300px;width: 350px;" src="images/ss1.jpg" alt=""/>
								</div>
								<div class="col-md-7 trend-right">
									<h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
									<h5>Flat 20% OFF</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
								</div>
								<div class="clearfix"></div>
							</li>
						</ul>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!--//trend-->

<?php 
include("includes/footer.php");
?>

</body>
</html>