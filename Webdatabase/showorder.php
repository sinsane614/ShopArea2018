<?php 
session_start();
require_once('driver.php');
if(!isset($_SESSION['UserID']))
{ 
    echo"<script> alert('Please login');
    window.location = 'home.php'</script>";
  exit();
}
$SQLcart="SELECT * from cart WHERE UserID= '".$_SESSION['UserID']."'";
$querycart = mysqli_query($conn,$SQLcart);
$numcart =mysqli_num_rows($querycart); 
?>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
 <style>

.quantity-text {
  float: left;
  width: 50%;
}
.table-primary .quantity-text input {
  width: 50px;
}

*{font-family: 'Roboto', sans-serif;}



.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 0px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 20px;
  width: 20px;
  transition: all 0.15s ease-out 0s;
  background: #1da1f2;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #000000;
}
.option-input:checked::before {
  height: 10px;
  width: 15px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 22px;
  text-align: center;
  line-height: 20px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;

}


  .button {
  background-color: #1da1f2;
  border: none;
  color: white;
  padding: 10px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
  font-weight: 700;
  margin-left:1000px;
}


.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: 12px;
}


</style>
 

</head>

<body> 
<nav>
        <p>Shop Area</p>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">contact</a></li>
            <li>
                <a href="#">Menu▾</a>
                <ul>
                    <li><a href="report.php">Report</a></li>
                    <li><a href="#">Order</a></li>
                    <li><a href="stock.php">Stock</a></li>
                </ul>

            </li>

        </ul>
        <div class="search-container">
            <form action="/action_page.php">
                <input id="2",type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <section class="nav-container">
   
            <aside class="menu">
                <div class="menu-container">
                <a href="cart.php" id="cart" class="fas fa-shopping-cart " style="font-size:20px;color:#1da1f2;"></a><span class='badge badge-warning' id='lblCartCount'> <?php echo $numcart?> </span>&emsp;<a href="login.php" id="login">Login</a> | <a href="regis.php" id="regis">register</a>
                </div>

            </aside>
        </section>
    </nav>
    <?php $SQLcheckout= "SELECT * from checkout WHERE UserID='".$_SESSION['UserID']."'";
    $querycheckout=mysqli_query($conn,$SQLcheckout);
    echo"<table class='table table-striped' style='width:100%'>
    <tr>
    <thead class='thead-dark'>
    <th scope='col'>รหัสออเดอร์สินค้า</th>
    <th scope='col'>วันที่สั่ง</th>
    <th scope='col'>สถานะ</th>
    <th scope='col'>ราคารวม</th>
    
    </tr>
    </thead>"
    ;
    
    while($objcheckout=mysqli_fetch_array($querycheckout)){
    $SQLorderdetail="SELECT * from ordershop WHERE OrderID ='".$objcheckout['OrderID']."'";
    $queryorderdetail=mysqli_query($conn,$SQLorderdetail);
    
    if($objorderdetail=mysqli_fetch_array($queryorderdetail)){
    echo"<tr>
    <td><a href='showorderdetail.php?id=".$objcheckout['OrderID']."'>".$objcheckout['OrderID']."</a> </td>
    <td>".$objcheckout['OrderDate']."</td>
    <td>";
    if($objorderdetail['StatusOrder']==1)
    {
        echo "รอชำระเงิน";
    }
    else if($objorderdetail['StatusOrder']==2)
    {

      echo "รอการจัดส่ง";
    }
    else if($objorderdetail['StatusOrder']==3)
    {

      echo "จัดส่งเรียบร้อย";
    }
    
    echo"</td>
    <td>".$objcheckout['totalprice']."</td>
    
    </tr> ";
    }
  
    else {
      echo"<tr>
      <td><a href='showorderdetail.php?id=".$objcheckout['OrderID']."'>".$objcheckout['OrderID']."</a> </td>
    <td>".$objcheckout['OrderDate']."</td>
    <td>สินค้าทั้งหมดถูกลบไปแล้ว</td>
    <td>".$objcheckout['totalprice']."</td>
      </tr>";
    }
    }
    ?></table>
     
    <a href="home.php">&emsp;&emsp;&emsp;<div class="btn btn-warning">Back</div></a>
    </body>
    </html>
    <?php
if(isset($_SESSION["UserID"]))
{   
    echo '<script>';
    echo 'document.getElementById("login").innerHTML= "Welcome '.$_SESSION['Username'].'";';
    echo 'document.getElementById("login").href= "profile.php";';
    echo 'document.getElementById("regis").innerHTML= "logout";';
    echo 'document.getElementById("regis").href= "logout.php";';
    echo '</script>'; 
}
?>