<?php 
session_start();
require_once('driver.php');
$country = $_POST['pro_mn_id'];
$address = $_POST['Address'];
$userid=$_SESSION['UserID'];
$SQLaddress="SELECT * FROM addressuser WHERE UserID =$userid";
$queryaddress=mysqli_query($conn,$SQLaddress);
$count=mysqli_num_rows($queryaddress);
$count=$count+1;
$SQLinsert="INSERT INTO addressuser (UserID,Address,CountryID,CountAddress,AddressDefault) 
VALUES ('$userid','$address','$country','$count','0')";
if (mysqli_query($conn, $SQLinsert)) {
    echo"<script>window.location='addressalluser.php'</script>";
} else {
    echo "Error: " . $SQLinsert . "<br>" . mysqli_error($conn);
}
?>