<?
	session_start();
	
	//Database properties
	$host="localhost";
	$username="zaccyb_admin";
	$password="Strawrats661";
	$dbname="zaccyb_users";
	$tblename="users";
	$adverttable="items";
	
	//Database connect
	mysql_connect("$host", "$username", "$password")or die("Cannot connect"); 
	mysql_select_db("$dbname")or die("cannot select DB");
	
	$nusername = $_SESSION['myusername'];
	$description = $_POST['description'];
	$sday = $_POST['sday'];
	$smonth = $_POST['smonth'];
	$syear = $_POST['syear'];
	$fday = $_POST['fday'];
	$fmonth = $_POST['fmonth'];
	$fyear = $_POST['fyear'];
	
	$startdate = strtotime($sday.$smonth.$syear);
	
	//Gather email info from the logged in user to put into the author section in database
	$findemail= "SELECT email FROM $tblename WHERE username = '$nusername'";
	$emailsql = mysql_query($findemail);
	$email = mysql_fetch_assoc($emailsql);
	$semail = $email['email'];
	
	//Insert new advert info into the correct database
	$sql="INSERT INTO $adverttable(description, email, author, sDay, sMonth, sYear, fDay, fMonth, fYear, startdateval) 
		VALUES ('$description','$semail', '$nusername', '$sday', '$smonth', '$syear', '$fday', '$fmonth', '$fyear', '$startdate')";
	$result = mysql_query($sql);
	header("Location:index.php");
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<a href="index.php"><div class=\"logo\"></div></a>

