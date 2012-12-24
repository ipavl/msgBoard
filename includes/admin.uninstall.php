<?php
	echo '<h2 align="center">Uninstallation Gremlin</h2>';

	if (isset($_POST['confirm'])) {
		switch($_POST['confirm']) {
			case 'confirm':
				require_once('config.php');
			
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
				break;
			default:
				break;
		}
	}
	else
	{
		echo 'Failed to uninstall msgBoard. This form only accepts confirmation via POST.<br />';
	}
	echo '<br /><a href="?admin">&lt; Return to administration panel</a>';
?>