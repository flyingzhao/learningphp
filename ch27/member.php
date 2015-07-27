<?php
//include function files for this application
require_once('bookmark_fns.php');
session_start();

//create short variable names
$username=$_POST['username'];
$passwd=$_POST['passwd'];
if ($username&&$passwd) {
	try {
		login($username,$passwd);
		//login
		$_SESSION['valid_user']=$username;
	} catch (Exception $e) {
		//unsucessful login
		do_html_header('Problem:');
		echo "You could not log in.";
		do_html_url('login.php','login');
		do_html_footer();
		exit;
	}
}
do_html_header('Home');
check_valid_user();
//get bookmark
if ($url_array=get_user_urls($_SESSION['valid_user'])) {
	display_user_urls($url_array);
}
display_user_menu();
do_html_footer();
?>