<?php
require_once('bookmark_fns.php');
session_start();
$new_url=$_POST['new_url'];
do_html_header('Adding bookmarks');
try {
	check_valid_user();
	if (!filled_out($POST)) {
		throw new Exception("Form not completely filled out");	
	} 

	if (strstr($new_url, 'http://')===false) {
		$new_url="http://".$new_url;
	} 

	if (!(@fopen($new_url, 'r'))) {
		throw new Exception("Not valid URL");
	}

	add_bm($new_url);
	echo "Bookmark added";
	
	if ($url_array=get_user_urls($_SESSION['valid_user'])) {
		display_user_urls($url_array);
	}

} catch (Exception $e) {
	echo $e->getMessage();	
}
display_user_menu();
do_html_footer();

?>