	</div>
</div>

<div id="bottom-left">
	<?php
		if ($appShowVersion)
		{
			echo $appVersion;
		}
	?>
</div>
<div id="bottom-right">
	<?php
		if ($appShowAdminButton)
		{
			echo '<INPUT TYPE="button" onClick="parent.location=\'?admin\'" value="Administration Panel">';
		}
	?>
</div>
</body>

</html>