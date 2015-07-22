<?php
echo date('jS F Y');
echo "<br>";
echo date('H:i:s a l');
echo "<br>";
$timestamp=mktime();
echo $timestamp;
echo "<br>";
$timestamp=time();
echo $timestamp;
echo "<br>";
$today=getdate();
print_r($today);
echo "<br>";
echo checkdate(2, 29, 2008);
// echo checkdate(2, 29, 2009);
echo "<br>";
echo strftime('%A <br />');
echo strftime('%a <br />');
echo strftime('%x <br />');
echo strftime('%c <br />');
echo strftime('%Y <br />');

?>