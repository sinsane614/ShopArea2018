<!DOCTYPE html>
<?php
session_start();
require_once('driver.php');
if(!isset($_SESSION['UserID']))
{ 
  
  echo"<script> alert('Please login');
    window.location = 'home.php'</script>";
    
  exit();
}
if(isset($_SESSION['UserID']))
{
  if(!isset($_SESSION['Shopname']))
  {

    echo"<script> alert('Not a seller');
    window.location = 'home.php'</script>";
    
  exit();
  }
}
$SQLcart="SELECT * from cart WHERE UserID= '".$_SESSION['UserID']."'";
$querycart = mysqli_query($conn,$SQLcart);
$numcart =mysqli_num_rows($querycart);
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Shop Area</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link href="styleadd.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var rows = 1;
        $("#createRows").click(function(){
                            var tr = "<tr >";
                            tr = tr + "<td width='180px'><input type='text' class='rowdynamic1' name='Type"+rows+"' placeholder='ประเภทใดๆก็ได้เช่นสี หรือ ไซส์+สี' required></td>";
                            tr = tr + "<td width='180px'>      <input type='text' class='rowdynamic1' name='Value"+rows+"' placeholder='ค่าของประเภทที่เลือก เช่นแดง หรือ ไซส์S สีแดง' required></td>";
                            tr = tr + "<td width='180px'><input type='number' class='rowdynamic1' name='quantity"+rows+"' min='1' max='10000' placeholder='จำนวน' required></td>";
                            tr = tr + "</tr>";
                            $('#myTable > tbody:last').append(tr);
                        
                            $('#hdnCount').val(rows);
                            rows = rows + 1;
            });
            $("#deleteRows").click(function(){
                    if ($("#myTable tr").length != 1) {
                         $("#myTable tr:last").remove();
                         rows=rows-1;
                    }
            });
            var rows2 = 1;
            $("#createRows2").click(function(){
                                var tr = "<tr>";
                                tr = tr + "<td width='180px'>      <input type='text' name='deliverytype"+rows2+"' placeholder ='วิธีการส่ง เช่น EMS Kerry หรือ ลงทะเบียน' required></td>";
                                tr = tr + "<td width='180px'><input type='text' name='deliveryprice"+rows2+"' placeholder ='ราคาการจัดส่ง เช่น 30 50' required></td>";
                                tr = tr + "<td width='180px'><input type='text' name='deliverytime"+rows2+"' placeholder ='ระยะเวลาการจัดส่ง เช่น 3-5 วัน' required></td>";
                                tr = tr + "</tr>";
                                $('#myTable2 > tbody:last').append(tr);
                            
                                $('#hdnCount2').val(rows2);
                                rows2 = rows2 + 1;
                });
                $("#deleteRows2").click(function(){
                        if ($("#myTable2 tr").length != 1) {
                             $("#myTable2 tr:last").remove();
                          rows2 =rows2-1;
                        }
                });
        
          
        });
    </script>

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


  /* backgorund*/
/*content grid*/
/*text title*/
/*gird*/
/*press */
/* line */
*, *:before, *:after {
  box-sizing: border-box;
}

body {
  background: #1da1f2;
  font-family: Tamil Sangam MN Bold;
}

.form {
  background: rgba(255, 252, 247, 0.9);
  padding: 40px;
  max-width: 1000px;
  height: 1200px;
  /*Need to change */
  margin: 40px auto;
  border-radius: 10px;
  box-shadow: 0 4px 10px 4px rgba(255, 252, 247, 0.3);
  color: #545151;
}


  body {
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

 .button {
  background-color: #1da1f2;
  border: none;
  color: white;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-top: 0px;
  cursor: pointer;
  border-radius: 8px;
  font-weight: 700;
  position: relative;
  left: 820px;
 
}
.form-style-1 li{
	margin:10px;
}

.rowdynamic1{
	width:100px;
}
.select{
	margin-left:20px;
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
                <a href="#" id="cart" class="fas fa-shopping-cart " style="font-size:20px;color:#1da1f2;"></a><span class='badge badge-warning' id='lblCartCount'> <?php echo $numcart?> </span>&emsp;<a href="login.php" id="login">Login</a> | <a href="regis.php" id="regis">register</a>
                </div>

            </aside>
        </section>
    </nav>
    <br>


  <form enctype="multipart/form-data" action="upload.php" method="post" >

		<div class="form">
      
				  <div>
					  <h1 id="register1">Add Product</h1><br>
				  
				  </div>
            

			 <ul class="form-style-1">
            <input type='hidden' name='shopname' value='<?php echo $_SESSION['UserID'];?>'>
                <li><label> ShopID<span class="required"></span></label><input type="text"  class="field-divided" value="<?php echo $_SESSION['UserID'];?>"disabled/><br>
                <li>
                    <label>Productname <span class="required" >*</span></label> 
                    <input type="text" name="productname" class="field-divided" placeholder="ชื่อสินค้า" required/> <br><br>
                    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple" required>
                </li>
                <li><label>Category <span class="required" required>*</span></label></li>
                &nbsp; <select name="Category">
                    <option value="">Select</option>
                    <option value="1">Beauty & Fitness</option>
                    <option value="2">Electronics</option>
                    <option value="3">Fashions</option>
                    <option value="4">Mom & Babies</option>
                    <option value="5">Home & Auto</option>
                </select>
                <li>
                    <label>Price <span class="required">*</span></label>
                    <input type="number" min="0" name="price" class="field-divided" placeholder="กรอกราคา" required/>
                </li>
                <li><label>Discount Type</label></li>
                &nbsp; <select name="DiscountType">
                    <option value="">Select</option>
                    <option value="1">%</option>
                    <option value="2">Baht</option>
                </select>
                <li>
                    <label>Discount </label>
                    <input type="number" min="0" name="discount" class="field-divided" placeholder="ค่าที่ต้องการจะลด" required/>
                </li> 
                <li>
                    <label>Detail<span class="required">*</span></label>
                    <textarea name="ProductDetail" class="field-long field-textarea" placeholder="รายละเอียดของสินค้า"></textarea>
                </li>

                <li>
                    <label>Type </label>
                    
                    Value : 
                    <table style="width:100%" border="1" id="myTable" class="table1">
                        <!-- head table -->
                        <thead>
                          <tr>
                            <td > <div align="center">Type </div></td>
                            <td> <div align="center">Value </div></td>
                            <td > <div align="center">Quantity </div></td>
                          </tr>
                        </thead>
                        <!-- body dynamic rows -->
                        <tbody style="width:100%"></tbody>
                        </table>
						<input type="button" id="createRows" value="Add"> <input type="button" id="deleteRows" value="Del">

						<br><br>
                    
                
                    Delivery Type :  
                    <br>
                    <table style="width:25%" border="1" id="myTable2"  class="table1">
                        <!-- head table -->
                        <thead>
                          <tr>
                            <td > <div align="center">Type </div></td>
                            <td > <div align="center">Price </div></td>
                            <td > <div align="center">Time </div></td>
                          </tr>
                        </thead>
                        <!-- body dynamic rows -->
                        <tbody style="width:100%"></tbody>
                        </table>
					<input type="button" id="createRows2" value="Add"> <input type="button" id="deleteRows2" value="Del">
                    <div id="delivery">
                    
            </div>
                </li>
                <br><br>
                <input type="hidden" id="hdnCount" name="hdnCount">
                <input type="hidden" id="hdnCount2" name="hdnCount2">
                    
               	<input type="submit" value="Submit" class="button"/>


            </ul>
			
		</div>
       



    </div>
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