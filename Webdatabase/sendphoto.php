<?php
session_start();
require_once('driver.php');
if(isset($_FILES['fileToUpload'])){
    foreach($_FILES['fileToUpload']['tmp_name'] as $key => $val)
{
$file_name = $_FILES['fileToUpload']['name'][$key];
$file_size =$_FILES['fileToUpload']['size'][$key];
$file_tmp =$_FILES['fileToUpload']['tmp_name'][$key];
$file_type=$_FILES['fileToUpload']['type'][$key]; 
move_uploaded_file($file_tmp,"uploads/".$file_name);
echo $_FILES["fileToUpload"]["name"][$key];
$picture = "uploads/";
$picture2 = $picture.$_FILES["fileToUpload"]["name"][$key];
echo $picture2;
$SQL = "UPDATE user SET ProfilePicture = '$picture2' WHERE UserID = '".$_SESSION['UserID']."'";
echo $SQL;
if(mysqli_query($conn,$SQL)){
    echo"<script>alert('Uplode success');
    window.location='profile.php';
    </script>";
    exit();
}
}
}
?>