<?
session_start();

	$host = "localhost";
	$username = "zaccyb_admin";
	$password = "Strawrats661";
	$dbname = "zaccyb_users";
	$tblename = "users";
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$dbname")or die("cannot select DB");
	
    if(session_is_registered(adminusername))
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
		echo "<div class=\"register\">";
		echo "<table border = \"1\">";
	

		$sql = "SELECT username FROM $tblename";
		$result = mysql_query($sql);
		$deletesql = "DELETE FROM $tblename WHERE username = $row";
		while ($row = mysql_fetch_assoc($result)) 
		{
			for($i = 1; $i == 1; $i++)
			{	
				echo"<tr>";
				echo"<td>";
				echo $row['username'];
				echo "</td>";
				?>
				<td>
					<form name="delete user" action="<? mysql_query($deletesql);?>" method="post" id="admin" >
						<input type="submit" value="Delete" />
					</form>
				</td>
				<?
				echo"</tr>";
			}
		}
		echo "</table>";
		echo "</div>";
	}
	else
	{
		echo "<div class=\"register\">";
		echo "YOU ARE NOT AN ADMIN";
		echo "</div>";
	}
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="index.php"><div class="logo"></div></a>

</body>
</html>