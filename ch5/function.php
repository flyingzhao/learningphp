<?php
	function create_table($data){
		echo "<table border=\"1\">\n";
		reset($data);
		$value=current($data);
		while ($value) {
			echo "<tr><td>".$value."</td></tr>\n";
			$value=next($data);
		}
		echo "</table>\n";
	}
	function create_table2($data,$border=1,$cellpadding=4,$cellspacing=4){
		echo "<table border=\"$border\" cellpadding=\"$cellpadding\"cellspacing=\"$cellspacing\">\n";
		reset($data);
		$value=current($data);
		while ($value) {
			echo "<tr><td>".$value."</td></tr>\n";
			$value=next($data);
		}
		echo "</table>\n";
	}
	function var_args(){
		echo "Number of parameters:";
		echo func_num_args();
		echo "<br>";
		$args=func_get_args();
		foreach ($args as $value) {
			echo $value."<br>";
		}
		

	}
?>
<?php
	$my_array= array('line 1.','line 2.','line 3.');
	create_table($my_array);
	create_table2($my_array,3,8,8);
	var_args(1,2,3);
?>