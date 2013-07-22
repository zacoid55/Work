<?
	echo "<a href=\"index.php.php\">";
	echo "<a href=\"index.php\"><div class=\"logo\"></div></a>";
	echo "</a>";
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
	
	//Script to show user they have logged in properly
	if(session_is_registered(myusername))
		{
			echo "<div class=\"register\">";
			echo "<br /> Login Successful";
			echo "</br>";
			echo "<title>Success</title>";
			echo "Click the back button to return to the home page" ;
			echo "<form name=\"continue\" action=\"index.php.php\" method=\"post\" id=\"continue\" >";        
			echo "<input type=\"submit\" value=\"Back\" />";
			echo "</form>";
			echo "</div>";
		}
	else
	{
		?><div class="register"><?
		echo "You are not allowed here";
		?></div><?
	}
?>