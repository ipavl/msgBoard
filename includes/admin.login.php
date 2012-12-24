<?php
	require_once('config.php');

	// Connect to server and select database.
	mysql_connect("$dbServer", "$dbUsername", "$dbPassword") or die('Could not connect to SQL server: ' . mysql_error());
	
	mysql_select_db("$dbDatabase") or die('Could not access user database: ' . mysql_error());

	// username and password sent from form
	$myusername=$_POST['lgnUsername'];
	$mypassword=$_POST['lgnPassword'];

	// To protect from MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	$mypassword = hashPassword($mypassword);
	
	$sql="SELECT * FROM $tblUsers WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);

	$count=mysql_num_rows($result);

	if ($count == 1){
		session_register("myusername");
		session_register("mypassword");
		header("location:?admin");
	}
	else {
		echo "Invalid username or password.";
	}
?>