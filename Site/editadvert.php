<?
session_start();
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
	
	if(session_is_registered(myusername) || session_is_registered(adminusername))
	{
	$description = $_POST[$ad];
?>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<a href="index.php"><div class="logo"></div></a>
		<div class="register">
		<form name="input" id="item" action="checkitem.php"  method="post" >
			<table>
			  <tr>
				<td>Description:</td>
				<td><input type= "text" name="description" value="<?$description?>size="25">
			  </tr>
			  <tr>
				<td>Start Date:</td>
				<td><input type= "text" name="startdate" size="25">
			  </tr>
			  <tr>
				<td>Finish Date:</td>
				<td><input type = "text" name="finishdate" size="50">
			  </tr>
			</table>
			<input type="submit" value="Submit" />
		</form>
		</div>
<?
	}
	else
	{}
?>