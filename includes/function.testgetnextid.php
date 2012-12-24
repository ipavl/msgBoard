<?php
	/*
	 * Temporary file to try and figure out how to get next available AUTO_INCREMENT value and then use this to make threads
	 * use the next available id upon creation, as well as listing threads by name when viewing a forum based on id.
	 */
	require_once('config.php');
	mysql_connect ($dbServer, $dbUsername, $dbPassword) or die ('<b>Database connection error: </b> ' . mysql_error());
	mysql_select_db ($dbDatabase);

	// Get the next available id
	// Note: this should almost always work unless there is a delay in adding a thread and another user ninjas a thread in
	$result = mysql_query("SHOW TABLE STATUS LIKE 'thread_index'");
	$data = mysql_fetch_assoc($result);
	$next_increment = $data['Auto_increment'];
	echo 'Next available AUTO_INCREMENT id is: ' . $next_increment;
	
	$query = "SELECT * FROM thread_index"; 

	$result = mysql_query($query) or die(mysql_error());	
	
	echo '<ol>';
	while($row = mysql_fetch_array($result)){
		echo "<li> " . $row['thread_id']. " - ". $row['thread_title'] . "</li>";
	}
	echo '</ol>';
?>