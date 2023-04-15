<?php
include("../includes/conn.php");

if(isset($_POST["action"]))
{

	$sqlf="SELECT * FROM products where productAvailability='In Stock'";

	if(isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['cat_id']) && !empty($_POST['cat_id']) )
	{
		$category2=$_POST['cat_id'];
		$sqlf.=" AND category='$category2'";
	}
	else if(isset($_POST['category']) && !empty($_POST['category']))
	{
		$category=$_POST['category'];
		$sqlf.=" AND category='$category'";
	}
  else if(isset($_POST['cat_id']) && !empty($_POST['cat_id']))
	{
    $category_id=$_POST['cat_id'];
    $sqlf.=" AND category='$category_id'";
	}
  if(isset($_POST['name']) && !empty($_POST['name']))
  {
    $filter_name=$_POST['name'];
    $sqlf.=" AND productName LIKE '%$filter_name%'";
  }
  if(isset($_POST['sortby']) && !empty($_POST['sortby']))
  {
    $sortby=$_POST['sortby'];
    $sqlf.=" $sortby";
  }

    $stmf = $conn->prepare($sqlf);
    $stmf->execute();
    $count=$stmf->rowCount();
    $output="";
    if($count>0)
    {
    $rowf = $stmf->fetchall();
    foreach ($rowf as $res) {
   $image=root_path."admin/productimages/Product-".$res['id']."/".$res['productImage1'];
   $discounted=$res['productPrice']-$res['productDiscount'];
   $price="";
   if($res['productDiscount']<=0)
	{
		$price= '
		<div class="ofr">
			<p><span class="item_price">'.$res['productPrice'].'</span></p>
		</div>
		';
	}
	else
	{
		$price= '
		<div class="ofr">
		<p class="pric1"><del>'.$res['productPrice'].'</del></p>
		<p><span class="item_price">'.$discounted.'</span></p>
		</div>
		';	
	}

   		   $output .= '
			<div style="height:320px;margin-right:6px;" class="product-grids simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s">
			<div class="new-top">
				<a href="single.html"><img style="height:180px; width: 100%;"src="'.$image.'" class="img-responsive" alt=""/></a>
				<div class="new-text">
					<ul>
						<li><a href="product-detail?product='.$res['id'].' &cat='.$res['category'].'">Quick View </a></li>
						<li><a class="item_add" href="cart?product='.$res['id'].'"> Add to cart</a></li>
					</ul>
				</div>
			</div>
			<div class="new-bottom">
				<h5><a class="name" href="product='.$res['id'].' &cat='.$res['category'].'">'.$res['productName'].'</a></h5>

				'.$price.'
				
			</div>
			</div>
			';
	} 
  }
 else
	 {
	  $output.= '<h3>No Data Found</h3>';
	 }
 echo $output;

}

/*
  $query= "SELECT * FROM products where productType='Local'";

if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"]))
 {
  $category_filter = $_POST["cat_id"];
  $query.= " AND category ='$category_filter'";
 }

if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $min=$_POST["minimum_price"];
  $max=$_POST["maximum_price"];
  $query.= " AND productPrice BETWEEN $min AND $max
  ";
 }

 if(isset($_POST["subcat_id"]) && !empty($_POST["subcat_id"]))
 {
  $subcat_filter = $_POST["subcat_id"];
  $query.= " AND subCategory ='$subcat_filter'";
 }

 if(isset($_POST["name"]) && !empty($_POST["name"]))
 {
  $filter_name=$_POST["name"];
  $query.= " AND productName LIKE '%$filter_name%' OR productCompany LIKE '%$filter_name%'
  ";
 }

 if(isset($_POST["sortby"]) && !empty($_POST["sortby"]))
 {
  $sortby_filter = $_POST["sortby"];
  $query.= " ORDER BY $sortby_filter
  ";
 }


 $statement = $conn->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  
  foreach($result as $row)
  {
    $now = time(); // or your date as well
    $expire=$row['postingDate'];
    $your_date = strtotime($expire);
    $datediff =  $now-$your_date;
    $expiry= round($datediff / (60 * 60 * 24));
    $year=$expiry/360;
    $month=$expiry/30;
    $week=$expiry/7;
    if($year>1)
    {
      $expiry=round($year)." years Ago";
    }
    else if($month>1)
    {
      $expiry=round($month)." Months Ago";
    }
    else if($week>1)
    {
      $expiry=round($week)." Weeks Ago";
    }
    else
    {
      $expiry=$expiry." Days Ago";
    }
    
    $link="http://localhost/expelst/admin/productimages/Product-".$row['id']."/";

   $output .= '
            <a  href="product-detail">
              <li style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
               transition: 0.3s;border-style:solid;border-width:1px;border-color:#ff8989;">
                  <img style="" src="'.$link.$row['productImage1'].'" title="" alt="" />
                  <section class="list-left">
                  <h4 style="margin-top:10px;"  class="title"><b> '.$row['productName'].'</b></h4>
                  <span class="adprice">Rs.'.$row['productPrice'].'</span>
                  <h5 style="margin-top:10px;" class="catpath"> '.$row['productCompany'].'</h5>
                  </section>
                  <section style="margin-left:0px;" class="list-right">
                   <div style="margin-top:-10px;margin-bottom:6px;" class="portfolio-description"> 
                    <a id="add_to_cart" href="cart?product='.$row['id'].'">
                      <span style="width:90px;margin-top:4px;font-size:10px;">Add To Cart</span> </a>
                    <a href="product-detail?product='.$row['id'].'">
                      <span style="width:90px;margin-top:5px;font-size:10px;">View Detail</span>
                    </a>
                 </div>
                 </section>
                  <div class="clearfix"></div>
              </li> 
            </a>  
   ';
  }

 }
 */
 
?>