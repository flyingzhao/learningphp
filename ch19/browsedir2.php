<html>
<head>
	<title>Browser directory</title>
</head>
<body>
	<h1>browsing</h1>
	<?php
	$dir=dir(".");
	echo "<p>Handle is $dir->handle</p>";
	echo "<p>Upload directory is $dir->path</p>";
	echo "<p>Directory Listing:</p><ul>";
	while (false!==($file=$dir->read())) {
		if ($file!="."&&$file!="..") {
			echo "<li>$file</li>";
		}
	}
	echo "</ul>";
	$dir->close();
	?>
</body>
</html>