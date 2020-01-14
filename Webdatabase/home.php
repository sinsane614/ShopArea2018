<!DOCTYPE php
>
<?php session_start(); 
require_once('driver.php');
if(isset($_SESSION['UserID'])){
$SQLcart="SELECT * from cart WHERE UserID= '".$_SESSION['UserID']."'";
$querycart = mysqli_query($conn,$SQLcart);
$numcart =mysqli_num_rows($querycart);
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Shop Area</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/tooplate-main.css">
    <link rel="stylesheet" href="css/owl.css">
    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


  
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
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
            <li><a href="#">Home</a></li>
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

    <div class="row">
        <div class="col-sm-12">
            <div id="my-slider" class="carousel slide" deta-ride>
                <!-- indicators don nov-->
                <!-- wrapper for sliders-->
                <div class="carousel-inner" role="listbox">
                    <!-- ต้องการมีกี่หน้าให้มาเพิ่ม ที่div พวกนี้ -->
                   
                
                    <div class="item active">
                        <img src="pic/banner.jpg" alt="shop" />
                        <div class="carousel-caption">
                            <h1>Lets</h1>
                        </div>
                    </div>
                    <div class="item">
                        <img src="pic/banner2.jpg" alt="shop" />
                        <div class="carousel-caption">
                            <h1>SHOPPING</h1>
                        </div>
                    </div>
                   
                    <div class="item ">
                        <img src="pic/banner3.jpg" alt="shop" />
                        <div class="carousel-caption">
                            <h1>IN HERE</h1>
                        </div>
                    </div>
              
                </div>
                <!-- controls or next and prec buttons-->
                <a class="left carousel-control" href="#my-slider" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"> </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#my-slider" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> </span>
                    <span class="sr-only">Previous</span>
                </a>

            </div>
        </div>
    </div>

    <?php 

        for($i=1;$i<=5;$i++)
        { 
            $SQL = "SELECT * FROM stock WHERE CategoryID = $i ORDER BY RAND() ";
            $objQuery = mysqli_query($conn,$SQL);
            $SQL3 = "SELECT * from category WHERE CategoryID = $i";
            $objquery3 = mysqli_query($conn,$SQL3);
            $objResult3 = mysqli_fetch_array($objquery3);
            echo '<div class="featured-items">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>'.$objResult3['CategoryType'].'</h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">';
$num=mysqli_num_rows($objQuery);
$num=$num+1;
for($x=1;$x<$num;$x++)
{
    $objResult = mysqli_fetch_array($objQuery);
    $SQL2 = "SELECT * FROM productpicture WHERE ProductID = ".$objResult['ProductID']."";
    $objQuery2 = mysqli_query($conn,$SQL2);
    $objResult2 = mysqli_fetch_array($objQuery2);
        echo '<a href="single-product.php?id='.$objResult['ProductID'].'">
        <div class="featured-item">
            <img src='.$objResult2['ProductPicture'].' alt="Item 1">
            <h4>'.$objResult['ProductName'].'</h4>
            <h6>'.$objResult['Price'].'</h6>
        </div>
            </a>';
}
      echo "        </div>
      </div>
  </div>
</div>
</div>"                ;
        }
        ?>
        

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="js/custom.js"></script>
    <script src="js/owl.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0;
        function clearField(t) {              
            if (!cleared[t.id]) {                     
                cleared[t.id] = 1; 
                t.value = '';       
                t.style.color = '#fff';
            }
        }
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