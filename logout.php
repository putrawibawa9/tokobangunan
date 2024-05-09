<?php 
// Fitur logout
session_start();
session_destroy();
header("location: formLogin.php");

?>