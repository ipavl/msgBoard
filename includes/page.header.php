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
	<?php
		if ($appShowVersion)
		{
			echo $appVersion;
		}
	?>
	</div>

	<div id="top-right">
		<?php
			if ($appShowAdminButton)
			{
				echo '<INPUT TYPE="button" onClick="parent.location=\'?admin\'" value="Administration Panel">';
			}
		?>
	</div>
	
	<div id="logo">
		<a href="./"><img src="images/logo.png" /></a>
	</div>

	<div id="container">
		<div id="content">