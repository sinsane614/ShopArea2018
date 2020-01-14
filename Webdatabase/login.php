<html>
<head>
    <title>ShopArea</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/login2.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <section class="nav-container">
            <aside class="menu">
                <div class="menu-container">
                    <a href="login.php">Login</a> | <a href="regis.php">Register</a>
                </div>

            </aside>
        </section>




    <div class="container">
        <div class="info">
            <h1>Shop Area Login</h1>
        </div>
    </div>


    <div class="form">
        <div class="thumbnail"><label for="username">
					<i class="fas fa-user fa-5x"></i>
				</label></div>
      
        <form class="login-form" name="form1" method="post" action="checklogin.php">
            <input name="txtUsername" type="text" id="txtUsername" placeholder="username">
            <input name="txtPassword" type="password" id="txtPassword" placeholder="password">

            <button type="submit" name="Submit" value="Login"">login</button>

            <p class="message">&emsp;&emsp;&emsp;Not registered? <a href="regis.php">Create an account</a></p>
        </form>



    </div>

    </nav>
</body>
</html>