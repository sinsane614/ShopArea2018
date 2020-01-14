<?php
session_start();
require_once('driver.php');
$deleteaddress=$_GET['addressdelete'];
echo $deleteaddress;
$sql = "DELETE FROM addressuser WHERE CountAddress=$deleteaddress AND UserID='".$_SESSION['UserID']."'";
if (mysqli_query($conn, $sql)) {
$sqlupdateaddress = "SELECT * from addressuser where UserID='".$_SESSION['UserID']."'";
echo $sqlupdateaddress;
$queryupdate = mysqli_query($conn,$sqlupdateaddress);
$numrow = mysqli_num_rows($queryupdate);
echo $numrow;
for($i=0;$i<$numrow;$i++)
{   $newnumrow=$deleteaddress+$i;
    $oldnumrow=$deleteaddress+$i+1;
    $sql = "UPDATE addressuser SET CountAddress=$newnumrow WHERE CountAddress=$oldnumrow";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    }
}
    echo"<script>window.location='addressalluser.php'</script>";
    exit();

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>