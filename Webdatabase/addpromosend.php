<?php
// Check if image file is a actual image or fake image
session_start();
require_once('driver.php');
$userid = $_SESSION['UserID'];
$promocode = $_POST["Promocode"];
$discount = $_POST["Discount"];
$promodetail = $_POST["Promodetail"];
$starttimer = $_POST["Starttime"];
$category =$_POST["Category"];
$endtime=$_POST['Endtime'];
$minimumbalance=$_POST['Minimumbalance'];
if(isset($_FILES['fileToUpload'])){
   foreach($_FILES['fileToUpload']['tmp_name'] as $key => $val)
{
$file_name = $_FILES['fileToUpload']['name'][$key];
$file_size =$_FILES['fileToUpload']['size'][$key];
$file_tmp =$_FILES['fileToUpload']['tmp_name'][$key];
$file_type=$_FILES['fileToUpload']['type'][$key]; 
move_uploaded_file($file_tmp,"uploads/".$file_name);
$picture = "uploads/";
$picture2 = $picture.$_FILES["fileToUpload"]["name"][$key];

}
}
$Sql = "INSERT INTO Promotion (Promocode,Discount,Promodetail,StartTime,EndTime,PromoPicture,Minimumbalance) 
VALUES ('$promocode','$discount','$promodetail','$starttimer','$endtime','$picture2','$minimumbalance')";
if(mysqli_query($conn,$Sql)){
    $SQL2 ="INSERT INTO promotioncategory (CategoryID,PromoCode) VALUES ('$category','$promocode')";
    if(mysqli_query($conn,$SQL2)){
    echo"<script>alert('เพิ่มโปรโมชั่นเรียบร้อยแล้ว');window.location='addpromotion.php';</script>";
    exit();    
    }
    else {

      echo"<script>alert('เพื่มโปรโมชั่นผิดพลาด');window.history.back();</script>";
exit();      
    }
}  
else{
  echo"<script>alert('เพื่มโปรโมชั่นผิดพลาด');window.history.back();</script>";
}
  mysqli_close($conn);
?>