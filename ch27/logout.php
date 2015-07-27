<?php
//include files for this application
require_once('bookmark_fns.php');
session_start();
$old_user=$_SESSION['valid_user'];

unset($_SESSION['valid_user']);
$result_dest=session_destroy();

do_html_header('Logging out');

if (!empty($old_user)) {
	if ($result_dest) {
		echo "Log out<br>";
		do_html_url('login.php','Login');
	} else {
		echo "Could not log you out<br>";
	}
	
} else {
	echo "You were not logged in bu come to this page somehow.<br>";
	echo "You were not log in,so you don not have to log out<br>";
	do_html_url('login.php','Login');
	}

do_html_footer();

?>