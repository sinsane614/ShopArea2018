<?php
session_start();
 date_default_timezone_set('Asia/Bangkok');
require_once('driver.php');
if(isset($_SESSION['EmployeeID']))
{ if(($_SESSION["PositionID"]!="7") && ($_SESSION["PositionID"]!="1"))
    {
    echo"<script> alert('No permission');
    window.location = 'staffhome.php'</script>";
    exit();
    }
    else{}
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="styleadd.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <title>Add Promotion</title>
    <link href="css/report.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var rows = 1;
        $("#createRows").click(function(){
                            var tr = "<tr >";
                            tr = tr + "<td width='180px'><input type='text' class='rowdynamic1' name='Type"+rows+"' placeholder='ประเภทใดๆก็ได้เช่นสี หรือ ไซส์+สี' required></td>";
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
    }
    </script>
    
    
</head>
<body>
    <nav>
        <p>Shop Area</p>
        <section class="nav-container">
            <aside class="menu">
                <div class="menu-container">
                    <a href="loginstaff.php"  id="login">Login</a>
                </div>

            </aside>
        </section>
    </nav>





    <div class="container">
        <div class="info">
            <h1>Add Promotion</h1>
        </div>
    </div>



        <div class="form">
    
            
            <form enctype="multipart/form-data" class="login-form" name="form1" method='POST' action='addpromosend.php' >
            PromoPicture
            <input type="file" class="custom-file-input" name="fileToUpload[]" id="fileToUpload" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
            Promo Coded
            <input type='text' name='Promocode' placeholder="Pxxxxxxx">
            Discount
            <input type='number' min="0" name='Discount' placeholder="(baht)" required>
        

				<label>Promotion Detail  </label>
				
                <input type='hidden' name='uid' value='Anonymous'>
                <input type='hidden' name='AddpromotionDate' value='<?php echo date('Y-m-d') ?>'>
                <input type='hidden' name='AddpromotionTime' value='<?php echo date('H:i:sa') ?>'>
				<textarea name='Promodetail'rows="5" cols="37"></textarea><br><br>
                
                  <div class="mb-3">
                    <label for="exampleInputDOB1">Start Time&nbsp;</label>
                    <input type="date" class="form-control" name="Starttime" id="exampleInputDOB1" placeholder="Date of Birth" value="<?php echo $objResult["DOB"];?>" required>
                  </div>
                
                 <div class="mb-3">
                    <label for="exampleInputDOB1">End Time&nbsp;</label>
                    <input type="date" class="form-control" name="Endtime" id="exampleInputDOB1" placeholder="Date of Birth" value="<?php echo $objResult["DOB"];?>" required>
                  </div>
				
                
               Minimumbalance
                
                <input type='number' min="0" name='Minimumbalance' placeholder="(baht) "required><br>
                PromotionCategory
                <select name="Category">
                    <option value="">Select</option>
                    <option value="1">Beauty & Fitness</option>
                    <option value="2">Electronics</option>
                    <option value="3">Fashions</option>
                    <option value="4">Mom & Babies</option>
                    <option value="5">Home & Auto</option>
                </select>
                <button type='submit' name='commentSubmit'>Submit</button>

            </form>
        </div>    
</body>


<input type="button" id="createRows" value="Add"> <input type="button" id="deleteRows" value="Del">
</html>

<?php
if(isset($_SESSION["EmployeeID"]))
{   
    echo '<script>';
    echo 'document.getElementById("login").innerHTML= "Welcome '.$_SESSION["Username"].'";';
    echo 'document.getElementById("login").href= "staffhome.php";';
    echo 'document.getElementById("regis").innerHTML= "logout";';
    echo 'document.getElementById("regis").href= "logoutstaff.php";';
    echo '</script>'; 
}
?>

