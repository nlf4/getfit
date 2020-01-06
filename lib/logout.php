<?php
//unset sessie als gebruiker uitlogt
session_start();
session_destroy();
unset($_SESSION);

session_start();
session_regenerate_id();
//$_SESSION["msg"][] = "You have been logged out!";
header("Location: https://wdev.be/wdev_nicole/dag2/login.php");
?>