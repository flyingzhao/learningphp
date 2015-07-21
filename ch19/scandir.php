<html>
<head>
	<title>Browser directory</title>
</head>
<body>
	<h1>browsing</h1>
	<?php
	$dir=".";
	$file1=scandir($dir);
	$file2=scandir($dir,1);

	echo "<p>Uploading directory is $dir</p>";
	echo "<p>Directory listing in alphabetical order,ascending</p>";
	echo "<ul>";
	foreach ($file1 as $file) {
		if ($file!="."&&$file!="..") {
			echo "<li>$file</li>";
		}
	}
	echo "</ul>";
	echo "<p>Uploading directory is $dir</p>";
	echo "<p>Directory listing in alphabetical order,decending</p>";
	echo "<ul>";

	foreach ($file2 as $file) {
		if ($file!="."&&$file!="..") {
			echo "<li>$file</li>";
		}
	}
	echo "</ul>";

	?>
</body>
</html>