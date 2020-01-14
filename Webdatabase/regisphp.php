<?php
require_once('driver.php');
$email= $_POST['Email'];
$username= $_POST['Username'];
$pass= $_POST['Pass'];
$firstname= $_POST['FirstName'];
$lastname= $_POST['Lastname'];
$dob= $_POST['DOB'];
$tel= $_POST['Tel'];
$address= $_POST['Address'];
$gender= $_POST['Gender'];
$country= $_POST['country'];
$news= $_POST['News'];

$SQL = "INSERT INTO user (Fname,Lname,Gender,Tel,DOB,Email,News,Username,Pass)
VALUES ('$firstname','$lastname','$gender','$tel','$dob','$email','$news','$username','$pass')";
if (mysqli_query($conn, $SQL)) {
    $last_id =  $conn->insert_id;
} else {
	?>
	<script lanquage="JaveScript" type="text/javascript">
		alert("ไม่สามารถลงทะเบียนได้ กรุณาแก้ไขใหม่อีกครั้ง");
		window.location.href="javascript:history.back(-1)";
	</script>
	<?php
}
$SQL = "INSERT INTO addressuser (UserID,Address,CountryID,CountAddress,AddressDefault)
VALUES ('$last_id','$address','$country','1','1')";

if (mysqli_query($conn, $SQL)) 
{
	?>
	<script lanquage="JaveScript" type="text/javascript">
		alert('ลงทะเบียนเรียบร้อยแล้ว');
		window.location.href='login.php';
	</script>
	<?php
} else {
	?>
	<script lanquage="JaveScript" type="text/javascript">
		alert("ไม่สามารถลงทะเบียนได้ กรุณาแก้ไขใหม่อีกครั้ง");
		window.location.href="javascript:history.back(-1)";
	</script>
	<?php
}
mysqli_close($conn);
?>