<?php session_start();
header('Content-Type: text/html; charset=utf-8');

require_once('driver.php');

$Email=$_POST['Email'];
$Pass=$_POST['Pass'];
$Fname=$_POST['FirstName'];
$Lname=$_POST['Lastname'];
$DOB=$_POST['DOB'];
$Tel=$_POST['Tel'];
$Gender=$_POST['Gender'];
$Address=$_POST['Address'];
$Country=$_POST['Country'];
$CountAddress='2';
$AddressDefault='1';
$news= $_POST['News'];

$sql_profile="SELECT * FROM user WHERE UserID='".$_SESSION['UserID']."'";
$qry_profile=mysqli_query($conn, $sql_profile);
$row_profile=mysqli_fetch_array($qry_profile);

$strSQL="UPDATE user SET Fname='$Fname',Lname='$Lname',Gender='$Gender',Tel='$Tel',DOB='$DOB',Email='$Email',News='$news',Pass='$Pass' WHERE UserID='".$_SESSION['UserID']."'";
$objQuery = mysqli_query($conn, $strSQL);
if (mysqli_query($conn, $strSQL)) 
{
	
} else {
	?>
	<script lanquage="JaveScript" type="text/javascript">
		alert("ไม่สามารถแก้ไขข้อมูลได้ กรุณาแก้ไขใหม่อีกครั้ง");
		window.location.href="javascript:history.back(-1)";
	</script>
	<?php
}

$strSQL1="UPDATE addressuser SET Address='$Address',CountryID='$Country',CountAddress='$CountAddress',AddressDefault='$AddressDefault' WHERE UserID='".$_SESSION["UserID"]."'AND AddressDefault='1'";
$objQuery1 = mysqli_query($conn, $strSQL1);
if($objQuery1)
	{
		?>
		<script lanquage="JaveScript" type="text/javascript">
			alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
			window.location.href='profile.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script lanquage="JaveScript" type="text/javascript">
			alert('ไม่สามารถแก้ไขข้อมูลได้ กรุณาแก้ไขใหม่อีกครั้ง');
			window.location.href="profile.php";
		</script>
		<?php
	}

mysqli_close($conn);
?>