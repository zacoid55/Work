<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="index.php"><div class="logo"></div></a>
<link rel="stylesheet" type="text/css" href="style.css" />
        <?//Login form for admins, seperate from normal?>
		<div class="adminlogin">
			<form name="adminlogin" action="checklogin.php" method="post" id="admin" >
				Admin Username:  <input type="text" name="adminusername" autocomplete="off"/> 
				Admin Password:   <input type="password" name="adminpassword" autocomplete="off" />           
				<input type="submit" value="Submit" /> </ br>
			</form> 
		</div>
</body>
</html>