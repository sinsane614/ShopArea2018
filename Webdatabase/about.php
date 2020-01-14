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
    <body style=" background-color: #F2F2F2">
<head>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>About</title>
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



.center
{
  width:100%;
  height:auto;
  background-color:#F2F2F2;
  
}
.center-main
{
  width:90%;
  margin:auto;
  background-color:#F2F2F2;
}

.center-left h2
{
  color:#424242;
 
}
.center-left p
{
  color:#424242; 
}
.progress
{
  height:30px;  
}
.center-middle
{     
  clear:both;
  background-color:white; 
  background-color:#F2F2F2;
}
.paragraph
{
  padding-top:10px;
  text-align:center;
  color:#424242;
}

.pict img
{
  border-radius:50%;
  width:100px;
  border:4px solid white;
  
}
 .txt
{
  color:#848484;
   line-height:10px;
} 
.caption h5
{
  color:#2E2E2E;
  line-height:2px;
}

.thumbnail
{
  text-align:center;
    width:180px;
    height:270px;
  border:1px solid #F2F2F2;
  background-color:#F2F2F2;
  
    
}


.blog
{
  margin-top:30px;
}

#thum
{
  padding:0px;
  margin:0px;
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
            <li><a href="#">About</a></li>
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
<br><br><br><br>





 <div class="center">
   <div class="center-main">
     
    <div class="row">
           
         <div class="section">
		<div class="top-border left"></div>
		<div class="top-border right"></div>
		<h1>ABOUT US</h1>
		<p>เป็นเว็บไซต์ขายสินค้าออนไลน์สามารถเข้าใช้งานได้เมื่อสมัครและล็อกอินเข้าใช้งานเว็บไซต์ โดยทางผู้ขายจะสามารถลงสินค้าบนหน้าเว็บไซต์ของเราให้ผู้ซื้อสามารถดูหรือสั่งซื้อสินค้าได้และ ยังสามารถดู ประวัติการซื้อขาย มีการแยกหมวดหมู่สินค้า มีระบบให้คะแนนร้านค้า และคอมเม้นเกี่ยวกับสินค้า หรือ ตัวแทนจำหน่ายระบบแจ้ง ปัญหาการใช้งานเว็บไซต์แจ้ง ปัญหาสินค้าหรือผู้ขายมีเจ้าหน้าที่แต่ละฝ่ายคอย ดูแล และตรวจสอบระบบอยู่เสมอ</p>

		</div>
         
      
     
       <!--col-lg-6 col-md-6 col-sm-12 col-xs-12-->
     
     
     </div><!--row-->
     <div class="center-middle">
     <div class="paragraph">
       <h2>Meet The Team</h2>
       
       </div><!--paragraph-->
       <br><br>
         <div class="blog">
    
         
         <div class="row">
		 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <div class="col-xs-4 col-md-2">
    <div class="thumbnail"><div class="pict">
      <img src=pic/frong.jpg alt="error"></div>
      <div id="thum" class="caption" ><br>
       <h5>Mr.Nawarit</h5><br>
        <h5>Longkhum</h5><br>
       <p><font size = "4">60070501028</font></p>
         
      </div>
    </div>
  </div>
  <div class="col-xs-4 col-md-2">
    <div class="thumbnail"><div class="pict">
      <img src=pic/mos.jpg alt="error"></div>
      <div class="caption"><br>
      <h5>Mr.Pumiphat</h5><br>
        <h5>Palakawong </h5><br>
          <h5>Na Ayuthaya</h5><br>
       <p><font size = "4">60070501044</font></p>
        
      </div>
    </div>
  </div>
        
    <div class="col-xs-4 col-md-2">
    <div class="thumbnail">
      <div class="pict">
      <img src="pic/mek1.jpg" alt="error"></div>
      <div class="caption"><br>
        <h5>Mr.Suthawee</h5><br>
        <h5>Weerapong</h5><br>
        <p><font size = "4">60070501059</font></p>
        
      </div>
    </div>
  </div>
    <div class="col-xs-4 col-md-2">
    <div class="thumbnail">
      <div class="pict">
      <img src="pic/na2.jpg" alt="error"></div>
      <div class="caption"><br>
       <h5>Mr.Napat</h5><br>
        <h5>Saeong</h5><br>
        <p><font size = "4">60070501078</font></p>
      </div>
    </div>
  </div>
             <div class="col-xs-4 col-md-2">
    <div class="thumbnail"><div class="pict">
      <img src=pic/cil.jpg alt="error"></div>
      <div id="thum" class="caption" ><br>
        <h5>Mrs.Watsamon </h5><br>
        <h5>Phanthong </h5><br>
        <p><font size = "4">60070501083</font></p>
         
      </div>
    </div>
  </div>
</div>
 
       </div><!--blog-->
     </div><!--center-middle-->
     </div><!--center-main-->
 
  </div><!--center--> 
</div><!--container-->
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