<?php
session_start();
echo "<h1>member only</h1>";
if (isset($_SESSION['valid_user'])) {
	echo "You are log in as".$_SESSION['valid_user']."<br>";
	echo "Member only";
} else {
	echo "You are not log in";
}
echo "<a href=\"authmain.php\"";
?>