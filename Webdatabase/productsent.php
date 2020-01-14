<?php 
session_start();
require_once('driver.php');
if(!isset($_SESSION['UserID']))
{ 
    echo"<script> alert('Please login');
    window.location = 'home.php'</script>";
  exit();
}
if(isset($_SESSION['UserID'])){
$quantity = $_GET["quantity"];
$value = $_GET["value"];
$id=$_GET["id"];
$userid= $_SESSION['UserID'];
$SQL="INSERT INTO cart (UserID,ProductDetailID,Quantity) VALUES ('$userid','$value','$quantity')";
$error="Duplicate";
if (mysqli_query($conn, $SQL)) {
    echo "New record created successfully
    <script>window.location='cart.php';</script>";
    exit();
}
else if(strrpos($conn->error,$error)!==false){
    echo "<script> alert('สินค้ามีแล้วในตะกร้า');   window.history.back();</script>";
    exit();
}
else{
    echo "<script> alert('ยังไม่เลือกชนิดสินค้า');   window.history.back();</script>";
    exit();
    
}
}
else {
        echo "<script>
        window.location = 'home.php'</script>";
        exit();
}
?>