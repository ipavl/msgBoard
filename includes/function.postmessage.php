<?php
	require_once('config.php');
	require_once('postfunctions.php');
	
	mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error:</b> ' . mysql_error());
	mysql_select_db ($dbDatabase);
	
	$date = strftime('%c');
	$strUsername = $_POST['frmUsername'];
	$strPassword = hashPassword($_POST['frmPassword']);
	$strMessage = $_POST['frmMessage'];
	$strIPAddress = getClientIP();
	
	$threadID = "thread_" . $_POST['frmThread'];
	$strThread = null;	// TODO: Get actual thread title

	// Save whether or not the post should be marked as a moderator/distinguished (highlighted) post
	if($strPassword == hashPassword('admin'))
		$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '1')";
	else
		$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '0')";
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	postSuccess($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID);
?>