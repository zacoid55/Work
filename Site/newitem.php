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
	
	//Present logged in users with the new item form
	if(session_is_registered(myusername) || session_is_registered(adminusername))
	{
?>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<a href="index.php"><div class="logo"></div></a>
		<div class="register">
		<form name="elements" id="itemele" action="checkitem.php"  method="post" >
			<table>
			  <tr>
				<td>Description:</td>
				<td><textarea name="description" rows="4" cols="30"></textarea></td>
			  </tr>
			  <tr>
				<td>Start Date:</td>
				<td>			
					<select name="sday">
						<?
							//Get todays date and 10 days ahead of today's date
							$ahead=10;
							for($i=0; $i<$ahead; $i++)
							{
								$theday=date('d', strtotime("+$i Days"));
								echo "<option name =\"$theday\" value=\"$theday\">$theday</option>";
							}
						?>
					</select>
					<select name="smonth">
						<?
							//Get the current month and 10 months ahead of time
							for($i=0; $i<$ahead; $i++)
							{
								$themonth=date('M', strtotime("+$i Months"));
								echo "<option name =\"$themonth\" value=\"$themonth\">$themonth</option>";
							}
						?>
					</select>
					<select name="syear">
						<?
							//Get the current year and 10 years ahead of time
							for($i=0; $i<$ahead; $i++)
							{
								$theyear=date('Y', strtotime("+$i Years"));
								echo "<option name =\"$theyear\" value=\"$theyear\">$theyear</option>";
							}
						?>
					</select>
				</td>
			  </tr>
			  <tr>
				<td>Finish Date:</td>
				<td>			
					<select name="fday">
						<?
							$ahead=10;
							for($i=0; $i<$ahead; $i++)
							{
								$theday=date('d', strtotime("+$i Days"));
								echo "<option name =\"$theday\" value=\"$theday\">$theday</option>";
							}
						?>
					</select>
					<select name="fmonth">
						<?
							for($i=0; $i<$ahead; $i++)
							{
								$themonth=date('M', strtotime("+$i Months"));
								echo "<option name =\"$themonth\" value=\"$themonth\">$themonth</option>";
							}
						?>
					</select>
					<select name="fyear">
						<?
							
							for($i=0; $i<$ahead; $i++)
							{
								$theyear=date('Y', strtotime("+$i Years"));
								echo "<option name =\"$theyear\" value=\"$theyear\">$theyear</option>";
							}
						?>
					</select>
				</td>
			  </tr>
			</table>

			<input type="submit" value="Submit" />
		</form>
		</div>
<?
	}
	else
	{
		?><div class="register"><?
		echo "You are not allowed here";
		?></div><?
	}
?>