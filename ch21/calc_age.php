<?php
	$day=18;
	$month=9;
	$year=1972;

	$bdayunix=mktime(0,0,0,$month,$day,$year);
	$nowunix=time();
	$ageunix=$nowunix-$bdayunix;
	$age=floor($ageunix/(365*24*3600));
	echo "age is $age";

?>