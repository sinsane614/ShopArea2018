<?php
session_start();
require_once('driver.php');
$productid=$_GET['productid'];
$sql = "DELETE FROM stock WHERE ProductID=$productid ";
if (mysqli_query($conn, $sql)) {
    echo "<script>window.location='stockedit.php'</script>";
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>