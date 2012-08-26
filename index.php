<?php
	/* This file is part of ippavlin's msgBoard project. If you use it, please give credit and do not use it commercially without permission from the author.
	 * https://github.com/ippavlin/msgBoard
	 */
?>

<p><INPUT TYPE="button" onClick="parent.location='post.php'" value="Submit Message">
<INPUT TYPE="button" onClick="parent.location='viewpost.php?pid='" value="View Post"></p>

<p>The button below will create the database and tables based off of your configuration file:</p>
<p><INPUT TYPE="button" onClick="parent.location='install.php'" value="INSTALL"></p>

<p>The button below will <b>DELETE</b> the database (this is your only warning!):</p>
<p><INPUT TYPE="button" onClick="parent.location='uninstall.php'" value="UNINSTALL"></p>