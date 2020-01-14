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
?><html>
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
 <script>
function deletefun(x){
    console.log(x);
    var r=confirm("Press a button!");
    if(r==true){
    window.location="deletestock.php?productid="+x;
    }
}
</script>

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
    
<form action="stockeditphp.php" method="GET">
    <table class='table table-striped' style='width:100%' id='myTable'>
<thead class='thead-dark'>
<tr>
<th scope='col'>#</th>
<th scope='col'>Picture</th>
<th scope='col'>Product Name</th>
<th scope='col'>Product Detail</th>
<th scope='col'>Type</th>
<th scope='col'>Price/Unit</th>
<th scope='col'>Remove</th>
</tr>
</thead>

    <?php $SQLstock= "SELECT * from stock WHERE SellerID ='".$_SESSION['UserID']."'";
        $querystock=mysqli_query($conn,$SQLstock);
        $count=0;
        while($objstock=mysqli_fetch_array($querystock)){
            $count++;
        $SQL= "SELECT * FROM productdetail WHERE ProductID='".$objstock['ProductID']."'";
        $query=mysqli_query($conn,$SQL);
        $objresult=mysqli_fetch_array($query);
        $SQL2= "SELECT * FROM productpicture WHERE ProductID='".$objstock['ProductID']."'";
        $query2=mysqli_query($conn,$SQL2);
        $objresult2=mysqli_fetch_array($query2);
        echo "<tr id='row'>
        <th scope='row'>".$count."</th> 
        
        <td><img src=".$objresult2['ProductPicture']." style='width:120px;height:120px;'></td>
        <td><input type='text' class='form-control' name='productname".$count."' placeholder='ProductName' value=".$objstock['ProductName']."><br> </td>
        <td><textarea class='form-control' name='productdetail".$count."'>".$objstock['ProductDetail']."</textarea></td>
        <td>".$objresult['Type']." ".$objresult['Value']." Quantity is  ".$objresult['Quantity']."";
        while($objresult=mysqli_fetch_array($query)){    
        echo "<br>".$objresult['Type']." ".$objresult['Value']." Quantity is  ".$objresult['Quantity']."";
        }

echo"</td>
        <td id='price' name='price'><input type='text' class='form-control' name='price".$count."' placeholder='Price' value=".$objstock['Price']."><br> </td>
        <td><button type='button' id='".$objstock['ProductID']."'onclick='deletefun(this.id);'>&emsp;&nbsp;&nbsp;<i class='fas fa-trash-alt'></i></button></td>
           <input type='hidden' name='".$count."' value='".$objstock['ProductID']."' ?>
           </tr>
        
        ";
    }?>
    </table>
    <input type='hidden' name='count' value='<?php echo $count?>' ?>
    &emsp;&emsp;<input type='submit' class="btn btn-info" name="send" value="Submit">
    <a href="javascript:history.back(-1)">&emsp;&emsp;&emsp;<div class="btn btn-warning">Cancle </div></a>
    </form>
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