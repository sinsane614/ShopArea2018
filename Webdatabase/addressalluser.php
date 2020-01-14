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
<script>
function add(){
    window.location="addaddress.php"
}    
function testfun(x){
    console.log(x);
    window.location="deleteaddress.php?addressdelete="+x;
}function testfun2(x){
    console.log(x);
    window.location="setaddress.php?address="+x;
}
</script>
    
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
                <a href="#" id="cart" class="fas fa-shopping-cart " style="font-size:20px;color:#1da1f2;"></a><span class='badge badge-warning' id='lblCartCount'> <?php echo $numcart?> </span>&emsp;<a href="login.php" id="login">Login</a> | <a href="regis.php" id="regis">register</a>
                </div>

            </aside>
        </section>
    </nav>
    <?php 
    $id=$_SESSION['UserID'];
    $SQLaddress="SELECT * from addressuser WHERE UserID=$id ORDER BY CountAddress" ;
    $queryaddress=mysqli_query($conn,$SQLaddress);
    $count=1;
    echo "<table class='table table-striped' style='width:100%' id='myTable'>
    <thead class='thead-dark'>
    <tr>
 <th>ลำดับ</th>
 <th>ที่่อยู่</th>
 <th>ประเทศ</th>
 <th>ที่อยู่จัดส่ง</th>
 <th>ลบ</th>
    </tr>
    </thead>
    ";
    while($objaddress=mysqli_fetch_array($queryaddress)){
    $SQLcountry="SELECT * from country WHERE CountryID='".$objaddress['CountryID']."'";
    $querycountry=mysqli_query($conn,$SQLcountry);
    $objcountry=mysqli_fetch_array($querycountry);
        echo"<tr>
    <td>".$count."</td>
    <td>".$objaddress['Address']."</td>
    <td>".$objcountry['Countryname']."</td>
    <td><button type='button' id='".$count."' onclick='testfun2(this.id);'>ตั้งค่าเป็นที่อยู่จัดส่ง</button></td>
    <td><button type='button' id='".$count."'onclick='testfun(this.id);'>&emsp;&nbsp;&nbsp;<i class='fas fa-trash-alt'></i></button></td>
    </tr>";
    $count++;
    }
?>
</table>
<br><button type="button" onclick='add();'>&emsp;&emsp;&emsp;&emsp;ADD</button>
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