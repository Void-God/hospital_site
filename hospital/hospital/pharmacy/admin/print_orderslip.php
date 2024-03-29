<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Order Slip</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
								<h3>Generat Order Slip</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
				</div>
<?php } ?>

				<br />

						
					<form class="form-horizontal row-fluid" action="generatePDF.php" method="POST" target="_blank">


						<div class="control-group">
						<label class="control-label" for="basicinput"></label>
						<div class="controls">
						<h3 class="span8 tip"><strong>Filter and Generate Order Reports</strong></h3>
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="basicinput">Order Type</label>
						<div class="controls">
						<select name="order_type" class="span8 tip">
						<option value="pending">New Orders</option>
						<option value="In Process">In Process</option>
						<option value="Delivered">Delivered</option>
						<option value="all">All Orders</option> 
						</select>
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="basicinput">Order Date From</label>
						<div class="controls">
						<input type="date"  name="datefrom" class="span8 tip" >
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="basicinput">Order Date To</label>
						<div class="controls">
						<input type="date"  name="dateto" class="span8 tip" >
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="basicinput">Customer Email </label>
						<div class="controls">
						<input type="email" name="cust_email"  placeholder="Enter Customer Email" class="span8 tip">
						</div>
						</div>

						<div class="control-group">
						<div class="controls">
						<input type="submit" name="submit_report" value="Generate Report" class="span4 tip btn-primary" >
						</div>
						</div>
						<label style="margin-left:20px;color:red;" class="control-label" id="error"></label>
						<br>
						<br>

					</form>

				
							</div>
						</div>						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

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