<?php
session_start();
include_once('libs/fpdf/fpdf.php');
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}

if(isset($_POST['order_type']))
{

date_default_timezone_set('Asia/Karachi');
class PDF extends FPDF
{

    function Header()
    {

        $this->Image('../images/logo.png',10,6,30);
        $this->SetFont('Arial','B',18);
        $this->SetTextColor(16, 61, 87);
        $this->Cell(276,10,'United Interact Slip',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',14);
        $this->SetTextColor(20, 89, 115);
        $this->Cell(276,10,'www.untiedinteract.com',0,0,'C');
        $this->Ln();
        $this->SetTextColor(20,20,20,);
         $this->SetFont('Times','B',12);
        $this->Cell(276,10,date('d-m-Y h:i A', time ()),0,0,'C');
        $this->Ln(10);

    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable()
    {

        $this->SetFont('Arial','B',12);
        $this->SetTextColor(20, 20,20);
        $this->Cell(10,10,'#',1,0,'C');
        $this->Cell(40,10,'Product Name',1,0,'C');
        $this->Cell(40,10,'Payment',1,0,'C');
        $this->Cell(50,10,'Transaction ID',1,0,'C');
        $this->Cell(30,10,'Order Status',1,0,'C');
        $this->Cell(20,10,'Price',1,0,'C');
        $this->Cell(20,10,'QTY',1,0,'C');
        $this->Cell(20,10,'Total',1,0,'C');
        $this->Cell(26,10,'Payable',1,0,'C');
        $this->Cell(20,10,'Shipping',1,0,'C');
        $this->Ln();

    }

    function viewTable($con)
    {

        $this->SetFont('Arial','',10);
        $count=0;
        $sql= "select users.email as useremail, products.productName as productname,products.id as product_id,orders.quantity as quantity,orders.orderDate as orderdate,orders.payment_status as payment_status,orders.orderStatus as order_status,orders.paymentMethod as payment_method,orders.payableprice as payable,products.productPrice as productprice,orders.id as order_id,products.productDiscount as productdiscount ,orders.trans_id as transaction, orders.shipping as shipping from orders join users on orders.userId=users.id join products on products.id=orders.productId";

       if(isset($_POST['order_type']) && !empty($_POST['datefrom']) && !empty($_POST['dateto']) && !empty($_POST['cust_email']))
        {
            $order_type=$_POST['order_type'];
            $datefrom=$_POST['datefrom'];
            $dateto=$_POST['dateto'];
            $user_email=$_POST['cust_email'];

            if($order_type=="all")
            {
                $sql.=" where orders.orderDate Between '$datefrom' and '$dateto' AND users.email='$user_email'";
                $query=mysqli_query($con,$sql);
            }
            else if($order_type=="pending")
            {
                $sql.=" where orders.orderDate Between '$datefrom' and '$dateto' AND users.email='$user_email' AND orders.orderStatus is null";
                $query=mysqli_query($con,$sql);
            }
            else
            {
            $sql.=" where orders.orderDate Between '$datefrom' and '$dateto' AND orders.orderStatus='$order_type' AND  users.email='$user_email'";
            $query=mysqli_query($con,$sql);
            }
        }
        else if(!empty($_POST['cust_email']) && isset($_POST['order_type']))
        {

            $user_email=$_POST['cust_email'];
            $order_type=$_POST['order_type'];
            if($order_type=="all")
            {
                $sql.=" where users.email='$user_email'";
                $query=mysqli_query($con,$sql);
            }
            else if($order_type=="pending")
            {
            $sql.=" where users.email='$user_email' AND orders.orderStatus is null";
            $query=mysqli_query($con,$sql);
            }
            else
            {
            $sql.=" where users.email='$user_email' AND orders.orderStatus='$order_type'";
            $query=mysqli_query($con,$sql);
            }
        }

        else if(isset($_POST['order_type']))
        {
            $order_type=$_POST['order_type'];
            if($order_type=="all")
            {
                $query=mysqli_query($con,$sql);
            }
            else if($order_type=="pending")
            {
                $sql.=" where orders.orderStatus is null";
                $query=mysqli_query($con,$sql);
            }
            else 
            {
                $sql.=" where orders.orderStatus='$order_type'";
                $query=mysqli_query($con,$sql);
            }

        }
        
        else if(!empty($_POST['datefrom']) && !empty($_POST['dateto']) && isset($_POST['order_type']))
        {
            $order_type=$_POST['order_type'];
            $datefrom=$_POST['datefrom'];
            $dateto=$_POST['dateto'];
            if($order_type=="all")
            {
                $sql.=" where orders.orderDate Between '$datefrom' and '$dateto'";
                $query=mysqli_query($con,$sql);
            }
            else if($order_type=="pending")
            {
            $sql.=" where orders.orderDate Between '$datefrom' and '$dateto' AND orders.orderStatus is null";
            $query=mysqli_query($con,$sql);
            }
            else{
            $sql.=" where orders.orderDate Between '$datefrom' and '$dateto' AND orders.orderStatus='$order_type'";
            $query=mysqli_query($con,$sql);
                }

        }


        $perprodtotal=0;
        $quantitytotal=0;
        $pricetotal=0;
        
        $shippingtotal=0;
        $payabletotal=0;
        $grandtotal=0;

        while($row=mysqli_fetch_array($query))
        {  
            $payment="";
            $perprodtotal+=$row['productprice'];
            $quantitytotal+=$row['quantity'];
            $pricetotal+=$row['quantity']*$row['productprice'];

            $shippingtotal+=$row['shipping'];
            $payabletotal+=$row['payable'];
            $grandtotal=$shippingtotal+$payabletotal;
            if($row['payment_status']==1)
            {
                $payment="Paid";
            }
            else
            {
                $payment="Not Paid";
            }

            if($row['order_status']=='')
            {
                $row['order_status']="Pending";
            }
            $count+=1;
            $this->SetTextColor(20, 20,20);
            $this->cell(10,10,$count,1,0,'C');
            $this->Cell(40,10,$row['productname'],1,0,'C');
            $this->Cell(40,10,$payment,1,0,'C');
            $this->Cell(50,10,$row['transaction'],1,0,'C');
            $this->Cell(30,10,$row['order_status'],1,0,'C');
            $this->Cell(20,10,$row['productprice'],1,0,'C');
            $this->Cell(20,10,$row['quantity'],1,0,'C');
            $this->Cell(20,10,$row['quantity']*$row['productprice'],1,0,'C');
            $this->Cell(26,10,$row['payable'],1,0,'C');
            $this->Cell(20,10,$row['shipping'],1,0,'C');
            $this->Ln();
        }

            $this->SetFont('Arial','B',12);
            $this->SetTextColor(181, 56, 47);
            $this->Cell(170 ,10,'Subtotal',1,0,'C');
            $this->Cell(20 ,10,$perprodtotal,1,0,'C');
            $this->Cell(20 ,10,$quantitytotal,1,0,'C');
            $this->Cell(20 ,10,$pricetotal,1,0,'C');
            $this->Cell(26 ,10,$payabletotal,1,0,'C');
            $this->Cell(20 ,10,$shippingtotal,1,0,'C');
            $this->Ln();
            $this->Cell(170 ,10,'Grand Total',1,0,'C');
            $this->Cell(106 ,10,$payabletotal."+".$shippingtotal." = ".$grandtotal." PKR",1,0,'C');


    }

}


$pdf = new PDF();
$pdf->AddPage('L','A4',0);
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(224,235,255);


$pdf->Ln();

if(isset($_POST['cust_email'])){
    $email=$_POST['cust_email'];
$sql = "SELECT * FROM users where email='$email'";
$res = $con->query($sql);
if ($res->num_rows > 0) {
  while($row = $res->fetch_assoc()) {
    $name=$row['name'];
    $email=$row['email'];
    $contact=$row['contactno']." / ".$row['phone'];
    $address=$row['shippingAddress'].", ".$row['shippingState'];

  }
        $pdf->SetFont('Arial','B',18);
        $pdf->SetTextColor(20, 89, 115);
        $pdf->Cell(276,15,'User Information',1,0,'C');
        $pdf->Ln();
        $pdf->SetTextColor(20, 20,20);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,10,'Invoice #',1,0,'C');
        $pdf->Cell(40,10,'Customer name',1,0,'C');
        $pdf->Cell(40,10,'Customer Email',1,0,'C');
        $pdf->Cell(60,10,'Customer Contacts',1,0,'C');
        $pdf->Cell(106,10,'Shipping Address',1,0,'C');

        $pdf->Ln();
        $pdf->SetTextColor(20, 20,20);
        $invoice="INV-2020".rand(10,1000);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,10,$invoice,1,0,'C');
        $pdf->Cell(40,10,$name,1,0,'C');
        $pdf->Cell(40,10,$email,1,0,'C');
        $pdf->Cell(60,10,$contact,1,0,'C');
        $pdf->Cell(106,10,$address,1,0,'C');

}

}

$pdf->ln();

$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(20, 89, 115);
$pdf->Cell(276,15,'Orders Information',1,0,'C');
$pdf->ln();
$pdf->SetTextColor(20, 20, 20);
$pdf->headerTable();
$pdf->viewTable($con);

$pdf->Output();
}
else
{
    echo '<h4>You can not Access this fie Directly</h4>';
}
?>