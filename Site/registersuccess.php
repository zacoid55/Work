<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
<? //JavaScript function to catch error with the email field ?>
function validate(user, email) 
	{
	   var validate = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	   var address = document.forms[user].elements[email].value;
	   if(validate.test(address) == false) 
	   {
		  alert('Invalid Email Address');
		  return false;
	   }
	}
</script>
</head>
<body>
<a href="index.php"><div class="logo"></div></a>
<?
	//Database properties
	$host="localhost";
	$username="zaccyb_admin";
	$password="Strawrats661";
	$dbname="zaccyb_users";
	$tblename="users";
	
	//Database connect
	mysql_connect("$host", "$username", "$password")or die("Cannot connect"); 
	mysql_select_db("$dbname")or die("cannot select DB");
	
	$nusername = $_POST['username'];
	$npassword = $_POST['password'];
	$nvpassword = $_POST['vpassword'];
	$nfirstname = $_POST['firstname'];
	$nsecondname = $_POST['secondname'];
	$ncity = $_POST['city'];
	$nphone = $_POST['phone'];
	$nemail = $_POST['email'];
	$naddressline1 = $_POST['addressline1'];
	$naddressline2 = $_POST['addressline2'];

	
	
	$nusername = stripslashes($nusername);
	$npassword = stripslashes($npassword);
	$nvpassword = stripslashes($nvpassword);
	$nfirstname = stripslashes($nfirstname);
	$nsecondname = stripslashes($nsecondname);
	$ncity = stripslashes($ncity);
	$nphone = stripslashes($nphone);
	$nemail = stripslashes($nemail);
	$naddressline1 = stripslashes($naddressline1);
	$naddressline2 = stripslashes($naddressline2);
	$nusername = mysql_real_escape_string($nusername);
	$npassword = mysql_real_escape_string($npassword);
	$nvpassword = mysql_real_escape_string($nvpassword);
	$nfirstname = mysql_real_escape_string($nfirstname);
	$nsecondname = mysql_real_escape_string($nsecondname);
	$ncity = mysql_real_escape_string($ncity);
	$nphone = mysql_real_escape_string($nphone);
	$nemail = mysql_real_escape_string($nemail);
	$naddressline1 = mysql_real_escape_string($naddressline1);
	$naddressline2 = mysql_real_escape_string($naddressline2);
		
	//Gather username details from database to check there isn't already a username with the same name
	$Vusername= " SELECT * FROM $tblename WHERE username = '$nusername'";
	$userResult = mysql_query($Vusername);
	$count = mysql_num_rows($userResult);
	
	//Flags for error checking
	$bcount = false;
	$bpassword = false;
	$bnull = false;
	$error = "";
		
	//If the username is already taken present this error
	if ($count >= 1)
	{
		echo "<a href=\"index.php\"><div class=\"logo\"></div></a>";
		echo "<div class=\"register\">";
		echo $error .= "<font color=\"#FF0000\"> That username is already taken </br></br></font>"; 
		$bcount = true;
	}
	
	//If the password and verification password didn't match then bring up this error
	else if ($npassword != $nvpassword)
	{
		echo "<a href=\"index.php\"><div class=\"logo\"></div></a>";
		echo "<div class=\"register\">";
		echo $error .= "<font color=\"#FF0000\"> Passwords didn't match </br></br></font>";
		$bpassword = true;
	}
	
	//If either fields are left empty, briong up this error
	else if ($nusername == null || $npassword == null)
	{
		echo "<a href=\"index.php\"><div class=\"logo\"></div></a>";
		echo "<div class=\"register\">";
		echo $error .= "<font color=\"#FF0000\"> Username or password cannot be left empty </br></br></font>";
		$bnull = true;
	}
	
	if($bcount == true || $bpassword == true || $bnull == true)
	{
		?>
			<form id="user" action="registersuccess.php"  method="post" onSubmit="javascript:return validate('user', 'email');">
				<table>
				  <tr>
					<td>First Name:</td>
					<td><input type= "text" name="firstname" size="25"></td>
				  </tr>
				  <tr>
					<td>Last Name:</td>
					<td><input type= "text" name="secondname" size="25"></td>
				  </tr>
				  <tr>
					<td>Address Line 1:</td>
					<td><input type = "text" name="addressline1" size="50"></td>
				  </tr>
				  <tr>
					<td>Address Line 2:</td>
					<td><input type = "text" name="addressline2" size="25"></td>
				  </tr>
				  <tr>
					<td>City:</td>
					<td><input type = "text" name="city" size="25"></td>
				  </tr>
				  <tr>
					<td>Phone:</td>
					<td><input type= "text" name="phone" size="12" maxlength="12"></td>
				  </tr>
				  <tr>
					<td>E-mail:</td>
					<td><input type= "text" id="email" name="email" size="25"></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>Username:</td>
					<td><input type="text" name="username" size="20" maxlength="20" autocomplete="off" ></td>
				  </tr>
				  <tr>
					<td>Password:</td>
					<td><input type="password" name="password"  size="20" maxlength="20" autocomplete="off"></td>
				  </tr>
				  <tr>
					<td>Confirm password:</td>
					<td><input type="password" name="vpassword" size="20" maxlength="20" autocomplete="off"></td>
				  </tr>
				</table>
			<input type="submit" value="Submit" />
		  </form>
		<?
	}
	
	else
	{
		//If everything is correct then post all the data into the corresponding locations within the database
		echo "<div class=\"register\">";
		echo "<div class=\"logo\">";
		$sql="INSERT INTO $tblename(username, password, firstname, secondname, city, phone, email, addressline1, addressline2) 
				VALUES ('$nusername', '$npassword', '$nfirstname', '$nsecondname', '$ncity', '$nphone', '$nemail', '$naddressline1', '$naddressline2')";
		$result = mysql_query($sql);
		echo "<div class=\"register\">";
		echo "<br /> You have successfully been registered";
		echo "</br>";
		echo "<title>Success</title>";
		echo "Click the back button to return to the home page" ;
		echo "<form name=\"continue\" action=\"index.php\" method=\"post\" id=\"continue\" >";        
		echo "<input type=\"submit\" value=\"Back\" />";
		echo "</form>";
		echo "</div>";
	}	
?>
</body>
</html>