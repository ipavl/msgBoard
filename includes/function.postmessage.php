<?php
	require_once('config.php');
	
	$date = strftime('%c');
	$strUsername = $_POST['frmUsername'];
	$strPassword = hashPassword($_POST['frmPassword']);
	$strThread = "thread_" . $_POST['frmThread'];
	$strMessage = $_POST['frmMessage'];
	$strIPAddress = getClientIP();

	mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error:</b> ' . mysql_error());
	mysql_select_db ($dbDatabase);

	// Save whether or not the post should be marked as a moderator/distinguished (highlighted) post
	if($strPassword == hashPassword('admin'))
		$query = "INSERT INTO $strThread ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '1')";
	else
		$query = "INSERT INTO $strThread ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '0')";
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	echo "The following message was <b>successfully</b> added: <br /><br />";

	echo "<b>Username:</b> " . $strUsername . "<br />";
	echo "<b>Password:</b> " . $strPassword . "<br />";
	echo "<b>IP Address:</b> " . $strIPAddress . "<br />";
	echo "<b>Message:</b> " . $strMessage . "<br /><br />";

	if($strPassword == hashPassword('admin'))
		echo "<b>Distinguished:</b> true<br /><br />";
	
	echo "<b>Time:</b> " . $date . "<br /><br />";
	
	// TODO: Get post id from database (by timestamp would cause an issue if messages were posted at the exact same time)
	echo "View at: <b><a href=\"" . $viewThreadURL . $strThread . "\">" . $viewThreadURL . $strThread . "</a></b>";
?>