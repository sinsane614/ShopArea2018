<?php 
session_start();
require_once('driver.php');

$sql = "SELECT UserID,Address,CountryID,CountAddress,AddressDefault FROM addressuser WHERE UserID ='".$_SESSION["UserID"]."'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0){
    while ($row <= mysqli_fetch_assoc($result)) {
        echo "UserID: " . $row["UserID"]. " - Address: " . $row["Address"]. " - CountryID: " . $row["CountryID"]. " - CountAddress: " . $row["CountAddress"]. " - AddressDefault: " . $row["AddressDefault"]. "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>