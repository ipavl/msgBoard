<?php
	/* This file is part of ippavlin's msgBoard project. If you use it, please give credit and do not use it commercially without permission from the author.
	 * https://github.com/ippavlin/msgBoard
	 */
?>

<?php
	require_once('includes/config.php');
	
	$date = strftime('%c');
	$strUsername = $_POST['frmUsername'];
	$strPassword = md5(sha1(md5(md5(sha1(md5(sha1($_POST['frmPassword'])))))));
	$strMessage = $_POST['frmMessage'];
	$strIPAddress = getClientIP();

	mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error:</b> ' . mysql_error());
	mysql_select_db ($dbDatabase);

	$query = "INSERT INTO $tblPosts ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."')";
	
	mysql_query($query) or die ('<b>Error saving post to database.</b> <br /> ' . mysql_error());

	echo "The following message was <b>successfully</b> added: <br /><br />";

	echo "<b>Username:</b> " . $strUsername . "<br />";
	echo "<b>Password:</b> " . $strPassword . "<br />";
	echo "<b>IP Address:</b> " . $strIPAddress . "<br />";
	echo "<b>Message:</b> " . $strMessage . "<br /><br />";

	echo "<b>Time:</b> " . $date . "<br /><br />";
	
	// TODO: Get post id from database (by timestamp would cause an issue if messages were posted at the exact same time)
	$viewPostURL = $serverRoot . "/viewpost.php?pid=";
	echo "View at: <b><a href=\"" . $viewPostURL . "\">" . $viewPostURL . "</a></b>";
?>