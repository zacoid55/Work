<?
	session_start();
	if(session_is_registered(myusername))
	{
		
		?>
		<div class="login">
			<? echo "Hello ".$_SESSION['myusername']."</br></br>"; ?>
			<form name="logout" action="logout.php" method="post" id="logout" >          
				 <input type="submit" value="Logout" />
			</form>
		</div>	
		<?
		
	}
	else if(session_is_registered(adminusername))
	{
		
		?>
		<div class="login">
			<? echo "Hello ".$_SESSION['adminusername']."</br></br>";
			   echo "You are an admin"; ?>
			<form name="logout" action="logout.php" method="post" id="logout" >          
				 <input type="submit" value="Logout" />
			</form>
		</div>	
		<?
		
	}
	else
	{
	?>
		<div class="login">
			Hello, guest <a href="adminlogin.php">Admin</a></br>
			<form name="memberlogin" action="checklogin.php" method="post" id="user" autocomplete="off" >
				Username:  <input type="text" name="myusername" autocomplete="off" /> 
				Password:   <input type="password" name="mypassword" />           
				<input type="submit" value="Submit" /> </ br>
			</form>
			<form name="register" action="register.php" method="post" id="register" >          
				<input type="submit" value="Register" />
			</form>  
		</div>		
	<?
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<a href="index.php"><div class="logo"></div></a>
</body>
</html>