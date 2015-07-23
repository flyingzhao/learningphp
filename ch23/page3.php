<?php
session_start();
echo 'the content of $session[\'sess_var\'] is'.$_SESSION['sess_var'].'<br>';

session_destroy();
?>