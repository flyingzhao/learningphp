<?php
require_once('bookmark_fns.php');
session_start();

//create short variable names
$del_me=$_POST['del_me'];
$valid_user=$_SESSION['valid_user'];

do_html_header('Deleting bookmark');
check_valid_user();

if (!filled_out($_POST)) {
	echo "<p>You have chosen no bookmarks to delete<br>Try later</p>";
	display_user_menu();
	do_html_footer();

} else {
	if (count($del_me)>0) {
		foreach ($del_me as $del) {
			if (delete_bm($valid_user,$del)) {
				echo "delete ".htmlspecialchars($del)."<br/>";
				// echo "delete ".$del."<br/>";
			} else {
				echo "Could not delete ".htmlspecialchars($del)."<br>";
			}
			
		}
		
	} else {
		echo "No bookmarks selected for deletion";
	}
}

//get the bookmarks this user have saved
if ($url_array=get_user_urls($valid_user)) {
	display_user_urls($url_array);
}
display_user_menu();
do_html_footer();


?>