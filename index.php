<?php
	error_reporting(0);
	$access = $_POST["code"];
	if ($access == "NRMHGAME") {
		setcookie("access_code",$access,time()+3600);
		if ($_GET["game"] == "basketball") {
			include "_games/basketball.php";
		}
		else {
			include "_pages/titlescreen.php";
		}
	}
	else if ($_COOKIE["access_code"] == "NRMHGAME") {
		if ($_GET["game"] == "basketball") {
			include "_games/basketball.php";
		}
		else {
			include "_pages/titlescreen.php";
		}
	}
	else {
		include "_pages/betaaccesscode.php";
	}
?>