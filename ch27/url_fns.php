<?php

function add_bm($new_url){
	echo "Attempting to add ".htmlspecialchars($new_url)."<br />";
	$conn=db_connect();
	// check not a repeat bookmark
  	$result = $conn->query("select * from bookmark
                         		where username='".$_SESSION['valid_user']."
                         		and bm_URL='".$new_url."'");
 	if ($result && ($result->num_rows>0)) {
    		throw new Exception('Bookmark already exists.');
  	}
	
	$result=$conn->query("insert into bookmark values('".$_SESSION['valid_user']."','".$new_url."')");
	if (!$result) {
		throw new Exception("Can not query", 1);
		
	}
	return true;
}
function get_user_urls($username){
	//extract from the database all the URLs
	$conn=db_connect();
	$result=$conn->query("select bm_url from bookmark where username='".$username."'");
	if (!$result) {
		return false;
	}
	$url_array=array();
	for ($i=0;$row=$result->fetch_row(); $i++) { 
		$url_array[$i]=$row[0];
	}
	return $url_array;
		
}

?>