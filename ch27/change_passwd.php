<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Change Password');

//create short variable names
$old_passwd=$_POST['old_passwd'];
$new_passwd=$_POST['new_passwd'];
$new_passwd2=$_POST['new_passwd2'];

try {
	check_valid_user();
	if (!filled_out($POST)) {
		throw new Exception("You have not filled put the form completely.");
	}
	if ($new_passwd!=$new_passwd2) {
		throw new Exception("Passwords are not same");
	}
	if ((strlen($new_passwd)>16)||(strlen($new_passwd)<6)) {
		throw new Exception("New password should be between 6 and 16");
	}
	change_password($_SESSION['valid_user'],$old_passwd,$new_passwd);
	echo "Password Changed<br>";
} catch (Exception $e) {
	echo $e->getMessage();
}
display_user_menu();
do_html_footer();

?>