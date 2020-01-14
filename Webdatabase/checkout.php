<?php
    session_start();
    require_once('driver.php');
    if(!isset($_SESSION['UserID']))
{ 
    echo"<script> alert('Please login');
    window.location = 'home.php'</script>"; 
  exit();
}
    date_default_timezone_set("Asia/Bangkok");
    $count=$_GET['count'];
    $allprice=$_GET['allprice'];
    if(isset($_GET['text'])){
        $text=$_GET['text'];
    }    
$SQLcart="SELECT * from cart WHERE UserID= '".$_SESSION['UserID']."'";
$querycart = mysqli_query($conn,$SQLcart);
$numcart =mysqli_num_rows($querycart); 
$time_save=date("H:i:s");
$date_save=date("Y").'-'.date("m").'-'.date("d")." ".$time_save;
?>
<html>
<head>
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
  margin-left:950px;
}
.btn2 {
  background-color:#f2f2f2;
  border: none;
  color: #1da1f2;
  padding: 10px;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
  position: relative;
  right: 150px;
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


th {
  background-color:#1da1f2;
  color: white;
}

table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 10px;
  overflow: hidden;
  max-width: 1000px;
  width: 100%;
  margin: 10 auto;
  position: relative;
  box-shadow: 0px 1px 10px 0px rgba(0,0,0,0.5);
}
table * {
  position: relative;
}
table td, table th {
  padding-left: 8px;
}
table thead tr {
  height: 60px;
  background: #FFED86;
  font-size: 16px;
}
table tbody tr {
  height: 48px;
  border-bottom: 1px solid #E3F1D5;
}
table tbody tr:last-child {
  border: 0;
}
table td, table th {
  text-align: left;
}
table td.l, table th.l {
  text-align: right;
}
table td.c, table th.c {
  text-align: center;
}
table td.r, table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  table {
    display: block;
  }
  table > *, table tr, table td, table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }
  table tbody tr td:nth-child(1):before {
    content: "Code";
  }
  table tbody tr td:nth-child(2):before {
    content: "Stock";
  }
  table tbody tr td:nth-child(3):before {
    content: "Cap";
  }
  table tbody tr td:nth-child(4):before {
    content: "Inch";
  }
  table tbody tr td:nth-child(5):before {
    content: "Box Type";
  }
}


</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
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
                    <li><a href="showorder.php">Order</a></li>
                    <li><a href="stock.php">Stock</a></li>
                    <li><a href="AddProduct.php">AddProduct</a></li>
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
    <form id ='sendform' method="GET" action="checkoutsend.php">
    <div class='container'>
    <table class='table'>
    <tr>

<th>Product Name</th>
<th>Price/Unit</th>
<th>Type</th>
<th>Quantity</th>
<th>Total</th>
</tr>
<?php
$old=0;
$countshop=1;
$productcheck=array();
$countproductcheck=0;
    for($i=1;$i<=$count;$i++){
    $productdetailid = $_GET['product'.$i];
    $quantity = $_GET['quantity'.$i];
    $price = $_GET['totalprice'.$i];
    $productdetailid = preg_replace('/\D/', '', $productdetailid);
    $SQL = "SELECT * from productdetail p JOIN stock s on p.ProductID=s.ProductID WHERE ProductDetailID = $productdetailid";
    $objquery =mysqli_query($conn,$SQL);
    $objresult = mysqli_fetch_array($objquery);
    $SQL2 = "SELECT * from user WHERE UserID = '".$objresult['SellerID']."'";
    $objquery2 =mysqli_query($conn,$SQL2);
    $objresult2=mysqli_fetch_array($objquery2);
    $SQL3 = "SELECT * from deliverytype WHERE ProductID = '".$objresult['ProductID']."'";
    $objquery3=mysqli_query($conn,$SQL3);
    array_push($productcheck,$objresult['ProductID']);
    $countproductcheck++;
    if($old!=$objresult['SellerID']){
        echo "<tr>
        <td name='shop' value='".$objresult['SellerID']."'>".$objresult2['Shopname']."</td>
        <td>DeliveryType</td>
<td>
<select class='delivery' name='select".$countshop."' id='select".$countshop."' onchange='plus();'>
";
while($result_deliverytype=mysqli_fetch_array($objquery3)){

echo "<option name='".$result_deliverytype['DeliveryTypeID']."' value='".$result_deliverytype['DeliveryPrice']."'>
                                    ".$result_deliverytype['DeliveryType']." ".$result_deliverytype['DeliveryPrice']." ".$result_deliverytype['DeliveryTime']."
                                </option>";
                                
                         
}
                               echo" </td>
        </tr>";
         $old=$objresult['SellerID'];
         $countshop++;
        }  
    echo "<tr>
    <td name='productname'>".$objresult['ProductName']."</td>
    <td>".$objresult['Price']."</td>
    <td>".$objresult['Type'].$objresult['Value']."</td>
    <td>".$quantity."</td>
    <td>".$price."</td>
    <input type='hidden' name='productdetail".$i."' value='".$objresult['ProductDetailID']."'>
    <input type='hidden' name='quantity".$i."' value='".$quantity."'>
    </tr>";
    }
    $countshop--;
    
