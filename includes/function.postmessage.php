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

	// Save whether or not the post was from the "correct" person (verified user)
	// TODO: Verify password against that stored in user database to determine whether the user is who they say they are
	if($strPassword == hashPassword($rowPassword))
		$isVerified = true;
	else
		$isVerified = false;
	
	addPost($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator, $isVerified);
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	postSuccess($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator);
?>