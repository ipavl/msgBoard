<?php
	require_once('includes/config.php');
	
	echo '<h2 align="center">' . $appSiteName . '</h2>';
	
	echo '<p>Welcome to ' . $appSiteName . '. Please use one of the buttons below to navigate and use various aspects of the site.</p>';
	
	echo '<p align="center"><INPUT TYPE="button" onClick="parent.location=\'?postthread\'" value="Post New Thread">';
	echo '<INPUT TYPE="button" onClick="parent.location=\'?post\'" value="Reply to Thread">';
	
	echo '<INPUT TYPE="button" onClick="parent.location=\'?viewforum=1\'" value="View Forum">';
	echo '<INPUT TYPE="button" onClick="parent.location=\'?viewthread=thread_1\'" value="View Thread">';
	
	echo '<br /><br />';
	
	echo '<INPUT TYPE="button" onClick="parent.location=\'?faq\'" value="Common Questions">';
	echo '<INPUT TYPE="button" onClick="parent.location=\'?tos\'" value="Terms of Service"></p>';
?>