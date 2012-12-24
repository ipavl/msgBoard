<?php
	function getDirectoryURL() { 
		$pageURL = 'http'; 
		if (!empty($_SERVER['HTTPS'])) {
			if($_SERVER['HTTPS'] == 'on') {
				$pageURL .= "s";
			}
		}
		$pageURL .= "://"; 
		
		if ($_SERVER["SERVER_PORT"] != "80") { 
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].dirname($_SERVER['PHP_SELF']); 
		} else { 
			$pageURL .= $_SERVER["SERVER_NAME"].dirname($_SERVER['PHP_SELF']); 
		} 
		return $pageURL; 
	}
	
	function getClientIP() { 
		$ip; 
		if (getenv("HTTP_CLIENT_IP")) 
			$ip = getenv("HTTP_CLIENT_IP"); 
		else if(getenv("HTTP_X_FORWARDED_FOR")) 
			$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		else if(getenv("REMOTE_ADDR")) 
			$ip = getenv("REMOTE_ADDR"); 
		else 
			$ip = "UNKNOWN";
		return $ip; 
	}
?>