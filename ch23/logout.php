<?php
session_start();

$old_user=$_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();
?>
<html>
<body>
	<h1>log out</h1>
	<?php
	if (!empty($old_user)) {
		echo "log out <br>";
	} else {
		echo "you are not log in";
	}
	
	?>
	<a href="authmain.php">back to main page</a>
</body>
</html>