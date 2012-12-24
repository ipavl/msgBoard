<head>
	<link rel="stylesheet" type="text/css" href="css/viewpost.css" />
</head>

<?php
	require_once('includes/config.php');
	
	if (isset($_GET['viewforum'])) {
		$id = $_GET['viewforum'];
		
		$db_handle = mysql_connect($dbServer, $dbUsername, $dbPassword);
		$db_found = mysql_select_db($dbDatabase, $db_handle);
		
		if ($db_found) {
			if ($id != null) {
				echo '<h2 align="center">View Forum</h2>';
				echo 'Listing all threads in forum:';
				
				echo '<ol>';
				
				// Get thread titles from thread_index
				$query = "SELECT * FROM thread_index"; 
			
				$result = mysql_query($query) or die(mysql_error());	
				
				echo '<ol>';
				while($row = mysql_fetch_array($result)){
					print "<li><a href=\"" . $viewThreadURL . "thread_" . $row['thread_id'] . "\">" .  $row['thread_title'] . "</a></li>";
				}
				echo '</ol>';
			}
			else
			{
				echo "Invalid or non-existent forum specified.";
			}
			mysql_close($db_handle);
		}
		else
		{
			print "The database <b>" . $dbDatabase . "</b> was not found.";
			mysql_close($db_handle);
		}
	}
	else
	{
		echo "No forum specified.";
	}
?>