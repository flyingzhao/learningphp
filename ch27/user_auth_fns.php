<?php
function register($username,$email,$password){

	$conn=db_connect();
	$result=$conn->query("select * from user where username='".$username."'");
	if (!$result) {
		throw new Exception("Could not query");
	}
	if ($result->num_rows>0) {
		throw new Exception("your name has been registered");
	}
	$query="insert into user values('".$username."',sha1('".$password."'),'".$email."')";
	$result=$conn->query($query);
	if (!$result) {
		throw new Exception("Could not register you in the database");
	}
	return true;
}

?>