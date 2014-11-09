<?php
	require_once('config.functions.php');
	
	/* Server settings */
	$serverRoot = getDirectoryURL();
	
	/* Application settings */
	$appSiteName = "Derp Co. Forums";
	$appLicensedTo = "Unlicensed copy";
	$appVersion = "v0.3.7a";
	$appShowVersion = true;
	$appShowAdminButton = true;
	
	/* Administrative settings */
	$admUsername = "admin";
	$admPassword = "msgboard";
	$admEmail = "admin@locahost";
	
	/* Database settings */
	$dbUsername = "root";
	$dbPassword = "";
	$dbDatabase = "test_msgboard";
	$dbServer = "127.0.0.1";
	
	/* Database table settings */
	$rowPID = "post_id";
	$rowThread = "thread";
	$rowMessage = "message";
	
	$tblUsers = "users";
	$rowUID = "user_id";
	$rowEmail = "email";
	
	// These variables will be used by both the user and post tables
	$rowTimestamp = "timestamp";
	$rowIPAddress = "ip_address";
	$rowUsername = "username";
	$rowPassword = "password";
	$rowIsModerator = "isModerator";
	$rowIsVerified = "isVerified";
	
	/* Link constants */
	$viewThreadURL = $serverRoot . "/?viewthread=";
	$rowMessage = "message";
?>
