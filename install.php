<?php
	/* This file is part of ippavlin's msgBoard project. If you use it, please give credit and do not use it commercially without permission from the author.
	 * https://github.com/ippavlin/msgBoard
	 */
?>

<?php
	require_once('includes/config.php');
	
	$isStillGood = true;
	
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
		echo 'Creating tables and rows...';
		// Create table
		mysql_select_db($dbDatabase, $connect);
		$sql = "CREATE TABLE $tblPosts
		(
			$rowPID int NOT NULL AUTO_INCREMENT,
			$rowTimestamp text NOT NULL,
			$rowIPAddress text NOT NULL,
			$rowUsername text NOT NULL,
			$rowPassword text NOT NULL,
			$rowMessage text NOT NULL,
			PRIMARY KEY ($rowPID)
		)";
		// Execute query
		if (mysql_query($sql, $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error creating tables: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	mysql_close($connect);
	
	echo '<br /><a href="./">&lt; Go back</a>';
?>