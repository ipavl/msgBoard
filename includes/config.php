<?php
	/* This file is part of ippavlin's msgBoard project. If you use it, please give credit and do not use it commercially without permission from the author.
	 * https://github.com/ippavlin/msgBoard
	 */
?>

<?php
	require_once('config.functions.php');
	
	/* Server settings */
	$serverRoot = getDirectoryURL();
	
	/* Database settings */
	$dbUsername = "root";
	$dbPassword = "";
	$dbDatabase = "test_msgboard";
	$dbServer = "127.0.0.1";
	
	/* Database table settings */
	$tblPosts = "posts";
	$rowPID = "post_id";
	$rowTimestamp = "timestamp";
	$rowIPAddress = "ip_address";
	$rowUsername = "username";
	$rowPassword = "password";
	$rowMessage = "message";
?>