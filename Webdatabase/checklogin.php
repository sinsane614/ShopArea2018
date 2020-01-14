<?php
	session_start();
	$conn =mysqli_connect('localhost','root','','project');
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
	$strSQL = "SELECT * FROM user WHERE Username = '".$_POST['txtUsername']."' 
	and Pass = '".$_POST['txtPassword']."'";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		$strSQL = "SELECT * FROM employee WHERE SUsername = '".$_POST['txtUsername']."' 
	and SPassword = '".$_POST['txtPassword']."'";
	$objQuery = mysqli_query($conn,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    if(!$objResult)
	{
		echo "<script>alert('Wrong Username or Password');
		window.location = 'login.php';
		</script>"	;	
		exit();
	}
	else
	{
			$_SESSION["EmployeeID"] = $objResult["EmployeeID"];
            $_SESSION["Username"] = $objResult["SUsername"];
            $_SESSION["PositionID"] = $objResult["PositionID"];
            
            session_write_close();
			if(isset($objResult["EmployeeID"]))
			{
				header("location:staffhome.php");
			}
			
	}
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Username"] = $objResult["Username"];
			$_SESSION['Shopname'] = $objResult['Shopname'];
			session_write_close();
			if(isset($objResult["UserID"]))
			{
				header("location:home.php");
			}
			
	}
	mysql_close();
?>