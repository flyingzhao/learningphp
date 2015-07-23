<?php
session_start();
if (isset($_POST['userid'])&&isset($_POST['password']) ){
	$userid=$_POST['userid'];
	$password=$_POST['password'];
	
	$db_conn=new mysqli('localhost','bookorama','bookorama123','books');

	if (mysqli_connect_errno()) {
		echo "connect failed";
		exit;
	}

	// $query="select * from users where name='".$userid."'and password='".sha1('$password')."'";
	$query="select * from users ".
		"where name='".$userid."' and "
		."password=sha1('".$password."')";
	
	$result=$db_conn->query($query);
	if ($result->num_rows) {
		$_SESSION['valid_user']=$userid;
	}
	$db_conn->close();
	}
?>

<html>
<head>
	<title>log in</title>
</head>
<body>
	<h1>Home Page</h1>
	<?php
	if (isset($_SESSION['valid_user'])) {
		echo "You are log in as ".$_SESSION['valid_user']."<br>";
		echo "<a href=\"logout.php\">log out</a><br>";
	}
	else{
		if (isset($userid)) {
			echo "could not log in<br>";
		} else {
			echo "you are not log in<br>";
		}
		
	}
	
	echo	"<form method=\"post\"action=\"authmain.php\">";
	echo	"<p>Username:<input name=\"userid\"type=\"text\"></p>";
	echo	"<p>Password:<input name=\"password\"type=\"text\"></p>";
	echo	"<p><input type=\"submit\" value=\"Log In\"></p>";
	echo	"</form>";
	
	?>
	<br>
	<a href="members_only.php">Members section</a><br>
</body>
</html>