<?php
	/* This file is part of ippavlin's msgBoard project. If you use it, please give credit and do not use it commercially without permission from the author.
	 * https://github.com/ippavlin/msgBoard
	 */
?>

		<div id="post">
			<h2>Post Reply</h2>
			<form method="post" action="posted.php">
			<label for="frmUsername" class="required">Username:</label>
			<input type="text" name="frmUsername" /> <br />
			<label for="frmPassword" class="required">Password:</label>
			<input type="password" name="frmPassword" /> <br /><br />
			<label for="frmMessage" class="required">Message:</label>
			<textarea name="frmMessage" /></textarea> <br /><br />
			
			<!--<label for="captcha" class="required"><a href="http://en.wikipedia.org/wiki/CAPTCHA">CAPTCHA</a></label>
			<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /> <br /> 
			<label for="captcha_code">&nbsp;</label>
			<input type="text" name="captcha_code" size="10" maxlength="6" class="captcha" /> &nbsp;&nbsp;
			<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' 
			+ Math.random(); return false">Can't read?</a> | <a href="#">Listen</a>
			<br /><br />-->
			
			<label for="submit">&nbsp;</label>
			<input name="submit" type="submit" value="Post" class="submit-button" /> <!--<font color="red">Note: </font>-->
			</form>
		</div>