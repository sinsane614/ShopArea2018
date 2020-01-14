<?php
// Check if image file is a actual image or fake image
session_start();
require_once('driver.php');
$userid = $_SESSION['UserID'];
$reportdetail = $_POST["ReportDetail"];
$reportdate = $_POST["ReportDate"];
$reporttime = $_POST["ReportTime"];
$reportuser = $_POST["ReportUser"];
$reportcategory=$_POST['type_report'];
$SQLreportuser = "SELECT UserID FROM user WHERE Username='".$reportuser."' OR Shopname='".$reportuser."'";
$queryreport=mysqli_query($conn,$SQLreportuser);
if(mysqli_num_rows($queryreport) > 0)
{
$objreport=mysqli_fetch_array($queryreport);
$Sql = "INSERT INTO Report (UserID,ReportCategoryID,ReportDetail,ReportStatus,ReportDate,ReportTime,ReportUser,EmployeeID) 
VALUES ('$userid','$reportcategory','$reportdetail','1','$reportdate','$reporttime','".$objreport['UserID']."',NULL)";
if(mysqli_query($conn,$Sql)){
    $last_id =  $conn->insert_id;
}


    }
else{
    echo"<script>alert('ไม่มีผู้ใช้นี้');window.history.back();</script>";
    exit();
}

      
if ($reportcategory == "1")
{
   for ($x = 1; $x <= 3; $x++) 
   {
        if ($x == 1)
        {   
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','1')";
            mysqli_query($conn,$Sql1);
        }
       else if ($x == 2)
       {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','2')"; 
            mysqli_query($conn,$Sql1);
       }
        else if ($x == 3)
       {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','5')"; 
            mysqli_query($conn,$Sql1);
       }
       else {}
   } 
    
    
}
else if ($reportcategory == "2")
{
    for ($x = 1; $x <= 3; $x++) 
   {
        if ($x == 1)
        {   
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','1')";
            mysqli_query($conn,$Sql1);
        }
       else if ($x == 2)
       {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','3')"; 
            mysqli_query($conn,$Sql1);
       }
        else if ($x == 3)
       {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','6')"; 
            mysqli_query($conn,$Sql1);
       }
       else {}
   } 
    
}
else if ($reportcategory == "3")
{
    for ($x = 1; $x <= 5; $x++) 
   {
         if ($x == 1)
        {   
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','1')";
            mysqli_query($conn,$Sql1);
        }
         else if ($x == 2)
        {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','2')"; 
            mysqli_query($conn,$Sql1);
        }
         else if ($x == 3)
        {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','3')"; 
            mysqli_query($conn,$Sql1);
        }
          else if ($x == 4)
        {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','5')"; 
            mysqli_query($conn,$Sql1);
        }
          else if ($x == 5)
        {
            $Sql1 = "INSERT INTO Reportposition (ReportID,PositionID) 
            VALUES ('$last_id','6')";
            mysqli_query($conn,$Sql1);
        }
          else {}
   } 
    
}
$count=0;
if(isset($_FILES['fileToUpload']))
{
    foreach($_FILES['fileToUpload']['tmp_name'] as $key => $val)
    {
        $file_name = $_FILES['fileToUpload']['name'][$key];
        $file_size =$_FILES['fileToUpload']['size'][$key];
        $file_tmp =$_FILES['fileToUpload']['tmp_name'][$key];
        $file_type=$_FILES['fileToUpload']['type'][$key]; 
        $newfilename=explode(".",$file_name);
        move_uploaded_file($file_tmp,"uploads/".$last_id.$newfilename[0].".".$newfilename[1]);
        $picture = "uploads/";
        $picture2 = $picture.$last_id.$newfilename[0].".".$newfilename[1];
        $SQL = "INSERT INTO reportpic (ReportPicture,ReportID) VALUES ('$picture2','$last_id')";
        if(mysqli_query($conn,$SQL))
        {
            echo"Upload Success<br>";
        }
        else  
        {
        echo"failed";
        }
    }
}
echo"<script>alert('Uplode success');
window.location='report.php';
</script>";
mysqli_close($conn);
?>