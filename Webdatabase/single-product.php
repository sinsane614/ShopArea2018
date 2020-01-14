<!DOCTYPE html>
<?php
    session_start();
    require_once('driver.php');
  
    if(isset($_GET['text'])){
        $text=$_GET['text'];
    }    
    $SQLcart="SELECT * from cart WHERE UserID= '".$_SESSION['UserID']."'";
$querycart = mysqli_query($conn,$SQLcart);
$numcart =mysqli_num_rows($querycart); 

require_once('driver.php');
 $id = $_GET['id'];
 $SQL = "SELECT * FROM stock WHERE ProductID = $id";
 $objquery = mysqli_query($conn,$SQL);
    $objresult = mysqli_fetch_array($objquery);
    $SQL2 ="SELECT * FROm productpicture WHERE productID = $id";
    $objquery2= mysqli_query($conn,$SQL2);
    $objquery3=$objquery2;
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Shop Area</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/tooplate-main.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/flex-slider.css">

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
.rating{
  margin-left: 50px;
  }


  @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro");

body {
  font-family: "Source Sans Pro", sans-serif;
  -webkit-touch-callout: none;
  -webkit-user-select: none; 
  -khtml-user-select: none; 
  -moz-user-select: none;
  -ms-user-select: none; 
  user-select: none; 
                                
}
p {
  line-height: 1.6;
}
.content-wrap {
  max-width:1150px;
  width: 100%;
  margin: 5px 270px 5px;

}
.comment-item {
  position: relative;
  background: white;
  box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.2);



  &--inner {
    padding: 2em 1em;
    position: relative;
    &:after {
      content: "";
      position: relative;
      display: block;
      clear: both;
    }
  }
}


.is-right--inner {
  margin: 10px 30px 10px 30px;
  padding: 30px 30px 30px 30px;

  small {
    padding-left: 0.7em;
    color: #999;
    font-size: 0.7em;
  }
}
.name {
  color: #367588;
  text-decoration: none;
  font-size: 14px;
  font-weight: 700;
}



</style>

    
</head>
<body>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

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
                <a href="#" id="cart" class="fas fa-shopping-cart " style="font-size:20px;color:#1da1f2;"></a><span class='badge badge-warning' id='lblCartCount'> <?php echo $numcart?> </span>&emsp;<a href="login.php" id="login">Login</a> | <a href="regis.php" id="regis">register</a>
                </div>

            </aside>
        </section>
    </nav>
    <br>
    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1><?php echo $objresult['ProductName'];?></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-slider">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <!-- items mirrored twice, total of 12 -->
                                <?php while($objresult2=mysqli_fetch_array($objquery2))
                                {
echo "<li>
    <img src =".$objresult2['ProductPicture']." style='width:400px;height:400px;'>
</li>";
                                }
                                ?>
                            </ul>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-content">
                    <?php if($objresult['DiscountType']==1){
    $priceofproduct = $objresult['Price'] - ($objresult['Price']*$objresult['DiscountPrice']/100);
}
else{
    $priceofproduct = $objresult['Price'] - $objresult['DiscountPrice'];
}?>
                        <h4><?php echo $objresult['ProductName'];?></h4>
                        <strike><?php echo $objresult['Price'];?> บาท</strike>
                        <h6><?php echo $priceofproduct." บาท";?></h6>
                        <p><?php echo $objresult['ProductDetail'];?></p>
                        <span>7 left on stock</span>
                        <form action="productsent.php" method="get">
                            <label for="quantity">Quantity:</label>
                            <input name="quantity" type="quantity" class="quantity-text" id="quantity"
                                   onfocus="if(this.value == '1') { this.value = ''; }" 
                                   onBlur="if(this.value == '') { this.value = '1';}"
                                   value="1">
                            <input type="submit" class="button" value="Cart!">
                        
                        <div class="down-content">
                            <div class="categories">
                                <h6>Category: <span><a href="#">Pants</a>,<a href="#">Women</a>,<a href="#">Lifestyle</a></span></h6>
                            </div>

                        </div>
                         
                        <div class="cssradio">
                            <h5>
                            <?php $SQL4="SELECT * FROM productdetail WHERE ProductID = $id";
                            $objquery4 = mysqli_query($conn,$SQL4);
                            $old=NULL;
                            ?>
                                <?php 
                                $count=1;
                                $count2=0;
                                while($objresult4=mysqli_fetch_array($objquery4))
                                {
                                if($count2==0)
                                {
                                echo "<br>";
                                echo $objresult4['Type'];
                                $count2++;
                            }             
                                    echo '<input type ="radio" value ='.$objresult4["ProductDetailID"].' name="value" id="radio'.$count.'" />
                                    <label for="radio'.$count.'">'.$objresult4["Value"].'</label>';
                                    $count++;
                                }
                                ?> 
                                   </h5>
                                <input type='hidden' name='id' value=<?php echo $id;?> >
                        </div>
                        </form>


                    </div>


                </div>
            </div>

        </div>

    </div>
    <!-- Single Page Ends Here -->



    <br><br>
    </div>
    <h5>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; Write your review : </h5><br>
    
    <form method="POST" id="comment_form" action="commentsend.php">
    <div class="rating">
        <input type="radio" name="star" id="star1" value=5><label for="star1"></label>
        <input type="radio" name="star" id="star2" value=4><label for="star2"></label>
        <input type="radio" name="star" id="star3" value=3><label for="star3"></label>
        <input type="radio" name="star" id="star4" value=2><label for="star4"></label>
        <input type="radio" name="star" id="star5" value=1><label for="star5"></label>
    </div>
    <br />
    <div class="container">
            <div class="form-group">
                <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
            </div>
            <div class="form-group">
                <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5" ></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="productid" id="comment_id" value=<?php echo $id?> />
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
        </form>
        <span id="comment_message"></span>
        <br />
        <div id="display_comment"></div>
    </div>
    <br>
    <div>



	

<?php $SQLcomment= "SELECT * from reviewproduct WHERE ProductID=$id ORDER BY RAND()LIMIT 5";
    $objectcomment=mysqli_query($conn,$SQLcomment);
    while($querycomment=mysqli_fetch_array($objectcomment)){
        $SQLid = "SELECT * from checkout WHERE OrderID = '".$querycomment['OrderID']."'";
        $queryid =mysqli_query($conn,$SQLid);
        $objectid= mysqli_fetch_array($queryid);
        $SQLname ="SELECT * from user WHERE UserID ='".$objectid['UserID']."'";
        $queryname=mysqli_query($conn,$SQLname);
        $objectname = mysqli_fetch_array($queryname);
        echo "<div class='content-wrap'>
  <div class='comment-item'>
    <div class='comment-item--inner'>
      <div class='is-right'>
        <div class='is-right--inner'>
          <a href='#' class='name'>".$objectname['Username']."</a><b>&emsp;Rating : ".$querycomment['Rating']."</b>
          <div class='the--comment'>
            <p>".$querycomment['Comment']."</p>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
";
 }?>

<br><br><br><br>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="js/custom.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/isotope.js"></script>
    <script src="js/flex-slider.js"></script>


    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) {                   //declaring the array outside of the
            if (!cleared[t.id]) {                      // function makes it static and global
                cleared[t.id] = 1;  // you could use true and false, but that's more typing
                t.value = '';         // with more chance of typos
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