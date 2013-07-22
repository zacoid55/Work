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
    <div class="register">
	<form name="input" id="user" action="registersuccess.php"  method="post" onSubmit="javascript: return validate('user', 'email');">
		    <table>
			  <tr>
				<td>First Name:</td>
				<td><input type= "text" name="firstname" size="25">
			  </tr>
			  <tr>
				<td>Last Name:</td>
				<td><input type= "text" name="secondname" size="25">
			  </tr>
			  <tr>
				<td>Address Line 1:</td>
				<td><input type = "text" name="addressline1" size="50">
			  </tr>
			  <tr>
				<td>Address Line 2:</td>
				<td><input type = "text" name="addressline2" size="25">
			  </tr>
			  <tr>
				<td>City:</td>
				<td><input type = "text" name="city" size="25">
			  </tr>
			  <tr>
				<td>Phone:</td>
				<td><input type= "text" name="phone" size="25" maxlength="25">
			  </tr>
			  <tr>
				<td>E-mail:</td>
				<td><input type= "text" name="email" id="email" size="40">
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>Username:</td>
				<td><input type="text" name="username" size="20" maxlength="20" autocomplete="off" >
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

</body>
</html>