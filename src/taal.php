<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require get_talen_file();
function get_talen_file()
{
	$_SESSION['lang'] = $_SESSION['lang'] ?? 'en';
	$_SESSION['lang'] = $_GET['lang'] ?? $_SESSION['lang'];


	return "talen/".$_SESSION['lang'].".php";
}


function __($str)
{
	global $lang;
	if(!empty($lang[$str]))
	{
		return $lang[$str];
	}
	return $str;
}

?>