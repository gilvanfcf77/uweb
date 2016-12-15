<?php
	session_start();
	session_destroy();
	session_start();
	require_once ("captcha.php");  
?>