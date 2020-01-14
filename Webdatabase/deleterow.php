<?php
session_start();
require_once('driver.php');
$productdetailID = $_GET['productdelete'];
echo $productdetailID;
$sql = "DELETE FROM cart WHERE ProductDetailID=$productdetailID AND UserID = '".$_SESSION['UserID']."'";
if ($conn->query($sql) === TRUE) {
   echo" <script>window.location='cart.php';</script>";
   exit();
    
} else {
    echo "Error deleting record: " . $conn->error;
}

?>