<?php
function db_connect(){
	$result=new mysqli('localhost','bm_user','password','bookmark');
	if (!$result) {
		throw new Exception("Could not connect to database");
	}
	else{
		return $result;
	}
}
?>