<?php
session_start();
echo 'the content of $session[\'sess_var\'] is'.$_SESSION['sess_var'].'<br>';

unset($_SESSION['sess_var']);
?>
<a href="page3.php">next page</a>