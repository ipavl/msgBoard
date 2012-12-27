<?php
	require_once('includes/config.php');
	
	echo '<h2 align="center">Account Registration</h2>';
	
	$isStillGood = true;	// we'll set this to false if something blows up to stop the installation
	
	echo 'Connecting to MySQL server...';
	$connect = mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error: </b> ' . mysql_error());
	mysql_select_db ($dbDatabase);
	
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
		echo 'Registering...';
		
		$date = strftime('%c');
		$strUsername = $_POST['frmUsername'];
		$strEmail = $_POST['frmEmail'];
		$strPassword = hashPassword($_POST['frmPassword']);
		$strIPAddress = getClientIP();

		$query = "INSERT INTO $tblUsers ($rowUID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowEmail, $rowPassword, $rowIsModerator) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strEmail)."', '".mysql_real_escape_string($strPassword)."', '0')";
		
		// Execute query
		if (mysql_query($query, $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error adding user: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	
	mysql_close($connect);
	
	echo '<br /><a href="./">&lt; Return to index</a>';
?>