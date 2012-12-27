<?php
	require_once('config.php');
	require_once('postfunctions.php');
	
	$date = strftime('%c');
	$strUsername = $_POST['frmUsername'];
	$strPassword = hashPassword($_POST['frmPassword']);
	$strThread = $_POST['frmThread'];
	$strMessage = $_POST['frmMessage'];
	$strIPAddress = getClientIP();

	mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error: </b> ' . mysql_error());
	mysql_select_db ($dbDatabase);
	
	// Get the next available id in the thread_index table
	// Note: this should almost always work unless there is a delay in adding a thread and another user ninjas a thread in
	$result = mysql_query("SHOW TABLE STATUS LIKE 'thread_index'");
	$data = mysql_fetch_assoc($result);
	$next_increment = $data['Auto_increment'];
	$threadID = "thread_" . $next_increment;
	
	// Save thread title to thread_index table
	$saveThreadTitle = "INSERT INTO thread_index (`thread_id`, `thread_title`) VALUES ('', '".mysql_real_escape_string($strThread)."');";
	mysql_query($saveThreadTitle) or die ('<b>Error saving thread title to database:</b> <br /> ' . mysql_error());
	
	// Create table for the thread we're creating and any replies to it
	$sql = "CREATE TABLE $threadID
	(
		$rowPID int NOT NULL AUTO_INCREMENT,
		$rowTimestamp text NOT NULL,
		$rowIPAddress text NOT NULL,
		$rowUsername text NOT NULL,
		$rowPassword text NOT NULL,
		$rowMessage text NOT NULL,
		$rowIsModerator BOOLEAN NOT NULL default 0,
		$rowIsVerified BOOLEAN NOT NULL default 0,
		PRIMARY KEY ($rowPID)
	)";
	// Execute query to create thread table
	mysql_query($sql) or die (mysql_error());
	
	// Save whether or not the post should be marked as a moderator/distinguished (highlighted) post
	if($strPassword == hashPassword($admPassword))
		$isModerator = true;
	else
		$isModerator = false;
	
	addPost($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator);
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	postSuccess($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator);
?>