<? 
	//Destroying of the current session
	session_start();
	session_destroy();
	
	//Script to tell the user they have logged out and guide them back to the homepage
	echo "<a href=\"index.php\"><div class=\"logo\"></div></a>";
	echo "<div class=\"login\">";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
	echo "Click the back button to return to the home page" ;
	echo "<form name=\"continue\" action=\"index.php\" method=\"post\" id=\"continue\" >";        
	echo "<input type=\"submit\" value=\"Back\" />";
	echo "</form>";
	echo "</div>";
?>