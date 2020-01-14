<?php session_start();
header('Content-Type: text/html; charset=utf-8');

require_once('driver.php');

$IdCard=$_POST['IdCard'];
$Banking=$_POST['Banking'];
$Shopname=$_POST['Shopname'];
$Shopdetail=$_POST['Shopdetail'];

$sql_profile="SELECT * FROM user WHERE UserID='".$_SESSION["UserID"]."'";
$qry_profile=mysqli_query($conn, $sql_profile);
$row_profile=mysqli_fetch_array($qry_profile);

$strSQL="UPDATE user SET IdCard='$IdCard',Banking='$Banking',Shopname='$Shopname',Shopdetail='$Shopdetail' WHERE UserID='".$_SESSION["UserID"]."'";
$objQuery = mysqli_query($conn, $strSQL);
if (mysqli_query($conn, $strSQL)) 
{
	?>
		<script lanquage="JaveScript" type="text/javascript">
			alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
			window.location.href='profile.php';
		</script>
		<?php
} else {
	?>
	<script lanquage="JaveScript" type="text/javascript">
		alert("ไม่สามารถแก้ไขข้อมูลได้ กรุณาแก้ไขใหม่อีกครั้ง");
		window.location.href="javascript:history.back(-1)";
	</script>
	<?php
}
mysqli_close($conn);
?>