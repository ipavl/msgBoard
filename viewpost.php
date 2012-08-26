<?php
	/* This file is part of ippavlin's msgBoard project. If you use it, please give credit and do not use it commercially without permission from the author.
	 * https://github.com/ippavlin/msgBoard
	 */
?>

<?php
	require_once('includes/config.php');
	
	if (isset($_GET['pid'])) {
		$id = $_GET['pid'];

		$db_handle = mysql_connect($dbServer, $dbUsername, $dbPassword);
		$db_found = mysql_select_db($dbDatabase, $db_handle);

		if ($db_found) {

			$SQL = "SELECT * FROM $tblPosts WHERE post_id=" . $id;
			$result = mysql_query($SQL);

			while ($db_field = mysql_fetch_assoc($result)) {
				print $db_field['$rowPID'] . "<BR>";
				print $db_field['$rowTimestamp'] . "<BR>";
				print $db_field['$rowIPAddress'] . "<BR>";
				print $db_field['$rowUsername'] . "<BR>";
				print $db_field['$rowPassword'] . "<BR>";
				print $db_field['$rowMessage'] . "<BR>";
			}

			mysql_close($db_handle);

		}
		else {
			print "The database " . $database . " was not found.";
			mysql_close($db_handle);
		}
	} else {
		$viewPostURL = $serverRoot . "/viewpost.php?pid=<i>POSTID</i>";
		echo 'No valid thread specified. Please enter a valid thread with: ' . $viewPostURL;
	}
?>