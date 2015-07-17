<?php
	$isbn=$_POST['isbn'];
	$author=$_POST['author'];
	$title=$_POST['title'];
	$price=$_POST['price'];
?>
<html>
	<head>
		<title>Book-O-Rama Entry Results</title>
	</head>
	<body>
		<h1>Book-O-Rama Entry Results</h1>
		<?php

			if (!$isbn||!$author||!$title||!$price) {
				echo "you did not enter all details";
				exit;
			}
			if (!get_magic_quotes_gpc()) {
				$isbn=addslashes($isbn);
				$author=addslashes($author);
				$title=addslashes($title);
				$price=addslashes($price);
			}
			@$db=new mysqli('localhost','bookorama','bookorama123','books');
			if (mysqli_connect_errno()) {
				echo "Error:can not connect to the database";
				exit;
			}
			$query="insert into books values('".$isbn."','".$author."','".$title."','".$price."')";
			$results=$db->query($query);
			if ($results) {
				echo $db->affected_rows."book insert into databases";
			}
			else{
				echo "An error occured.The item was not added";
			}

			// $db->free;
			$db->close;

		?>
		
	</body>
</html>