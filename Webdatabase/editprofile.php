<?php session_start();

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

$objQuery = mysqli_query($conn, "SELECT * FROM user WHERE UserID='".$_SESSION['UserID']."'");
$objResult = mysqli_fetch_array($objQuery);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/form-validation.css" rel="stylesheet">
    <link href="dist/css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Shop Area</title>
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

  <body class="bg-light">

    <header>
    <div class="nav1">
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
      </div>
    </header>

    <div class="container" style="margin-top: 60px;">

      <div class="row">
        <div class="col-md-4 order-md-1 mb-4">
          <div class="text-center">
           
          <img src="<?php $SQL="SELECT * FROM user WHERE Userid='".$_SESSION['UserID']."'";
                $querypic = mysqli_query($conn,$SQL);
                $objpic=mysqli_fetch_array($querypic);
                if(isset($objpic['ProfilePicture'])){
                  echo $objpic['ProfilePicture'];
                }

              ?>
            " class="avatar img-circle img-thumbnail" alt="avatar">
         <h6>Upload a different photo...</h6>
            <form enctype="multipart/form-data" action="sendphoto.php" method="post">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="submit" value="Upload Image" name="submit">
              </div>
            </form>
          </div>
          
        </div>

        <div class="col-md-8 order-md-2">

          <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#seller">Seller</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="profile" class="container tab-pane active"><br>
                <h4 class="mb-3">Edit Profile</h4>
                <form class="needs-validation" name = "editprofile" method="post" action="editprofilephp.php" onsubmit ="return CheckForm()" onkeydown="return event.key != 'Enter';" novalidate>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name<span class="text-muted"> (ชื่อจริง)</span></label>
                      <input type="text" class="form-control" id="firstName" name="FirstName" placeholder="" value="<?php echo $objResult["Fname"];?>" required>
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name<span class="text-muted"> (นามสกุล)</span></label>
                      <input type="text" class="form-control" id="lastName" name="Lastname" placeholder="" value="<?php echo $objResult["Lname"];?>" required>
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="username">Username&nbsp;*</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" id="username" name="Username" placeholder="Username" value="<?php echo $objResult["Username"];?>" disabled>
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="password">Password&nbsp;*<span class="text-muted"> (รหัสผ่าน)</span></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="password" class="form-control" id="password" name="Pass" placeholder="password" value="<?php echo $objResult["Pass"];?>" required>
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="email">Email&nbsp;*<span class="text-muted"> (อีเมล์)</span></label>
                    <input type="email" class="form-control" id="email" name="Email" placeholder="you@example.com" value="<?php echo $objResult["Email"];?>" required>
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
                  
                  <?php
                     $sql = "SELECT * FROM addressuser LEFT JOIN country ON addressuser.CountryID = country.CountryID WHERE UserID='".$_SESSION["UserID"]."' AND AddressDefault='1'";
                     $sql_address=mysqli_query($conn, $sql);
                     $row_address=mysqli_fetch_assoc($sql_address);
                  ?>
                  <div class="mb-3">
                    <label for="address">Address&nbsp;*<span class="text-muted"> (ที่อยู่)&emsp;&nbsp;&nbsp;<a href="addressalluser.php">Another Address</a></span></label>
                    <input type="text" class="form-control" name="Address" id="address" placeholder="1234 Main St" value="<?php echo $row_address["Address"];?>" required>
                    <div class="invalid-feedback">
                      Please enter your address.
                    </div>
                  </div>


                  <div class="mb-3">
                    <label for="exampleInputDOB1">Date of Birth&nbsp;*<span class="text-muted"> (วันเกิด)</span></label>
                    <input type="date" class="form-control" name="DOB" id="exampleInputDOB1" placeholder="Date of Birth" value="<?php echo $objResult["DOB"];?>" required>
                    <div class="invalid-feedback">
                      Please enter your Date of Birth.
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="tel">Tel&nbsp;*</label>
                      <input type="text" class="form-control" id="tel" name="Tel" placeholder="Tel" value="<?php echo $objResult["Tel"];?>" required>
                      <div class="invalid-feedback">
                        Please enter your phone number.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="country">Country&nbsp;*</label>
                      <?php $sql_country="SELECT * FROM country ORDER BY CountryID ASC";
                      $qry_country=mysqli_query($conn,$sql_country);?>
                      
                        <select class="form-control" name="Country" id="country" required>
                          <option value="<?php echo $row_address["CountryID"];?>"><?php echo $row_address["Countryname"];?> </option>
                             <?php
                               while($result_country=mysqli_fetch_array($qry_country,MYSQLI_ASSOC)){
	                           ?>
                         <option name="Country" value="<?=$result_country['CountryID'];?>">
                              <?=$result_country['Countryname'];?>
                         </option>
                             <?php ;}?>
                       </select>
                      <div class="invalid-feedback">
                        Please select a valid country.
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label class="label col-md-2-control-label">Gender&nbsp;*</label>
                      <div class="col-md-10">
                        <?php 
                          $Gender = $objResult["Gender"];
                        ?>
                        <input type="radio" name="Gender" value="M" <?php if($Gender == "M"){echo 'checked';}?>><small>Male</small>
                        <input type="radio" name="Gender" value="F" <?php if($Gender == "F"){echo 'checked';}?>><small>Female</small>
                        <input type="radio" name="Gender" value="U" <?php if($Gender == "U"){echo 'checked';}?>><small>Undefined</small> 
                      </div>
                    <label for="news">News&nbsp;*</label>
                    <div class="label col-md-2-control-label">
                    <?php 
                    $News = $objResult["News"];
                    ?>&nbsp;&nbsp;
                      <input type="radio" name="News" id="news" value="1" <?php if($News == "1"){echo 'checked';}?>><small>Yes</small>
                      <input type="radio" name="News" id="news" value="0" <?php if($News == "0"){echo 'checked';}?>><small>No</small>
                    </div>
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
                  </div>
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to submit</button>
                </form>
              </div>
              <div id="seller" class="container tab-pane fade"><br>
                <h4 class="mb-3">Seller</h4>
                <form class="needs-validation" name = "editseller" method="post" action="editprofileseller.php" onsubmit ="return CheckForm()" onkeydown="return event.key != 'Enter';" novalidate>

                  <div class="mb-3">
                    <label for="IdCard">IDCard&nbsp;*<span class="text-muted"> (รหัสบัตรประชาชน 13 หลัก)</span></label>
                    <input type="number" class="form-control" name="IdCard" id="IdCard" placeholder="1234567890123" value="<?php echo $objResult["IdCard"];?>" required>
                    <div class="invalid-feedback">
                      Please enter your IDCard.
                    </div>
                  </div>  

                  <div class="mb-3">
                    <label for="Banking">Banking&nbsp;*<span class="text-muted"> (เลขบัญชีธนาคาร)</span></label>
                    <input type="text" class="form-control" name="Banking" id="Banking" placeholder="xxxxxxxxxx" value="<?php echo $objResult["Banking"];?>" required>
                    <div class="invalid-feedback">
                      Please enter your banking.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="Shopname">Shopname&nbsp;*<span class="text-muted"> (ชื่อร้านค้า)</span></label>
                    <input type="text" class="form-control" name="Shopname" id="Shopname" placeholder="everything shop" value="<?php echo $objResult["Shopname"];?>" required>
                  </div>

                  <div class="mb-3">
                    <label for="Shopdetail">Shopdetail<span class="text-muted"> (รายละเอียดสินค้า)</span></label>
                    <input type="text" class="form-control" name="Shopdetail" id="Shopdetail" placeholder="รายละเอียดสินค้า" value="<?php echo $objResult["Shopdetail"];?>" required>
                  </div>

                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to submit</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="dist/js/jquery-slim.min.js"><\/script>')</script>
    <script src="dist/js/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
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