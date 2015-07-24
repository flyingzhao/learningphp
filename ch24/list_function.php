<?php
	echo "function sets supported in this install are <br>";
	$extensions=get_loaded_extensions();
	foreach ($extensions as $ext) {
		echo "$ext<br>";
		echo "<ul>";
		$ext_func=get_extension_funcs($ext);
		foreach ($ext_func as $fuc) {
			echo "<li>$fuc</li>";
		}
		echo "</ul>";

	}
?>