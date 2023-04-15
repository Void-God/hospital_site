<?php
include("../includes/conn.php");

if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['shippingaddress']))
{
     $apiKey=APIKEY;
     $name=$_POST['name'];
     $email=$_SESSION['user_email'];
     $phone=$_POST['phone'];
     $contact=$_POST['contact'];
     $shippingaddress=$_POST['shippingaddress'];
     $state=$_POST['state'];
     $method=$_POST['method'];
     $trans_id="PAID".uniqid(rand(100,10000));
     $user_id=$session_id;
     $success=false;
     $total=0;

    $sqltot = "SELECT  SUM((products.productPrice-products.productDiscount)*cart.product_quantity) as subtotal ,SUM(products.shippingCharge) as shipping FROM cart INNER JOIN products ON cart.product_id=products.id WHERE user_id='$user_id'";
    $stmtot = $conn->prepare($sqltot);
    $stmtot->execute();
    $rowtot = $stmtot->fetch(PDO::FETCH_ASSOC);
    $subtotal=$rowtot['subtotal'];
    $shipping=$rowtot['shipping'];
    $total=$subtotal+$shipping;
    $total=$total*100;

}
else
{
    echo "Invalid Request";
}

?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
$(document).ready(function(){
     $(".razorpay-payment-button").css("display","none");
     $(".razorpay-payment-button").trigger('click'); 
    });
</script>
<form action="http://androappdev.xyz/pharmacy/cart" method="POST">
    <input type="hidden" name="success" value="success">
    <input type="hidden" name="method" value="online">

    <input type="hidden" name="contact" value="<?php echo $contact;?>">  
    <input type="hidden" name="phone" value="<?php echo $phone;?>">
    <input type="hidden" name="shippingaddress" value="<?php echo $shippingaddress;?>">
    <input type="hidden" name="state" value="<?php echo $state;?>"> 
    <input type="hidden" name="trans_id" value="<?php echo $trans_id ;?>">    	
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo APIKEY; ?>"
    data-amount="<?php echo $total;?>"
    data-currency="INR"
    data-id="<?php echo 'OID-'.rand(100,10000);?>"
    data-buttontext=""
    data-name="United Interact"
    data-description="Your Wellness Our Priority"
    data-image="../images/logo.png"
    data-prefill.name="<?php echo $name;?>"
    data-prefill.email="<?php echo $email;?>"
    data-prefill.contact="<?php echo $phone;?>"
    data-theme.color="#fc5d0c"
></script>
</form>
<div style="text-align: center;height:100%; background-color:#242222;width:100%;">
    <a href="https://androappdev.xyz/pharmacy/cart">
        <button style="background-color: #fc5d0c;border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;color: white;font-size: 14px; width:20%;height:40px;">
            Close This Window
        </button>
    </a>
</div>