<html>
<head>
    <title>ShopArea</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/login2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
    <div class="container">
        <div class="info">
            <h1>Shop Area</h1>
            <h2>Staff Login</h2>
        </div>
    </div>


    <div class="form">
        <div class="thumbnail"><label for="username">
					<i class="fas fa-user fa-5x"></i>
				</label></div>
      
        <form class="login-form" name="form1" method="post" action="checkloginstaff.php">
            <input name="txtUsername" type="text" id="txtUsername" placeholder="username">
            <input name="txtPassword" type="password" id="txtPassword" placeholder="password">

            <button type="submit" name="Submit" value="Login"">login</button>

            <p class="message">&emsp;&emsp;&emsp;Not registered? <a href="regis.php">Create an account</a></p>
        </form>



    </div>

</body>
</html>