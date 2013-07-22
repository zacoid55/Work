<?
	session_start();
	//Database properties 
	$host = "localhost";
	$username = "zaccyb_admin";
	$password = "Strawrats661";
	$dbname = "zaccyb_users";
	$tblename = "users";
	$admintble = "admin";
	
	//Database connection
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$dbname")or die("cannot select DB");
	
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword'];
	$adminusername=$_POST['adminusername'];
	$adminpassword=$_POST['adminpassword'];
	$error = "";
	$myusernamecheck = false;
	$usercheck = false;
	
	//Mysql security on variables
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$adminusername = stripslashes($adminusername);
	$adminpassword = stripslashes($adminpassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$adminusername = mysql_real_escape_string($adminusername);
	$adminpassword = mysql_real_escape_string($adminpassword);
	
	//Mysql commands to the databse to select information where needed to confirm password and multiple usernames
	$sql = "SELECT * FROM $tblename WHERE username = '$myusername' and password = '$mypassword'";
	$adminsql = "SELECT * FROM $admintble WHERE adminusername = '$adminusername' and adminpassword = '$adminpassword'";
	$idsql = "SELECT * FROM $tblename WHERE users.id = '$myusername'";
	$result = mysql_query($sql);
	$secondresult = mysql_query($adminsql);
	$count = mysql_num_rows($result);
	$secondcount = mysql_num_rows($secondresult);
	echo "<a href=\"index.php\"><div class=\"logo\"></div></a>";
	
	//If a username in the normal table exists, register the session
	if($count == 1)
	{
		$_SESSION['myusername'] = $myusername;
		$_SESSION['mypassword'] = $mypassword;
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
		echo "<div class=\"register\">";
		echo "<br /> Login Successful";
		echo "</br>";
		echo "<title>Success</title>";
		echo "Click the back button to return to the home page" ;
		echo "<form name=\"continue\" action=\"index.php\" method=\"post\" id=\"continue\" >";        
		echo "<input type=\"submit\" value=\"Back\" />";
		echo "</form>";
		echo "</div>";
		$myusernamecheck = true;
	}
	
	//If a username in the admin table exists, register the session
	else if ($secondcount == 1)
	{
		$_SESSION['adminusername'] = $adminusername;
		$_SESSION['adminpassword'] = $adminpassword;
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
		echo "<div class=\"register\">";
		echo "<br /> Login Successful";
		echo "</br>";
		echo "<title>Success</title>";
		echo "Click the back button to return to the home page" ;
		echo "<form name=\"continue\" action=\"index.php\" method=\"post\" id=\"continue\" >";        
		echo "<input type=\"submit\" value=\"Back\" />";
		echo "</form>";
		echo "</div>";
		$myusernamecheck = true;
	}
	
	//Error reporting for multiple usernames
	else if ($myusernamecheck == false && $count == 0 && $secondcount == 0)
	{
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
		echo "<div class=\"login\">";
		echo $error .= "<font color=\"#FF0000\"> Username not found </br></br></font>";
		?>  
			Hello, guest </br>
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
	
	// Error reporting for null values in the password or username field
	if ($myusername || $mypassword)
	{
		$usercheck = true;
	}
	if ($usercheck = true)
	{
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
		echo "<div class=\"login\">";
		echo $error .= "<font color=\"#FF0000\"> Username or password cannot be left empty </br></br></font>";
		?>  
			Hello, guest </br>
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
		$myusernamecheck = false;
		echo $error = "";
	}
?>