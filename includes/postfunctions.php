<?php
	function addPost($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator, $isVerified)
	{
		if($isModerator)		// Moderator post
			$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator, $rowIsVerified) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '1', '1')";
		else if ($isVerified)	// Verified user
			$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator, $rowIsVerified) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '0', '1')";
		else					// Unverified user
			$query = "INSERT INTO $threadID ($rowPID, $rowTimestamp, $rowIPAddress, $rowUsername, $rowPassword, $rowMessage, $rowIsModerator, $rowIsVerified) VALUES ('', '$date', '$strIPAddress', '".mysql_real_escape_string($strUsername)."', '".mysql_real_escape_string($strPassword)."', '".mysql_real_escape_string($strMessage)."', '0', '0')";
	}

	function postSuccess($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID, $isModerator)
	{		
		echo "Your message has been submitted <b>successfully</b> with the following details: <br /><br />";
		
		echo "<b>Username:</b> " . $strUsername . "<br />";
		echo "<b>Password:</b> " . $strPassword . "<br />";
		echo "<b>IP Address:</b> " . $strIPAddress . "<br /><br />";
		
		echo "<b>Thread Title:</b> " . $strThread . " (ID: " . $threadID . ")<br />";
		echo "<b>Message:</b> " . $strMessage . "<br /><br />";

		echo "<b>Distinguished:</b> " . $isModerator . "<br /><br />";
		
		echo "<b>Time:</b> " . $date . "<br /><br />";
		
		$viewThreadURL = getDirectoryURL() . "/?viewthread=";
		echo "View at: <b><a href=\"" . $viewThreadURL . $threadID . "\">" . $viewThreadURL . $threadID . "</a></b>";
	}	
?>