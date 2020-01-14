<?php
session_start();
require_once('driver.php');
if(!isset($_POST['Value1'])){
    echo"<script>
    alert('ยังไม่ได้ใส่ ชนิด ให้สินค้า');
    window.history.back();
    </script>";
    exit();
}
if(!isset($_POST['deliverytype1'])){
    echo"<script>
    alert('ยังไม่ได้ใส่วิธีการจัดส่ง');
    window.history.back();
    </script>";
    exit();
}

$shopname = $_POST["shopname"];
$productname = $_POST["productname"];
$category = $_POST["Category"];
$price = $_POST["price"];
$discounttype = $_POST["DiscountType"];
$discountprice = $_POST["discount"];
$productdetail = $_POST["ProductDetail"];
$Sql = "INSERT INTO stock (SellerID,ProductName,Price,CategoryID,ProductDetail,DiscountPrice,DiscountType) 
VALUES ('$shopname','$productname','$price','$category','$productdetail','$discountprice','$discounttype')";
if(mysqli_query($conn,$Sql)){
    $last_id =  $conn->insert_id;
    echo"Record succesful";
}
for ($i = 1; $i<= (int)$_POST["hdnCount"]; $i++){

    if($_POST["Value$i"] != "" && 
            $_POST["Type$i"] != "" &&
            $_POST["quantity$i"] != "" )
    {
        $value = $_POST["Value$i"];
        $type = $_POST["Type$i"];
        $quantity = $_POST["quantity$i"];
        $SQL = "INSERT INTO productdetail (ProductDetailID,Type,Value,Quantity,ProductID) 
        VALUES (NULL,'$type','$value','$quantity','$last_id')";
        if(mysqli_query($conn,$SQL)){
            echo"Record succesful";
        }
    }
}
    for ($i = 1; $i<= (int)$_POST["hdnCount2"]; $i++){

        if($_POST["deliverytype$i"] != "" && 
                $_POST["deliveryprice$i"] != "" &&
                $_POST["deliverytime$i"] != "" )
        {
            $deliverytype = $_POST["deliverytype$i"];
            $deliveryprice =$_POST["deliveryprice$i"];
            $deliverytime = $_POST["deliverytime$i"];
            $SQL = "INSERT INTO deliverytype (DeliveryTypeID,ProductID,DeliveryType,DeliveryPrice,DeliveryTime) 
            VALUES (NULL,'$last_id','$deliverytype','$deliveryprice','$deliverytime')";
            if(mysqli_query($conn,$SQL)){
                echo"Record succesful";
            }
        }
    } 

    if(isset($_FILES['fileToUpload'])){
        echo "a";
    foreach($_FILES['fileToUpload']['tmp_name'] as $key => $val)
	{
    $file_name = $_FILES['fileToUpload']['name'][$key];
    $file_size =$_FILES['fileToUpload']['size'][$key];
    $file_tmp =$_FILES['fileToUpload']['tmp_name'][$key];
    $file_type=$_FILES['fileToUpload']['type'][$key]; 
    move_uploaded_file($file_tmp,"uploads/".$file_name);
    $picture = "uploads/";
    $picture2 = $picture.$_FILES["fileToUpload"]["name"][$key];
    $SQL = "INSERT INTO productpicture (ProductID,ProductPicture) 
    VALUES ('$last_id','$picture2')";
    if(mysqli_query($conn,$SQL)){
        echo"Record succesful";
        echo "<script> window.location.href='stock.php';</script>";
    }
}
    }
        mysqli_close($conn);
?>