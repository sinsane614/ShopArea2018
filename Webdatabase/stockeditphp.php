<?php session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('driver.php');
$count = $_GET['count'];
for($i=1;$i<=$count;$i++)
{
    $productname=$_GET['productname'.$i.''];
    $productid=$_GET[$i];
    $productdetail=$_GET['productdetail'.$i.''];
    $price=$_GET["price".$i.""];

    $sql = "UPDATE stock SET ProductName='$productname',ProductDetail='$productdetail', Price='$price' WHERE ProductID='$productid'";
    if (mysqli_query($conn, $sql)) {
    }
}
echo "<script>window.history.back();</script>";
mysqli_close($conn);
?>