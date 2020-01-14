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
<br>


<h1>&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fas fa-shopping-cart fa-1.5x"></i> Shopping Cart</h1>
<br><br>
    <div class='container'>
    <form method="GET" action="checkout.php" id='sendform' onkeydown="return event.key != 'Enter';">      
    <?php 
    $userid=$_SESSION['UserID'];
$SQL= "SELECT * FROM cart c JOIN productdetail p on c.ProductDetailID=p.ProductDetailID JOIN stock s ON p.ProductID=s.ProductID JOIN productpicture pp ON pp.ProductID =s.ProductID Where Userid=$userid GROUP BY c.ProductDetailID Order BY SellerID";
$objquery = mysqli_query($conn,$SQL);
echo "<table class='table table-striped' style='width:100%' id='myTable'>
<thead class='thead-dark'>
<tr>
<th scope='col'>#</th>
<th scope='col'>Shop Name</th>
<th scope='col'>Picture</th>
<th scope='col'>Product Name</th>
<th scope='col'>Type</th>
<th scope='col'>Price/Unit</th>
<th scope='col'>Quantity</th>
<th scope='col'>Total</th>
<th scope='col'>Remove</th>
</tr>
</thead>
";
$count=1;
$old=0;
$allprice=0;
while($objresult = mysqli_fetch_array($objquery))
{   
    $sellerid=$objresult['SellerID'];
    $SQL2 = "SELECT * from user WHERE UserID = $sellerid";
    $objquery2 =mysqli_query($conn,$SQL2);
    $objresult2=mysqli_fetch_array($objquery2);
    $productid=$objresult['ProductID'];
if($old!=$objresult['SellerID']){
echo "<tr>
<td></td>
<td>Shop<br> ".$objresult2['Shopname']."</td>
</tr>";
$old=$objresult['SellerID'];
}  
    echo   " 
    <tr id='row".$count."'>
    <th scope='row'>".$count."</th> 
    <td><input value =".$objresult['ProductDetailID']."id='check' name='check' type='checkbox' onclick='findallprice();' class='option-input checkbox' checked>   </td>
    <td><img src=".$objresult['ProductPicture']." style='width:100px;height:100px;'></td>
    <td>".$objresult['ProductName']."<br> </td>
<td>".$objresult['Type']." ".$objresult['Value']."</td>
<td id='price' name='price'>".$objresult['Price']."</td>
<td>
<input  name='quantity' type='number' class='quantity-text' id='quantity' value='1' onchange='findallprice();' min='1' max='".$objresult['Quantity']."'></td>
       <td id='totalprice".$count."'>".$objresult['Price']."</td> </td> 
       <td><button type='button' id='".$objresult['ProductDetailID']."'onclick='godelete(this.id);'>&emsp;&nbsp;&nbsp;<i class='fas fa-trash-alt'></i></button></td>
       </tr>";
$count++;
}
$count--;
echo "<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Total Price : </td>
<td id='totalallprice'>0</td><td><label>Bath</label></td>
</tr></table>";
?>
<input type='submit' value='check out' class="button" onclick="sendvalue()">
<br>
<br>
<br>
</form>
</div>
<script>
allprice=0;
function godelete(x){
    window.location="deleterow.php?productdelete="+x;
}
function findallprice() {
    allprice=0;
   var quantity =$("input[name='quantity']").map(function(){return $(this).val();}).get();
   var productdetailID =$("input[name='check']").map(function(){return $(this).val();}).get();
   var price = $("td[name='price']").map(function(){return $(this).text();}).get();
   var check = document.getElementsByName("check");
   
   console.log(productdetailID);
   for(i=0;i< <?php echo $count;?>;i++)
   { var x = parseInt(i+1)
    document.getElementById('totalprice'+x).innerHTML=price[i]*quantity[i];
    if(check[i].checked)
    {
        allprice=allprice+(price[i]*quantity[i]);
    }
   }
   document.getElementById('totalallprice').innerHTML=allprice;
 }
function sendvalue(){
    var quantity =$("input[name='quantity']").map(function(){return $(this).val();}).get();
   var productdetailID =$("input[name='check']").map(function(){return $(this).val();}).get();
   var check = document.getElementsByName("check");
   var price = $("td[name='price']").map(function(){return $(this).text();}).get();
  var countpass=0;
   for(i=0;i< <?php echo $count;?>;i++)
   { var x = parseInt(i+1)
    document.getElementById('totalprice'+x).innerHTML=price[i]*quantity[i];
    if(check[i].checked)
    {   countpass++;
        var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = quantity[i];
            element1.name = "quantity"+countpass;
            document.getElementById("sendform").appendChild(element1);
            var element1 = document.createElement("input");
            element1.type = "hidden";
            element1.value = productdetailID[i];
            element1.name = "product"+countpass;
            document.getElementById("sendform").appendChild(element1);
            var element1=document.createElement("input");
            element1.type="hidden";
            element1.value = price[i]*quantity[i];
            element1.name="totalprice"+countpass;
            document.getElementById("sendform").appendChild(element1);          
    }
   }
   var element1=document.createElement("input");
   element1.type="hidden";
   element1.value = countpass;
   element1.name="count";
   document.getElementById("sendform").appendChild(element1);
   var element1=document.createElement("input");
   element1.type="hidden";
   element1.value = allprice;
   element1.name="allprice";
   document.getElementById("sendform").appendChild(element1);
}
findallprice();
</script>
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