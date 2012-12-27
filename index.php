<head>
<script type="text/javascript">
<!--

	/* onClick for confirm enable button */

//-->
</script>

</head>

<?php
	// Page header
	include('includes/page.header.php');

	// Figure out what page to load
	// Usage: http://www.example.com/?post
	//		  http://www.example.com/?viewpost=42
	//		  http://www.example.com/?admin=install
	if (isset($_GET['viewpost']))	// view post page
	{
		include('includes/form.viewpost.php');
	}
	elseif (isset($_GET['viewthread']))	// view thread page
	{
		include('includes/form.viewthread.php');
	}
	elseif (isset($_GET['viewforum']))	// view thread page
	{
		include('includes/form.viewforum.php');
	}
	elseif (isset($_GET['post']))	// post new message page
	{
		echo '<div id="post">';
		echo '<h2 align="center">Post Reply</h2>';
		echo '<form method="post" action="?post_message">';
		echo '<label for="frmUsername" class="required">Username:</label>';
		echo '<input type="text" name="frmUsername" /> <br />';
		echo '<label for="frmPassword" class="required">Password:</label>';
		echo '<input type="password" name="frmPassword" /> <br /><br />';
		echo '<label for="frmThread" class="required">Thread ID:</label>';
		echo '<input type="text" name="frmThread" /> <br /><br />';
		echo '<label for="frmMessage" class="required">Message:</label>';
		echo '<textarea name="frmMessage" /></textarea> <br /><br />';

		/*echo '<label for="captcha" class="required"><a href="http://en.wikipedia.org/wiki/CAPTCHA">CAPTCHA</a>:</label>';
		echo '<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /> <br />';
		echo '<label for="captcha_code">&nbsp;</label>';
		echo '<input type="text" name="captcha_code" size="10" maxlength="6" class="captcha" /> &nbsp;&nbsp;';
		echo '<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?';
		echo '+ Math.random(); return false">Can't read?</a> | <a href="#">Listen</a>';
		echo '<br /><br />';*/


		echo '<label for="submit">&nbsp;</label>';
		echo '<input name="submit" type="submit" value="Post" class="submit-button" /> <!--<font color="red">Note: </font>-->';
		echo '</form>';
		echo '</div>';

	}
	elseif (isset($_GET['post_message']))	// post message submission page
	{
		include('includes/function.postmessage.php');
	}
	elseif (isset($_GET['postthread']))	// post new thread page
	{
		echo '<div id="post">';
		echo '<h2 align="center">Post Reply</h2>';
		echo '<form method="post" action="?post_thread">';
		echo '<label for="frmUsername" class="required">Username:</label>';
		echo '<input type="text" name="frmUsername" /> <br />';
		echo '<label for="frmPassword" class="required">Password:</label>';
		echo '<input type="password" name="frmPassword" /> <br /><br />';
		echo '<label for="frmThread" class="required">Thread Title:</label>';
		echo '<input type="text" name="frmThread" /> <br /><br />';
		echo '<label for="frmMessage" class="required">Message:</label>';
		echo '<textarea name="frmMessage" /></textarea> <br /><br />';

		/* echo '<label for="captcha" class="required"><a href="http://en.wikipedia.org/wiki/CAPTCHA">CAPTCHA</a>:</label>';
		echo '<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /> <br />';
		echo '<label for="captcha_code">&nbsp;</label>';
		echo '<input type="text" name="captcha_code" size="10" maxlength="6" class="captcha" /> &nbsp;&nbsp;';
		echo '<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?'';
		echo '+ Math.random(); return false">Can't read?</a> | <a href="#">Listen</a>';
		echo '<br /><br />'; */


		echo '<label for="submit">&nbsp;</label>';
		echo '<input name="submit" type="submit" value="Post" class="submit-button" /> <!--<font color="red">Note: </font>-->';
		echo '</form>';
		echo '</div>';

	}
	elseif (isset($_GET['post_thread']))	// post new thread submission page
	{
		include('includes/function.postthread.php');
	}
	elseif (isset($_GET['register']))	// registration page
	{
		echo '<div id="post">';
		echo '<h2 align="center">Account Registration</h2>';
		echo '<form method="post" action="?register2">';
		
		echo '<label for="frmUsername" class="required">Username:</label>';
		echo '<input type="text" name="frmUsername" /> <br />';
		
		echo '<label for="frmEmail" class="required">Email:</label>';
		echo '<input type="text" name="frmEmail" /> <br /><br />';
		
		echo '<label for="frmPassword" class="required">Password:</label>';
		echo '<input type="password" name="frmPassword" /> <br /><br />';

		/*echo '<label for="confirm" class="required">&nbsp;</label>';
		echo '<input type="checkbox" name="confirm" value="confirm" onClick="confirmRegister(this)">';
		echo 'I agree to the <a href="terms.php">Terms of Service</a> and that the above information is correct.';
		echo '<br /><br />';*/

		echo '<label for="submit">&nbsp;</label>';
		echo '<input name="submit" type="submit" value="Post" class="submit-button" />';

		echo '</form>';
		echo '</div>';
	}
	elseif (isset($_GET['register2']))	// registration page
	{
		include('includes/user.register.php');
	}
	elseif (isset($_GET['tos']))	// terms of service page
	{
		include('includes/page.tos.php');
	}
	elseif (isset($_GET['admin']))	// administration pages
	{
		$event = $_GET['admin'];
		if ($event == "" || $event == "index")	// the main admin page
		{
			include('includes/admin.php');
		}
		elseif ($event == "login")		// the login page
		{
			echo '<h2 align="center">Administration Login</h2>';

			echo '<table width="250" border="0" align="center" cellpadding="0" cellspacing="1">';
				echo '<tr>';
				echo '<form name="frmLogin" method="post" action="includes/admin.login.php">';
				echo '<td>';
				echo '<table width="100%" border="0" cellpadding="3" cellspacing="1">';
				echo '<tr>';
				echo '<td width="78">Username:</td>';
				echo '<td width="294"><input name="lgnUsername" type="text" id="lgnUsername"/>';
				echo '</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td>Password:</td>';
				echo '<td><input name="lgnPassword" type="password" id="lgnPassword"/></td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td>&nbsp;</td>';
				echo '<td><input type="submit" name="Submit" value="Login"/></td>';
				echo '</tr>';
				echo '</table>';
				echo '</td>';
				echo '</form>';
				echo '</tr>';
			echo '</table>';

			echo '<br /><a href="?admin">&lt; Return to administration panel</a>';
		}
		elseif ($event == "install")	// this page will create the database if it doesn't exist
		{
			include('includes/admin.install.php');
		}
		elseif ($event == "uninstall")	// this page will show a confirmation screen
		{
			echo '<h2 align="center">Uninstallation Gremlin</h2>';
			echo '<form action="?admin=uninstall.confirm" method="post">';
			echo 'Do you really want to uninstall msgBoard?<p />';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	// ugly code :(
			echo '<input type="checkbox" name="confirm" value="confirm" onClick="confirmUninstall(this)">Yes - I\'m aware this will erase <u>ALL</u> the data in the database.';
			echo '<br /><br />';
			echo '<button type="submit" "/*disabled*/">Confirm</button>';
			echo '</form>';
		}
		elseif ($event == "uninstall.confirm")	// the actual uninstall page, only accepts confirmation via POST
		{
			include('includes/admin.uninstall.php');
		}
		else
		{
			echo 'Invalid page specified.<br /><a href="./index.php?admin">&lt; Return to administration panel</a>';
		}
	}
	else
	{
		include('includes/page.index.php');
	}

	// Page footer
	include('includes/page.footer.php');
?>	