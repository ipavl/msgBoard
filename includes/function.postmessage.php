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
	if($strPassword == hashPassword($admPassword))
		$isModerator = true;
	else
		$isModerator = false;
	
	// Read user's password from database
	$sql = "SELECT password FROM users WHERE username='$strUsername' LIMIT 1";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	//print_r($row);	// debug: print hashed password from database
	$strPassFromDB = $row['password'];
	
	// Save whether or not the post was from the "correct" person (verified user)
	if($strPassword == $strPassFromDB)
		$isVerified = true;
	else
		$isVerified = false;
	
	// Save post
	if($isModerator)		// Moderator post
		$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator, $rowIsVerified) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '1', '1')";
	else if ($isVerified)	// Verified user
		$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator, $rowIsVerified) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '0', '1')";
	else					// Unverified user
		$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator, $rowIsVerified) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '0', '0')";
	
	//addPost($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator, $isVerified);
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	postSuccess($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator);
?>