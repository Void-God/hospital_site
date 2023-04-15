<?php
session_start();
include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$remark=$_POST['remark'];//space char
$pay=0;
if($status=="Delivered")
{
    $pay=1;
}
else
{
    $pay=0;
}
$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
$sql=mysqli_query($con,"update orders set orderStatus='$status' ,payment_status='$pay' where id='$oid'");
$fetchtrans=mysqli_query($con,"select trans_id from orders where id='$oid'");
$res=mysqli_fetch_array($fetchtrans);
$trans_id=$res['trans_id'];

$updatepay=mysqli_query($con,"update payments set payment_status='$pay' where trans_id='$trans_id'");
if($updatepay && $sql)
{
    
  echo "<script>alert('Order updated sucessfully...');</script>";
  
  
      if($pay==1)
      {
      
          //Generate Email to Customer
  
             $orders="SELECT orders.quantity as product_quantity,orders.payableprice as payable, orders.paymentMethod as pay_method , 
              products.productName as productName , products.productPrice as productPrice , users.name as name,
              users.email as email,users.shippingAddress as address ,users.shippingState as state FROM orders 
                INNER JOIN products ON products.id=orders.productId
                INNER JOIN users ON users.id=orders.userId where orders.id='$oid'";
                $retorder = mysqli_query($con,$orders);
                
                $total_order_p=0;
                $discount_after_o=0;
                   while($row=mysqli_fetch_array($retorder))
                    {
                    
                    $total_order_p=$row['productPrice']*$row['product_quantity'];
                    $discount_after_o=$total_order_p - $row['payable'];
            
            
                $subject="Eshop Expel Order Delivered";
                $to=$row['email'];            
                $from = 'theexpel786@gmail.com'; 
                $fromName = "Eshop Expel"; 
                 
                $htmlContent = 
            '
                <html>
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
                    
                </head>
                <body style="margin:0px; padding:10px 0 0 0; border-style:solid;border-width:1;">
            
                <img src="http://www.theexpel.com/img/thanks.png" alt="Image Banner" style="display: block;margin-left:auto; margin-right:auto; width:50%;height:170px; background-color:white;"/>
                <h2  style="margin-left:20px;font-size: 20px; font-weight:bold; color:green;">Dear Customer '.$row['name'].', </h2>
                <h3  style="color:green; text-align:center;"> 
                            Congratulations ! Your Order has been Delivered Successfully at your given Shipping Address : <br>
                            '.$row['address']." , ".$row['state'].'
                            
                <h3>
                <h4 style="color:green; text-align:center;>We hope that you like our Product Quality and our Service. Thank You so Much for Shopping with Us.</h4>
                                      
            ';
            
                $htmlContent .= '<h3 style="color:#f40; text-align:center;">Order Details</h3>';
                
                $htmlContent .= '
                  <table style="margin-bottom:20px;" class="table">
                    <thead style="border-style:solid;border-width:1px;background-color:#eb4034; color:white;" class="thead-dark">
                      <tr>
                        <th>Name</th>
                        <th>QTY</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Payable</th>
                        <th>Time</th>
                      </tr>
                    </thead>
                ';
                
                    
                    $htmlContent .='<tbody style="border-style:solid;border-width:1px;text-align:center;"><tr class="success">';
                
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.$row['productName'].'</td>';
                    
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.$row['product_quantity'].'</td>';
                    
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.$row['productPrice'].'</td>';
                    
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.$total_order_p.'</td>';
                    
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.$discount_after_o.'</td>';
                    
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.$row['payable'].'</td>';
                    
                    $htmlContent .='<td style="border-style:solid;border-width:1px;text-align:center;">'.date("d M Y h:i:s A").'</td>';
                    $htmlContent .='</tr></tbody>';
                    
                }
                    
                    $htmlContent .='</table><br> </div>';
                    
                    $htmlContent .= '</body></html>';
            
                // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            
            //Additional headers 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            $headers .= 'Cc: theexpel786@gmail.com' . "\r\n"; 
            $headers .= 'Bcc: theexpel786@gmail.com' . "\r\n"; 
            // Send email 
            if(mail($to, $subject, $htmlContent, $headers))
            { 
                echo "Order DeliveredEmail Sent to Customer Successfully.";
            }
            else
            {
                echo "Order Delivered Email not Sent to Customer.";
            }
  }
            
            
}
else
{
  echo "<script>alert('Error in Updating Order...');</script>";
}

//}
}

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Compliant</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Order !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
     while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
      <tr height="20">
      <td class="fontkink1" ><b>At Date:</b></td>
      <td  class="fontkink"><?php echo $row['postingDate'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink"><?php echo $row['status'];?></td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink"><?php echo $row['remark'];?></td>
    </tr>
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } ?>
   <?php 
$st='Delivered';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Delivered </b></td>
   <?php }else  {
      ?>
   
    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" class="fontkink" required="required" >
          <option value="">Select Status</option>
                  <option value="In Process">In Process</option>
                  <option value="Delivered">Delivered</option>
        </select>
        </span></td>
    </tr>

     <tr style=''>
      <td class="fontkink1" >Remark:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark"  required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     