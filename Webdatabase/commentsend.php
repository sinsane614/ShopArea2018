<?php 
session_start();
require_once('driver.php');
if(!isset($_SESSION['UserID']))
{
   echo "Please login";
   exit(); 
}
$userid = $_SESSION['UserID'];
$productid=$_POST['productid'];
$rating=$_POST['star'];
$comment=$_POST['comment_content'];
$SQL = " SELECT * from checkout WHERE UserID = $userid";
$objquery=mysqli_query($conn,$SQL);
$check=0;
while($objresult=mysqli_fetch_array($objquery)){
    $orderid=$objresult['OrderID'];   
    $SQL2 = "SELECT *  from ordershop Where OrderID = $orderid";
        $objquery2=mysqli_query($conn,$SQL2);
        while($objresult2=mysqli_fetch_array($objquery2)){
            $orderdetailid = $objresult2['OrderDetailID'];
            $SQL3 = "SELECT * from orderdetail Where OrderDetailID = $orderdetailid";
            $objquery3=mysqli_query($conn,$SQL3);
            while($objresult3=mysqli_fetch_array($objquery3)){
                $productdetailid =$objresult3['ProductDetailID'];
                $SQL4 = "SELECT * from productdetail Where ProductDetailID = $productdetailid";
                $objquery4=mysqli_query($conn,$SQL4);
                $objresult4=mysqli_fetch_array($objquery4);
                if($objresult4['ProductID']==$productid){
                    $check=1;
                    $orderidcheck= $orderid;
                }
            }

        }
}    
if($check==0){
       echo "<script>alert('ยังไม่เคยซื้อสินค้านี้');window.history.back();</script>" ;exit();
}
else{
    $SQL5="INSERT INTO reviewproduct (ProductID,OrderID,Rating,Comment) VALUES ('$productid','$orderidcheck','$rating','$comment')";
    if (mysqli_query($conn, $SQL5)) {
        echo "<script>window.history.back();</script>";
        exit();
    } 
    else {
        echo "<script>window.history.back();</script>";
    }
}
?>