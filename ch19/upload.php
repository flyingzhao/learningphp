<html>
	<head>
		<title>Uploading</title>
	</head>
	<body>
		<h1>Uploading file....</h1>
		<?php

			if ($_FILES['userfile']['error']>0) {
				echo "Problem";
				switch ($_FILES['userfile']['error']) {
					case '1':
						echo "file exceed upload max filesize";
						break;
					case '2':
						echo "file exceeded max file size";
						break;
					case '3':
						echo "file only partially upload";
						break;
					case '4':
						echo "cannot upload file:no temp directory specified";
						break;
					case '7':
						echo "upload failed:cannot write to disk";
						break;
					default:
		
						break;
				}
				exit;
				}

				//Does the file have the right MIME type?
				if ($_FILES['userfile']['type']!='text/plain') {
					echo "Problem:file is not a plain text";
					exit;
				}
				//put the file where we'd like it
				$upfile="./uploads/".$_FILES['userfile']['name'];
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
					if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile)) {
						echo "Problem:could not move file to destination directory";
						exit;
					}
				}
				else{
					echo "Problem:possible file uploaded attack.Filename:";
					echo $_FILES['userfile']['name'];
					exit;
				}
				echo "file upload successfully";

				//remove possible HTML and php tags from file contents
				$contents=file_get_contents($upfile);
				$contents=strip_tags($contents);
				file_put_contents($_FILES['userfile']['name'], $contents);

				//show what was uploaded
				echo "<p>Preview of uploaded file contents<br /><hr />";
				echo nl2br($contents);
				echo "<br/><hr/>";

		?>
	</body>
</html>