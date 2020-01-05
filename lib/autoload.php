<?php
session_start();
$_SESSION["head_printed"] = false;

$_application_folder = "/wdev_nicole/dag2/";

require_once "pdo.php";
require_once "view_functions.php";
require_once "pword.php";
require_once "authorisation.php";
require_once "show_messages.php";




//redirect naar NO ACCESS pagina als de gebruiker niet ingelogd is en niet naar
//de loginpagina gaat
if ( ! isset($_SESSION['usr']) AND ! $login_form AND ! $register_form AND ! $no_access)
{
    header("Location:".$_application_folder."login.php");
}
