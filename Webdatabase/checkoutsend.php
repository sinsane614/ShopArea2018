<?php
session_start();
require_once('driver.php');
if(isset($_GET['count'])){
    if($_GET['count']==0){
        echo"<script>alert('ไม่มีสินค้าภายในการสั่งซื้อ');
        window.location='home.php';</script>";
    exit();
    }
}
$countshop = $_GET['countshop'];
$countproduct=$_GET['count'];
$totalprice=$_GET['totalprice'];
$y_thai=date("Y");
$date_save=$y_thai.'-'.date("m").'-'.date("d");
$time_save=date("H:i:s");
for($y=1;$y<=$countproduct;$y++){
    $quantity= $_GET['quantity'.$y];
    $productdetailid=$_GET['productdetail'.$y];
    $SQLselectfirst="SELECT * FROM productdetail p JOIN stock s ON p.ProductID=s.ProductID WHERE ProductDetailID=$productdetailid";
    $objectselectfirst=mysqli_query($conn,$SQLselectfirst);
    $queryselectfirst = mysqli_fetch_array($objectselectfirst);
    echo "<br>".$queryselectfirst['Quantity']."<br>".$quantity;
    if($queryselectfirst['Quantity']-$quantity<0)
    {
        echo"<script>alert('".$queryselectfirst['ProductName']."จำนวนไม่เพียงพอ');
        window.location='cart.php';</script> ";
        exit();
    }
}
if(isset($_GET['Promocode']))
{

$SQLinsertcheckout = "INSERT INTO checkout (UserID,PromoCode,OrderDate,OrderTime,totalprice) VALUES('".$_SESSION['UserID']."','".$_GET['Promocode']."','$date_save','$time_save','$totalprice')";
}
else{
    $SQLinsertcheckout = "INSERT INTO checkout (UserID,OrderDate,OrderTime,totalprice) VALUES('".$_SESSION['UserID']."','$date_save','$time_save','$totalprice')";
}
if (mysqli_query($conn, $SQLinsertcheckout)) {
    $orderid=$conn->insert_id;  
} else {
    echo "Error: " . $SQLinsertcheckout . "<br>" . mysqli_error($conn);
}
for($i=0;$i<$countshop;$i++){
    $shopname=$_GET['shopname'.$i];
    $SQLsellerid="SELECT UserID FROM user WHERE Shopname = '".$shopname."'";
    $objectsellerid=mysqli_query($conn,$SQLsellerid);
    $querysellerid = mysqli_fetch_array($objectsellerid);
    $SQLinsertorder = "INSERT INTO ordershop (SellerID,OrderID,StatusOrder,DeliveryTypeID) VALUES ('".$querysellerid['UserID']."','$orderid','1','".$_GET['delivery'.$i]."')";
    if (mysqli_query($conn, $SQLinsertorder)) {
        $orderdetailid=$conn->insert_id;
        for($x=0;$x<$countproduct;$x++){
            $y=$x+1;
            $quantity= $_GET['quantity'.$y];
            $productdetailid=$_GET['productdetail'.$y];
            $productname=$_GET['product'.$x];
            $SQLcheckseller="SELECT SellerID FROM stock WHERE ProductName = '".$productname."'";
            $objectcheckseller=mysqli_query($conn,$SQLcheckseller);
            $querycheckseller = mysqli_fetch_array($objectcheckseller);
            if($querycheckseller['SellerID']==$querysellerid['UserID']){
               $SQLinsertorderdetail = "INSERT INTO orderdetail (OrderDetailID,ProductDetailID,OrderQuantity) VALUES('$orderdetailid','$productdetailid','".$_GET['quantity'.$y]."')";
               $SQLdeletecart="DELETE FROM cart WHERE ProductDetailID = $productdetailid";
               mysqli_query($conn,$SQLdeletecart);
               if (mysqli_query($conn, $SQLinsertorderdetail)) {
                $SQLdeleteproduct ="UPDATE productdetail SET Quantity = Quantity-$quantity WHERE ProductDetailID = $productdetailid ";
                if (mysqli_query($conn, $SQLdeleteproduct)) {
                    echo "Record updated successfully";
                }
            }
            }
        }
    } 
}
echo"<script>alert('สั่งซื้อสำเร็จ');
window.location='home.php';</script> ";
?>
