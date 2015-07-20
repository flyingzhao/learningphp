<?php
	$name=$_POST['name'];
	$password=$_POST['password'];

	//sha1
	echo Sha1('password');
	if ((!isset($name))||(!isset($password) )){
		exit;
	}

	else {

		$mysql=mysqli_connect('localhost','bookorama','bookorama123','books');
		if (!$mysql) {
			echo "Can not open the database";
			exit;
		}
		// $selected=mysqli_select_db($mysql,"books");
		// if (!$selected) {
		// 	echo "Could not select database";
		// 	exit;
		// }
	
		$query="select  count(*) from users where name='".$name."' and password='".$password."'";
		$result=mysqli_query($mysql,$query);

		if (!$result) {
			echo "Could not query";
			exit;
		}
		$row=mysqli_fetch_row($result);
		$count=$row[0];
		if ($count>0) {
		echo "<h1>here it is<h1>";
		echo "You are in";
		}
		else {
		echo "<h1>go away<h1>";
		echo "you are out";
		}



	}
?>