<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Recommend URLs');
try {
	check_valid_user();
	$urls=recommend_urls($_SESSION['valid_user']);
	display_recommend_urls();
} catch (Exception $e) {
	echo $e->getMessage;
}
diaplay_user_menu();
do_html_footer();
?>