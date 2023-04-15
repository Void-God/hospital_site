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
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--products-->
	<div class="products">	 
		<div style="text-align: center;" class="container">
			<div class="col-md-3 rsidebar">
				<div style="height: 400px;"  class="rsidebar-top">
					<div style="margin-top: 18px;" class="slider-left">
						<h4>Filter By Product</h4>            
						<div id="slider-range"></div>							
						<input type="text" name="searchbyname" style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; width:100%;height:40px;" placeholder="Search by Product Name" id="searchbyname"/>
					</div>	
					 <div style="margin-top: 18px;" class="slider-left">
						<h4>Filter By Category</h4>            
						<div id="slider-range"></div>							
						<select type="text" name="filterbycat" style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; width:100%;height:40px;"  id="filterbycat">
							<option value=""> All Category</option>
							<?php
							
							$sqlf = "SELECT * FROM category ORDER BY id ASC";
					
						    $stmf = $conn->prepare($sqlf);
						    $stmf->execute();
						    $rowf = $stmf->fetchall();
						    foreach ($rowf as $res) {
						    	echo '
						    	<option value="'.$res['id'].'">'.$res['categoryName'].'</option>
						    	';
						    }
									
							?>
					   </select>
					 </div>		
				</div>
			</div>
			<div class=" simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s" style="width: 100%;text-align: right;padding-right: 45px;">
						<select type="text" name="sortby" style="border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;width:200px; height:40px; text-align: left;"  id="sortby">
							<option value="">Sort By Price</option>
							<option value="ORDER BY productPrice DESC"> Sort By Max</option>
							<option value="ORDER BY productPrice ASC"> Sort By Min</option>
							<option value="ORDER BY id DESC"> Sort By New</option>
							<option value="ORDER BY id ASC"> Sort By Old</option>
						</select>
			</div>	
			<div style="margin-top: 10px; text-align:center;" class="product_div col-md-9 product-model-sec">				
			<div class="clearfix"> </div>
		</div>

	</div>
	<!--//products-->
<?php include("includes/footer.php");?>
<style>
#loading
{
 text-align:center; 
 background: url('images/loader.gif') no-repeat center; 
 height: 150px;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

$(document).ready(function(){

    $('a').removeClass('active');
    $("#products").addClass('active');

filter_products();
function filter_products()
    {
        $('.product_div').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var category_id='<?php if(isset($_GET['category'])){echo $_GET['category'];}else{echo "";} ?>';
        var cat_id = $('#filterbycat').val();
        var name = $('#searchbyname').val();
        var sortby = $('#sortby').val();
     
        $.ajax({
            url:"php_actions/filter_products.php",
            method:"POST",
            data:{action:action,category:category_id,cat_id:cat_id,sortby:sortby,name:name},
            success:function(data){
                $('.product_div').html(data);
            }
        });
    }
    $('#filterbycat').on("change",function(event){

        filter_products();
    });
    $('#sortby').on("change",function(event){

        filter_products();
    });
    $('#searchbyname').on("keyup",function(event){

        filter_products();
    });

});

</script>
</body>
</html>