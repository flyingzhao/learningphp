<?php
chdir('.');
///exec version
echo "<pre>";
//unix
exec('ls -a',$result);
//windows
foreach ($result as $line) {
	echo "$line\n";
}
echo "</pre>";
echo "<br><hr><br>";

//paathru version
echo "<pre>";
//unix
passthru('ls -a');
echo "</pre>";
echo "<br><hr><br>";
//system version
echo "<pre>";
$result=system('ls -a');
echo "</pre>";
echo "<br><hr><br>";
//backtricks version
echo "<pre>";
$result=`ls -a`;
echo $result;
echo "</pre>";

?>