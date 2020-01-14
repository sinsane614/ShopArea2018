<?php
session_start();
require_once('driver.php');

$sqlupdateaddress = "SELECT * from addressuser where UserID='".$_SESSION['UserID']."'";
$queryupdate = mysqli_query($conn,$sqlupdateaddress);
$numrow = mysqli_num_rows($queryupdate);
for($i=1;$i<=$numrow;$i++)
{  
     $sql = "UPDATE addressuser SET AddressDefault=0 WHERE CountAddress=$i AND UserID ='".$_SESSION['UserID']."'";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    }
}
$setaddress = $_GET['address'];
$sqlupdate = "UPDATE addressuser SET AddressDefault=1 WHERE CountAddress=$setaddress AND UserID ='".$_SESSION['UserID']."'";
if (mysqli_query($conn, $sqlupdate)) {
    echo "Record updated successfully";
    echo"<script>window.location='addressalluser.php'</script>";
    exit();
}

?>