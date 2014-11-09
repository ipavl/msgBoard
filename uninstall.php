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
		echo 'Deleting database...';
		// Create database
		if (mysql_query("DROP DATABASE $dbDatabase", $connect))
		{
			echo 'success!<br />';
		}
		else
		{
			echo 'failed!<br />Error dropping database: ' . mysql_error() . '<br />';
			$isStillGood = false;
		}
	}
	mysql_close($connect);
	
	echo '<br /><a href="./">&lt; Go back</a>';
?>