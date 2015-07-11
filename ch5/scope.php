<?php
	function fn(){
		$var="content";
	}
	fn();
	echo $var;
?>
<?php
	function fn2(){
		echo "inside the function,\$var=".$var."<br>";
		$var="contents2";
		echo "inside the function,\$var=$var<br>";
	}
	$var="contents1";
	fn2();
	echo "outside the function \$var=".$var."<br>";
?>
<?php
	
	fn3();
	echo "outside the function,\$var=$newvar<br>";
	function fn3(){
		global $newvar;
		$newvar="contents3";
		echo "inside the function,\$var=$newvar<br>";		
	}
?>