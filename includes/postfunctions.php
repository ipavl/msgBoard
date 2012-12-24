<?php
	function postSuccess($strUsername, $strPassword, $strIPAddress, $strThread, $strMessage, $date, $threadID)
	{		
		echo "Your message has been submitted <b>successfully</b> with the following details: <br /><br />";
		
		echo "<b>Username:</b> " . $strUsername . "<br />";
		echo "<b>Password:</b> " . $strPassword . "<br />";
		echo "<b>IP Address:</b> " . $strIPAddress . "<br /><br />";
		
		echo "<b>Thread Title:</b> " . $strThread . " (ID: " . $threadID . ")<br />";
		echo "<b>Message:</b> " . $strMessage . "<br /><br />";

		if($strPassword == hashPassword('admin'))
			echo "<b>Distinguished:</b> true<br /><br />";
		
		echo "<b>Time:</b> " . $date . "<br /><br />";
		
		$viewThreadURL = getDirectoryURL() . "/?viewthread=";
		echo "View at: <b><a href=\"" . $viewThreadURL . $threadID . "\">" . $viewThreadURL . $threadID . "</a></b>";
	}	
?>