<?php
	require_once('config.php');
	
	$date = strftime('%c');
	$strUsername = $_POST['frmUsername'];
	$strPassword = md5(sha1(md5(md5(sha1(md5(sha1($_POST['frmPassword'])))))));
	$strThread = $_POST['frmThread'];
	$strMessage = $_POST['frmMessage'];
	$strIPAddress = getClientIP();

	mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error: </b> ' . mysql_error());
	mysql_select_db ($dbDatabase);
	
	// This line is commented out because we don't want random ids in production a production enviornment since it
	// makes it harder to figure out which topics are older.
	//$threadID = "thread_" . rand();
	
	// Get the next available id in the thread_index table
	// Note: this should almost always work unless there is a delay in adding a thread and another user ninjas a thread in
	$result = mysql_query("SHOW TABLE STATUS LIKE 'thread_index'");
	$data = mysql_fetch_assoc($result);
	$next_increment = $data['Auto_increment'];
	$threadID = "thread_" . $next_increment;
	
	// Save thread title to thread_index table
	//mysql_select_db ("thread_index");
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
		PRIMARY KEY ($rowPID)
	)";
	// Execute query to create thread table
	mysql_query($sql) or die (mysql_error());
	
	$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."')";
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	echo "Your thread has been created <b>successfully</b> with the following details: <br /><br />";

	echo "<b>Username:</b> " . $strUsername . "<br />";
	echo "<b>Password:</b> " . $strPassword . "<br />";
	echo "<b>IP Address:</b> " . $strIPAddress . "<br />";
	echo "<b>Thread Title:</b> " . $strThread . "<br /><br />";
	echo "<b>Message:</b> " . $strMessage . "<br /><br />";

	echo "<b>Time:</b> " . $date . "<br /><br />";
	
	echo "View at: <b><a href=\"" . $viewThreadURL . $threadID . "\">" . $viewThreadURL . $threadID . "</a></b>";
?>