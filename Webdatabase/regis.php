<?php session_start();

require_once('driver.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Shop Area</title>

    <script language="javascript">
    function CheckForm() {
        if (register.email.value == '') {
            alert('Please complete the information.')
            register.email.focus()
            return false
        } else if (register.username.value = '') {
            alert('Please complete the information.')
            register.username.focus()
            return false
        } else if (register.Password.value = '') {
            alert('Please complete the information.')
            register.Password.focus()
            return false
        } else if (register.FirstName.value = '') {
            alert('Please complete the information.')
            register.FirstName.focus()
            return false
        } else if (register.Lastname.value = '') {
            alert('Please complete the information.')
            register.Lastname.focus()
            return false
        } else if (register.Tel.value = '') {
            alert('Please complete the information.')
            register.Tel.focus()
            return false
        } else if (register.Address.value = '') {
            alert('Please complete the information.')
            register.Address.focus()
            return false
        } else if (register.Country.value = '') {
            alert('Please complete the information.')
            register.Country.focus()
            return false
        }

    }
    </script>

</head>

<body>
    <form name="regis" method="post" action="regisphp.php" onsubmit="return CheckForm ()">

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-left">Shop Area</h1>
                    <p class="text-left">ที่สุดแห่งการช้อปปิ้งออนไลน์ ซื้อสินค้าหรือเปิดร้านค้าออนไลน์
                        พร้อมสินค้าขายดีมากมายเช่นเสื้อผ้าแฟชั่น เครื่องประดับและอื่นๆ กับเว็บ e-commerce อันดับ 1
                        ในประเทศไทย.</p>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-left" style="color:white">Registration Form</h3>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <label class="label col-md-2-control-label">E-mail&nbsp;*</label><br>
                        <div class="col-md-10">
                            <input type="Email" class="form-control" name="Email" placeholder="E-mail">
                        </div>

                    </div>

                    <div class="row">
                        <br> <label class="label col-md-2-control-label">Username&nbsp;*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="Username" placeholder="Username">
                        </div>

                    </div>

                    <div class="row">
                        <br> <label class="label col-md-2-control-label">Password&nbsp;*</label>
                        <div class="col-md-10">
                            <input type="Password" class="form-control" name="Pass" placeholder="Password">
                        </div>

                    </div>

                    <div class="row">
                        <br> <label class="label col-md-2-control-label">FirstName&nbsp;*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="FirstName" placeholder="FirstName">

                        </div>

                    </div>

                    <div class="row">
                        <br> <label class="label col-md-2-control-label">Lastname&nbsp;*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="Lastname" placeholder="Lastname">

                        </div>

                    </div>

                    <div class="row">
                        <br>
                        <label class="label col-md-2-control-label">Date of Birth&nbsp;*</label>
                        <input type="date"  name = "DOB" class="form-control" id="exampleInputDOB1" placeholder="Date of Birth">

                    </div>



                    <div class="row">
                        <br> <label class="label col-md-2-control-label">Tel&nbsp;*</label><br>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="Tel" placeholder="Tel">

                        </div>

                    </div>

                    <div class="row">
                        <label class="label col-md-2-control-label">Address&nbsp;*</label><br>
                        <div class="col-md-10">
                            <textarea class="form-control" name="Address"></textarea>

                        </div>

                    </div>

                    <div class="row">
                        <br> <label class="label col-md-2-control-label">Gender&nbsp;*</label><br>
                        <div class="col-md-10">

                            <input type="radio" name="Gender" value="Male"><small>Male</small>
                            <input type="radio" name="Gender" value="Female"><small>Female</small>
                            <input type="radio" name="Gender" value="Undefined"><small>Undefined</small>

                        </div>

                    </div>
                    <div class="row">
                        <br><label for="country" class="label col-md-2-control-label">Country&nbsp;*</label>

                        <div class="col-md-10">

                            <?php $sql_country="SELECT * FROM country ORDER BY CountryID ASC";
		          $qry_country=mysqli_query($conn,$sql_country);?>
                            <select name="country" class="form-control" name="pro_mn_id" id="pro_mn_id">
                                <option value="">------Select Country------</option>
                                <?php
                                    while($result_country=mysqli_fetch_array($qry_country,MYSQLI_ASSOC)){
	                            ?>
                                <option name="country" value="<?=$result_country['CountryID'];?>">
                                    <?=$result_country['Countryname'];?>
                                </option>
                                <?php ;}?>
                            </select>

                        </div>


                    </div>

                    <div class="row">
                        <br> <label class="label col-md-2-control-label">News&nbsp;*</label><br>
                        <div class="col-md-10">
                            <input type="radio" name="News" value="1"><small>Yes</small>
                            <input type="radio" name="News" value="0"><small>No</small>
                        </div>

                    </div>

                    <br>
                    <a href="#">
                        <input type='submit' class="btn btn-info" name="1" value="send">
                    </a>
                    <a  href="javascript:history.back(-1)">
                        <div class="btn btn-warning">Cancle</div>
                    </a>
                    <input type="reset" name="1" value="reset" class="btn btn-sm btn-success">
                </div>
            </div>




        </div>
    </form>
</body>

</html>