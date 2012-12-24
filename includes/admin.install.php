<?php
	require_once('includes/config.php');
	
	echo '<h2 align="center">Installation Gremlin</h2>';
	
	$isStillGood = true;	// we'll set this to false if something blows up to stop the installation
	
	echo 'Connecting to MySQL server...';
	$connect = mysql_connect($dbServer, $dbUsername, $dbPassword);
	
	if (!$connect)
	{
		die('Could not connect to SQL server: ' . mysql_error());
		$isStillGood = false;
	}
	else
	{
		echo 'success!<br />';
	}
	
	if($isStillGood) {
		echo 'Creating database...';
		// Create database
		if (mysql_query("CREATE DATABASE $dbDatabase", $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error creating database: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	
	if($isStillGood) {
		echo 'Creating user table...';
		// Create table
		mysql_select_db($dbDatabase, $connect);
		$sql = "CREATE TABLE $tblUsers
		(
			$rowUID int NOT NULL AUTO_INCREMENT,
			$rowTimestamp text NOT NULL,
			$rowIPAddress text NOT NULL,
			$rowUsername text NOT NULL,
			$rowEmail text NOT NULL,
			$rowPassword text NOT NULL,
			PRIMARY KEY ($rowUID)
		)";
		// Execute query
		if (mysql_query($sql, $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error creating table: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	
	if($isStillGood) {
		echo 'Creating thread indexes table...';
		// Create table
		mysql_select_db($dbDatabase, $connect);
		$sql = "CREATE TABLE thread_index
		(
			thread_id int NOT NULL AUTO_INCREMENT,
			thread_title text NOT NULL,
			PRIMARY KEY (thread_id)
		)";
		// Execute query
		if (mysql_query($sql, $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error creating table: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	
	if($isStillGood) {
		echo 'Adding administrative user...';
		$date = strftime('%c');
		$strUsername = $admUsername;
		$strPassword = hashPassword($admPassword);
		$strEmail = $admEmail;
		$strIPAddress = getClientIP();

		$query = "INSERT INTO $tblUsers ($rowUID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowEmail, $rowPassword) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strEmail)."', '".mysql_real_escape_string($strPassword)."')";
		
		// Execute query
		if (mysql_query($query, $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error adding administrative user: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	
	mysql_close($connect);
	
	echo '<br /><a href="?admin">&lt; Return to administration panel</a>';
?>