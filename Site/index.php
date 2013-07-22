<?
	session_start();
	
	//Options for a normal user
	if(session_is_registered(myusername))
	{
		
		?>
		<div class="login">
			<? echo "Hello ".$_SESSION['myusername']; ?> &nbsp <a href="edit.php">Edit</a> &nbsp <a href="newitem.php">New Advert</a></br></br>
			<form name="logout" action="logout.php" method="post" id="logout" >          
				 <input type="submit" value="Logout" />
			</form>
		</div>	
		<?
		
	}
	
	//Options for admin
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
	
	//Normal login form if not logged in
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
	
	$host="localhost";
	$username="zaccyb_admin";
	$password="Strawrats661";
	$dbname="zaccyb_users";
	$tblename="users";
	$adverttable="items";
	
	mysql_connect("$host", "$username", "$password")or die("Cannot connect"); 
	mysql_select_db("$dbname")or die("cannot select DB");	
	$nusername = $_SESSION['myusername'];
	echo "<div class = \"register\">";
	$result= mysql_query("SELECT * FROM items");
	
	//Script for selecting adverts from database and displaying them using array values
	while ($row = mysql_fetch_assoc($result)) 
	{
		echo "<div align = \"center\" id = \"items\" style = \"border: 1px solid red\" >";
		echo "<form> Author: ".$row['Author']."</form>";
		echo "<form> Description: ".$row['Description']."</form>";
		echo "<form> Start Date: ".$row['sDay']." ".$row['sMonth']." ".$row['sYear']."</form>";
		echo "<form> Final Date: ".$row['fDay']." ".$row['fMonth']." ".$row['fYear']."</form>";
		echo "<form> Contact: ".$row['Email']."</form>";	
		echo "</div>";
		echo "<br><br>";
	}
	echo "</div>";
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