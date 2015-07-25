<?php

require_once('bookmark_fns.php');

$email=$_POST['email'];
$username=$_POST['username'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];

session_start();


try {
	if (!filled_out($_POST)) {
		throw new Exception('You have not filled the form out correctly-Go back and try again');
	}

	if (!valid_email($email)) {
		throw new Exception("That is not a valid email address.");
	}

	if ($passwd!=$passwd2) {
		throw new Exception("The passwords do not match");
	}
	if ((strlen($passwd)<6)||(strlen($passwd)>12) ){
		throw new Exception("Password must between 6 and 12 characters");
	}

	register($username,$email,$passwd);
            
	$_SESSION['valid_user']=$username;

	do_html_header('Registration successful');

	echo "Your registration is successful,Go to the members page to start setting up ypur bookmark";

	do_html_url('member.php','Go to memberpage');

	do_html_footer();

} catch (Exception $e) {
	do_html_header('Problem');
	echo $e->getMessage();
	do_html_footer();
	exit;
}

?>