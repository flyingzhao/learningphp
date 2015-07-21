<html>
<head>
	<title>File details</title>
</head>
<body>
	<?php
	$currentdir=".";
	$file=$_GET['file'];
	$file=basename($file);
	echo "<h1>detail of file:$file</h1>";
	echo "<h2>File data</h2>";
	echo "file last accessed:".date('j F Y H:i',fileatime($file))."<br />";
	echo "file last modified".date('j F Y H:i',filemtime($file))."<br />";

	$user=posix_getpwuid(fileowner($file));
	echo "file owner:".$user['name']."<br />";

	$group=posix_getgrgid(filegroup($file));
	echo "file group:".$group['name']."<br/>";

	echo "file permissions:".decoct(fileperms($file))."<br/>";
	echo "file type:".filetype($file)."<br />";
	echo "file size:".filesize($file)."bytes<br />";

	echo "<h2>file tests</h2>";

	echo "is_dir: ".(is_dir($file)?'ture':'false')."<br/>";
	echo "is_executable: ".(is_executable($file)?'ture':'false')."<br/>";
	echo "is_file: ".(is_file($file)?'ture':'false')."<br/>";
	echo "is_link: ".(is_link($file)?'ture':'false')."<br/>";
	echo "is_readable: ".(is_readable($file)?'true':'false')."<br />";
	echo "is_wrireable: ".(is_writable($file)?'ture':'false')."<br/>";

	?>
</body>
</html>