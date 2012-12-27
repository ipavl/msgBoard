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

	<div id="top-header">
		<div id="top-left">
			<?php
				echo "<a href=\"./\">" . $appSiteName . "</a>";
			?>
		</div>
		
		<div id="top-right">
			<?php
				echo '<INPUT TYPE="button" onClick="parent.location=\'?register\'" value="Register">';
				if ($appShowAdminButton)
					echo '<INPUT TYPE="button" onClick="parent.location=\'?admin\'" value="Administration Panel">';
			?>
		</div>
	</div>
	
	<div id="logo">
		<a href="./"><img src="images/logo.png" /></a>
	</div>
	
	<center>
		<div id="container">