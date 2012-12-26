	<?php
		require_once('includes/config.php');
		ob_start (); // Buffer output
	?>

	<html>

	<head>
	<title><?php echo $appSiteName; ?> - Powered by msgBoard</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	</head>

	<body>

	<div id="top-left">
	Powered by <a href="https://bitbucket.org/ordona/msgboard">msgBoard</a>. Copyright ©2012 Ian Pavlinic. All rights reserved.
	<br />
	<?php
		echo 'Licensed to: ' . $appLicensedTo . '.<br />';
	?>
	</div>

	<div id="top-right">
		Your IP Address will be logged along with your message for legal reasons, and will only be shown to administration staff once the final product is ready.
		However, during this pre-release stage, logged IP addresses may be visible to anyone who is participating in the development or testing processes.
	</div>
	
	<div id="logo">
		<a href="./"><img src="images/logo.png" /></a>
	</div>

	<div id="container">
		<div id="content">