<html>
<head>
	<title>Browser directory</title>
</head>
<body>
	<h1>browsing</h1>
	<?php
	$currentdir=".";
	$dir=opendir($currentdir);
	echo "<p>Upload directory is $currentdir</p>";
	echo "<p>directory list:</p><ul>";

	while (($file=readdir($dir))!==false) {
		if ($file!="."&&$file!="..") {
			echo "<li>$file</li>";
			echo "<a href=\"filedetails.php?file=".$file."\">".$file."</a><br />";
			// echo '<a href="filedetails.php?file='.$file.'">'.$file.'</a><br>';
		}
		// echo "<li>$file</li>";
	}
	echo "</ul>";
	closedir($dir);
	?>
</body>
</html>