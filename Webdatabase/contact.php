<?php 
session_start();
require_once('driver.php');
if(isset($_SESSION['UserID']))
{ 
  $SQLcart="SELECT * from cart WHERE UserID= '".$_SESSION['UserID']."'";
  $querycart = mysqli_query($conn,$SQLcart);
  $numcart =mysqli_num_rows($querycart);
}
?>
<!DOCTYPE html>
<html>
<body style=" background-color: #ffffff">
    <head>
    
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
        

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
            * {
  box-sizing: border-box;
  color: #333;
}

body {
  font-family: "PT Sans";
  background-color: #ddd;
}

.section {
  position: relative;
  width: 900px;
  max-width: 80%;
  border: 2px solid #333;
  border-top: none;
  text-align: center;
  margin: 60px auto;
}

.section h1 {
  position: relative;
  margin-top: -14px;
  display: inline-block;
  letter-spacing: 4px;
}

.top-border{
  position: absolute;
  height: 2px;
  width: 24%;
  background-color: #333;
}

.right {
  right: 0;
}

.left {
  left: 0;
}

@media (max-width: 685px) {
.top-border {	
  width: 18%;
	}
}

.section p {
  width: 61%;
  margin: 20px auto 40px auto;
  line-height: 30px;
}

.section a {
  outline: 0;
  display: inline-block;
  padding: 20px;
  margin-bottom: 40px;
  width: 440px;
  max-width: 80%;
  background-color: #333;
  color: #fff;
  font-size: 22px;
  letter-spacing: 3px;
  transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -webkit-transition: all 0.3s ease 0s;
}

.section a:hover {
  background-color: #1D222D;
}

.section a:link, .section a:visited, .section a:link:hover, .section a:visited:hover {
  text-decoration: none;
  color: #fff;
}

@media (max-width: 500px) {
  .top-border {	
    display: none;
  }
  .section {
  border-top: 2px solid #333;
  }
  .section h1 {
    margin: 20px 6px;
  }
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
                <a href="cart.php" id="cart" class="fas fa-shopping-cart " style="font-size:20px;color:#1da1f2;"></a><span class='badge badge-warning' id='lblCartCount'> <?php if(isset($_SESSION['UserID'])) {echo $numcart;}?> </span>&emsp;<a href="login.php" id="login">Login</a> | <a href="regis.php" id="regis">register</a>
                </div>

            </aside>
            </section>
        </nav>

        <div class="section">
            <div class="top-border left"></div>
            <div class="top-border right"></div>
            <h1>CONTACT US</h1>
            <p>
                We have been running shops for the last twenty years. We’re good guys and we’re totally happy to help, so get in touch.<br>
                If you want to email us about an existing order: orders [at] Shop Area.com<br>
                - It helps us if you have your order number as a reference.<br>
                If you want to email us about anything else: hello [at] Shop Area.com<br>
                You can phone us on 0044 (0) 800 8620192. Our office hours are Mon-Fri 08:30-17:00 GMT.<br>
                All correspondence and returns to;<br>
                Shop Area Company Bangkok Thailand :)<br>
            </p>
            <a href="home.php">CONTACT US</a>
        </div>


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