<head>
	<link rel="stylesheet" type="text/css" href="css/viewpost.css" />
</head>

<?php
	require_once('includes/config.php');
	
	if (isset($_GET['viewthread'])) {
		$id = $_GET['viewthread'];
		
		$db_handle = mysql_connect($dbServer, $dbUsername, $dbPassword);
		$db_found = mysql_select_db($dbDatabase, $db_handle);
		
		$tblThread = /*"thread_" .*/ $id;
		
		if ($db_found) {	// check if database exists
			if(mysql_num_rows( mysql_query("SHOW TABLES LIKE '" . $tblThread . "'")))	// check if table (thread) exists
			{
				$SQL = "SELECT * FROM $tblThread";
				$result = mysql_query($SQL);
				$num_rows = mysql_num_rows($result);
				print "Viewing $num_rows post(s) in thread.<P>";
				if ($id != null) {
					// TODO: get thread title while also getting posts
					//while ($db_field_title = mysql_fetch_assoc($result)){
					//	print "Viewing $num_rows post(s) in thread '" . $db_field_title[$rowThread] . "'.<P>";	
					//}
					while ($db_field = mysql_fetch_assoc($result)){
						echo '<div id="viewPostContainer">';
						echo '<div id="viewPostLeftColumn" <!--class="admin"-->';
						print $db_field[$rowUsername] . "<BR />";
						echo '</div>';
						echo '<div id="viewPostRightColumn" <!--class="admin"-->';
							echo '<div id="viewPostFooter">';
								print $db_field[$rowTimestamp] . " || " . $db_field[$rowIPAddress] . " || " . $db_field[$rowPassword];
							echo '</div>';
	
							print $db_field[$rowMessage] . "<BR /><BR />";
						echo '</div>';
						echo '&nbsp;</div>';
					}
				}
				else
				{
					echo "Invalid or non-existent post specified. Please enter a valid post using:<p /><a href=\"" . $viewThreadURL . "\">" . $viewThreadURL . "</a>POST_ID";
				}
				mysql_close($db_handle);
			}
			else 
			{
				print "No thread with the id <b>" . $tblThread . "</b> exists.";
				mysql_close($db_handle);				
			}
		}
		else
		{
			print "The database <b>" . $database . "</b> was not found.";
			mysql_close($db_handle);
		}
	}
	else
	{
		echo "No post specified. Please enter a valid post using:<p /><a href=\"" . $viewThreadURL . "\">" . $viewThreadURL . "</a>POST_ID";
	}
?>