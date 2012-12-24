<?php
	require_once('includes/config.php');
	//require_once('includes/admin.login.php');
	
	/*session_start();
	if(!session_is_registered(myusername)){
		header("location:?admin=login");
	}*/
	
	echo '<h2 align="center">Administration Panel</h2>';
	
	echo '<p>The button below will create the database and tables based off of your configuration file:</p>';
	echo '<p><INPUT TYPE="button" onClick="parent.location=\'?admin=install\'" value="INSTALL"></p>';

	echo '<p>The button below will <b>DELETE</b> the database and its contents:</p>';
	echo '<p><INPUT TYPE="button" onClick="parent.location=\'?admin=uninstall\'" value="UNINSTALL"></p>';
	
	echo '<br /><a href="./">&lt; Return to site index</a>';
?>