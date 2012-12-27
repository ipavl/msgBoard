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
				print "Viewing $num_rows post(s) in thread: <b><a href=\"?viewthread=" . $id . "\">THREAD_NAME_HERE</a></b><p>";
				if ($id != null) {
					// TODO: get thread title while also getting posts
					//while ($db_field_title = mysql_fetch_assoc($result)){
					//	print "Viewing $num_rows post(s) in thread '" . $db_field_title[$rowThread] . "'.<P>";	
					//}
					echo '<table width="100%">';
					while ($db_field = mysql_fetch_assoc($result)){
						echo '<tr valign="top"><td>';
						
						// Moderator/distinguished post
						if($db_field[$rowIsModerator] == 1)
							echo '<div id="viewPostLeftColumn" class="admin">';
						else if($db_field[$rowIsVerified] == 1)
							echo '<div id="viewPostLeftColumn" class="verified">';
						else
							echo '<div id="viewPostLeftColumn">';
						
						// Trim username to avoid stretching the left column 
						// TODO: IMPROVE
						$user = $db_field[$rowUsername];
						$max_chars = 12;
						if(!strpos($user, " "))	// if it does not contain any spaces, trim it to 12 characters
							$user = substr($user, 0, $max_chars);
						else					// if it contains spaces, word-wrap it
							$user = wordwrap($user, $max_chars, "<br />");
						
						print $user;
						
						echo '</div></td><td>';

						// Moderator/distinguished post
						if($db_field[$rowIsModerator] == 1)
							echo '<div id="viewPostRightColumn" class="admin">';
						else if($db_field[$rowIsVerified] == 1)
							echo '<div id="viewPostRightColumn" class="verified">';
						else
							echo '<div id="viewPostRightColumn">';

						echo '<div id="viewPostFooter">';
							// The post "footer"
							if ($db_field[$rowIsVerified] == 1)
								print "<b>Verified</b> - ";
							
							// the top line is what staff will see in the final version (password hash for admins only? Depends if there's a "login" feature)
							//print $db_field[$rowTimestamp] . " || " . $db_field[$rowIPAddress] . " || " . $db_field[$rowPassword];
							print $db_field[$rowTimestamp];
						echo '</div>';

						// TODO: Avoid stretching of this column (e.g. word wrap messages that lack spaces)
						print $db_field[$rowMessage] . "<BR /><BR />";
						
						echo '</div>';
						
						echo '</td></tr>';
					}
					echo '</table></p>';
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