<?php session_start();
header('Content-Type: text/html; charset=utf-8');

require_once('driver.php');

$email =$_POST['Email'];
$username =$_POST['Username'];
$Password =$_POST['Password'];
$FirstName =$_POST['FirstName'];
$Lastname =$_POST['Lastname'];
$Tel =$_POST['Tel'];
$Address =$_POST['Address'];

$strSQL = "UPDATE user SET Email = '".trim($_POST['email'])."',Username = '".trim($_POST['username'])."',
Fname = '".trim($_POST['FirstName'])."', Lname = '".trim($_POST['Lastname'])."',
DOB = '".trim($_POST['DOB'])."', Tel = '".trim($_POST['Tel'])."
',Tel = '".trim($_POST['txtName'])."',Address = '".trim($_POST['txtName'])."',Country = '".trim($_POST['txtName'])."'  
WHERE UserID = '".$_SESSION["UserID"]."


$objQuery = mysqli_query($con, $strSQL);

if($objQuery)
	{
		?>
		<script lanquage="JaveScript" type="text/javascript">
			alert("แก้ไขข้อมูลเรียบร้อยแล้ว รหัสผ่านของคุณคือ <?=$password;?>");
			window.location.href='';
		</script>
		<?
	}
	else
	{
		?>
		<script lanquage="JaveScript" type="text/javascript">
			alert("ไม่สามารถแก้ไขข้อมูลได้ กรุณาแก้ไขใหม่อีกครั้ง");
			window.location.href='';
		</script>
		<?
	}
mysqli_close();
?>