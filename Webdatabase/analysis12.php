<?php
session_start();
require_once('driver.php');
if(!isset($_GET['month'])){
    $currentDate = date("Y").'-'.date("m");
    $month=$currentDate;
   }
   if(isset($_GET['month'])){
    $currentDate = date("Y").'-'.date("m");
  $month=$_GET['month']; 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Staff Page</title>
  <link rel="stylesheet" href="styl13.css">
  <!-- Latest compiled and minified CSS -->

  <link href="https://fonts.googleapis.com/css?family=Athiti&display=swap" rel="stylesheet">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>


<style>
    
.haha{
    font-family: 'Athiti', sans-serif;

}
    /* The sidepanel menu */
.sidepanel {
  height: 100%; /* Specify a height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
}

/* The sidepanel links */
.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */


/* Position and style the close button (top right corner) */
.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

    </style>


<body class="haha">
<nav class="navbar navbar-light" style="background-color:#111">
<div id="mySidepanel" class="sidepanel">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<div class="col">
        <a href="staffhome.php">Analysis Home</a> 
                <a href="#">Analysis Report</a>
                <ul>
                    <li><a href="analysis1.php">Analysis 1</a></li>
                    <li><a href="analysis2.php">Analysis 2</a></li>
                    <li><a href="analysis3.php">Analysis 3</a></li>
                    <li><a href="analysis4.php">Analysis 4</a></li>
                    <li><a href="analysis5.php">Analysis 5</a></li>
                    <li><a href="analysis6.php">Analysis 6</a></li>
                    <li><a href="analysis7.php">Analysis 7</a></li>
                    <li><a href="analysis8.php">Analysis 8</a></li>
                    <li><a href="analysis9.php">Analysis 9</a></li>
                    <li><a href="analysis10.php">Analysis 10</a></li>
                    <li><a href="analysis11.php">Analysis 11</a></li>
                    <li><a href="#">Analysis 12</a></li>
                    <li><a href="analysis13.php">Analysis 13</a></li>
                    <li><a href="analysis14.php">Analysis 14</a></li>
                    <li><a href="analysis15.php">Analysis 15</a></li>  
                </ul>
        <a href="addpromotion.php">Add Promotion</a>
    <div>
</div>
  
  
  
</div>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Sidepanel</button> 
  <span class="navbar-brand mb-0 h1" style="color:white">Shop Area</span>
  
</nav>


    <!--
  <nav class="navbar">
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </a>
    </span>

    <ul class="navbar-nav">
      <li><a href="#">Analysis</a></li>
      <li><a href="#">Answer Report</a></li>
    </ul>
  </nav>

  <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="#">Analysis</a>
    <a href="#">Answer Report</a>
  </div>
-->
  <div id="main">
    

    <h1><center>สินค้าที่มี Rating มากที่สุดในรอบเดือน</center></h1><hr>
    <div class="container justify-content-md-center shadow-none p-3 mb-5 rounded" style="border:1px solid #cecece; width:80%" >
        <div class="col-sm-3">
        <input class="form-control" type="month" id="month" name="bdaymonth" value="<?php echo $month?>" onchange='changemonth();'><br>
        </div>
        
        <table class="table table-hover" style="width:100%">
                <thead class="thead-light">
                    
                <tr>
                    <th></th>
                    <th><h2><center>ชื่อสินค้า</center></h2></th>
                    <th><h2><center>Rating</center></h2></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $SQL = "SELECT stock.ProductName,AVG(reviewproduct.Rating) AS Rating FROM reviewproduct JOIN checkout ON reviewproduct.OrderID = checkout.OrderID JOIN ordershop ON checkout.OrderID = ordershop.OrderID JOIN stock ON ordershop.SellerID = stock.SellerID WHERE checkout.OrderDate BETWEEN '".$month."-1' AND '".$month."-31'  GROUP BY stock.ProductName ORDER BY Rating DESC";
                $query=mysqli_query($conn,$SQL);
                while($row1 = $query->fetch_assoc()){
                    ?>
                    
                    <tr>
                        <td></td>
                        <td><h3><center><?php echo $row1['ProductName'] ?></center></h3></td>
                        <td><h3><center><?php echo $row1['Rating'] ?></center></h3></td>
                    </tr>
                    
            
                    <?php
                }
                ?>
                </tbody>
            </table>
    </div>
  </div>
  

  <script>
      /* Set the width of the sidebar to 250px (show it) */
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '250px';
      document.getElementById('main').style.marginLeft = '250px';
    }

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
    }
    function changemonth(){

        var month = document.getElementById("month").value;
        window.location="analysis12.php?month="+month;
        console.log(month);
    }
  </script>
</body>
</html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>