?>
<tr>
<td>TotalPrice :</td>
<td id="allprice"><?php echo $allprice;?></td>
</tr>
</div>
</form>
<table>
<td> &nbsp;Promotion : &nbsp; </td>
<td><input class="w3-input w3-border" type='text'id="promotion" value='<?php if(isset($_GET['text'])){ echo $text;}?>'></td>
<td><button class='btn2' id="btn" type="button" onclick="checkpromo()"  >Check Promotion</button></td>
</table>
<input type='submit' value='Accept' class='button'onclick="sendvalue()">
<a id="test"></a>
<div id='response'></div>
<script type="text/javascript"> 
var firstallprice=<?php echo $allprice;?>;
console.log(firstallprice);
var allprice;
plus();
function plus(){
    allprice=firstallprice;
    for(var i=1;i<=<?php echo $count;?>;i++){
    var elt = document.getElementById("select"+i);
var price = elt.options[elt.selectedIndex].value;

allprice=parseInt(allprice);
price=parseInt(price);
allprice=allprice+price;
document.getElementById("allprice").innerHTML = allprice;
}

}
function sendvalue(){
    var shop =$("td[name='shop']").map(function(){return $(this).text();}).get();
    var product =$("td[name='productname']").map(function(){return $(this).text();}).get();
   console.log(product);
    console.log(shop);
    var delivery; 
   
for(var i=0;i< <?php echo $countshop;?>;i++){
    var elt = document.getElementById("select"+parseInt(i+1));
    delivery=$(elt).find('option:selected').attr("name");
    var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = delivery;
            element1.name = "delivery"+i;
            document.getElementById("sendform").appendChild(element1);
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = shop[i];
            element1.name = "shopname"+i;
            document.getElementById("sendform").appendChild(element1);
    }
    for(var i=0;i< <?php echo $count;?>;i++ )
    {
        var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = product[i];
            element1.name = "product"+i;
            document.getElementById("sendform").appendChild(element1);
    }
    var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = allprice;
            element1.name = "totalprice";
            document.getElementById("sendform").appendChild(element1);
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = <?php echo $countshop;?>;
            element1.name = "countshop";
            document.getElementById("sendform").appendChild(element1);
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = <?php echo $count;?>;
            element1.name = "count";
            document.getElementById("sendform").appendChild(element1);
     
  
}    
function checkpromo() { 
    var text= document.getElementById("promotion").value;
   url= window.location.href 
    window.location=url+"&text="+text;
}

</script>

</body>
</html>

 <?php 

 if(isset($_GET['text'])){
    $text=$_GET['text'];
$checkpromo=0;
    $SQLpromo="SELECT * from promotion WHERE PromoCode='".$text."'";

    $promoquery=mysqli_query($conn,$SQLpromo);
 
    if($promoquery) {
    $promoobject= mysqli_fetch_array($promoquery);
    $promominimum=$promoobject['Minimumbalance'];
    
    $promodecrease =$promoobject['Discount'];
    $SQLpromocat="SELECT * from promotioncategory WHERE PromoCode='".$text."'";
    $promocatquery = mysqli_query($conn,$SQLpromocat);
    while($promocatobject=mysqli_fetch_array($promocatquery)){
    for($i=0;$i<$countproductcheck;$i++){
        if($productcheck[$i]==$promocatobject['CategoryID']){
            if($date_save<=$promoobject['EndTime']&&$date_save>=$promoobject['StartTime']){
     echo"<script>var element1 = document.createElement('input');
     element1.type = 'hidden';
     element1.value = '".$text."';
     element1.name = 'Promocode';
     document.getElementById('sendform').appendChild(element1);</script>";

            echo "<script>
            if(firstallprice>".$promominimum."&&".$checkpromo."!=1){
                firstallprice=firstallprice-".$promodecrease.";
                console.log(firstallprice);
                plus();"?>
                <?php $checkpromo=1;
                
                echo "
            }
                </script>";
          }
            }
    }
        }
     
 }
 else{
 }
}
 ?>
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
 