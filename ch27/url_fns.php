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
		throw new Exception("Can not query");
		
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

function delete_bm($username,$url){
	//delete from database
	$conn=db_connect();
	$query="delete from bookmark where username='".$username."' and bm_url='".$url."'";
	// echo $query;

	$result=$conn->query($query);
	if (!$result) {
		throw new Exception("Bookmark could not deleted");
	}
	return true;
}

function recommend_urls($valid_user,$popularity=1){
	//we will provide semi intelligent recommendations to people
	//if they have an url in common with other users,they may like
	//other URLs that people like

	$conn=db_connect();

	$query="select bm_URL
		from bookmark
		where username in
			(select distinct(b2.username)
			from bookmark b1,bookmark b2
			where b1.username='".$valid_user."'
			and b1.username!=b2.username
			and b1.bm_URL=b2.bm_URL)
		and bm_URL not in
			(select bm_URL
			from bookmark 
			where username='".$valid_user."')
		group by bm_URL
		having count(bm_URL)>".$popularity;
	if(!($result=$conn->query($query))){
		throw new Exception("Could not query");
	}

	if ($result->num_rows==0) {
		throw new Exception("No bookmark to recommend");
	}

	$urls = array();
	for ($i=0; $row=$result->fetch_object(); $i++) { 
		$urls[$i]=$row->bm_URL;
	}
	return $urls;
}

?>