<?php
	$name=$_POST['name'];
	$password=$_POST['password'];

	if ((!isset($name))||(!isset($password) )){
		exit;
	}

	elseif (($name=='name')&&($password='pass')) {
		echo "<h1>here it is<h1>";
		echo "You are in";
	}
	else {
		echo "<h1>go away<h1>";
		echo "you are out";
	}
?>