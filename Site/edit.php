<?
session_start();

	//Options for a normal user
	if(session_is_registered(myusername))
	{	
		?>
		<div class="login">
			<? echo "Hello ".$_SESSION['myusername']; ?><a href="edit.php">Edit</a><a href="newitem.php">New Advert</a></br></br>
			<form name="logout" action="logout.php" method="post" id="logout" >          
				 <input type="submit" value="Logout" />
			</form>
		</div>	
		<?
		
	}
	
	//Options for an admin
	else if(session_is_registered(adminusername))
	{
		
		?>
		<div class="login">
			<? 
			   echo "Hello ".$_SESSION['adminusername']."</br></br>";
			   echo "You are an admin"; 
			?>
			<a href="admin.php">Users</a><a href="newitem.php">New Advert</a>
			<form name="logout" action="logout.php" method="post" id="logout" >          
				 <input type="submit" value="Logout" />
			</form>
		</div>	
		<?	
	}
	
	//Database properties
	$host = "localhost";
	$username = "zaccyb_admin";
	$password = "Strawrats661";
	$dbname = "zaccyb_users";
	$tblename = "users";
	$admintble = "admin";
	
	//Database connect
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$dbname")or die("cannot select DB");
	
	//If a user is logged in, get all of their information from the database and put it up for them to edit
	if(session_is_registered(myusername))
	{
		$myusername = $_SESSION['myusername'];
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
		$nsecondname = mysql_real_escape_string($nsecondName);
		$ncity = mysql_real_escape_string($ncity);
		$nphone = mysql_real_escape_string($nphone);
		$nemail = mysql_real_escape_string($nemail);
		$naddressline1 = mysql_real_escape_string($naddressline1);
		$naddressline2 = mysql_real_escape_string($naddressline2);
		
		//SQL command to select all from one user
		$sql = sprintf("SELECT firstname, secondname, city, phone, email, addressline1, addressline2 FROM $tblename WHERE username = '%s'",
			mysql_real_escape_string($myusername));
		$result = mysql_query($sql);
		
		
		//error reporting if the query doesn't work
		if (!$result) 
		{
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $sql;
			die($message);
		}		
		$row = mysql_fetch_row($result);
		
?>
		<div class="login">
<? 			echo "Hello ".$_SESSION['myusername']."</br></br>";  ?>			
			<div class="adminlink">Edit</div></br>
			<form name="logout" action="logout.php" method="post" id="logout" >          
				 <input type="submit" value="Logout" />
			</form>
		</div>	
		<div class="register">
			<form id="user" action="edit.php"  method="post" onSubmit="javascript:return validate('user', 'email');">
				<table>
				  <tr>
					<td>First Name:</td>
					<td><input type= "text" name="firstname" value = "<?echo $row[0];?>" size="25"></td>
				  </tr>
				  <tr>
					<td>Last Name:</td>
					<td></td>
				  </tr>
				  <tr>
					<td>Address Line 1:</td>
					<td><input type = "text" name="addressline1" value = "<?echo $row[5];?>" size="50"> </td>
				  </tr>
				  <tr>
					<td>Address Line 2:</td>
					<td><input type = "text" name="addressline2" value = "<?echo $row[6];?>" size="25"> </td>
				  </tr>
				  <tr>
					<td>City:</td>
					<td><input type = "text" name="city" value = "<?echo $row[2];?>" size="25"> </td>
				  </tr>
				  <tr>
					<td>Phone:</td>
					<td><input type= "text" name="phone" value = "<?echo $row[3];?>" size="12" maxlength="12"> </td>
				  </tr>
				  <tr>
					<td>E-mail:</td>
					<td><input type= "text" id="email" value = "<?echo $row[4];?>" name="email" size="25"> </td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>Password:</td>
					<td><input type="password" name="password"  size="20" maxlength="20" autocomplete="off">
				  </tr>
				  <tr>
					<td>Confirm password:</td>
					<td><input type="password" name="vpassword" size="20" maxlength="20" autocomplete="off">
				  </tr>
				</table>
			<input type="submit" value="Submit" />
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
</body>
</html>