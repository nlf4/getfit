<?php
$login_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "login_form" AND $buttonvalue == "Log in" )
{
    if ( CheckLogin( $_POST['usr_email'], $_POST['usr_password'] ) )
    {
        $_SESSION["msg"][] = "Welcome, " . $_SESSION['usr']['usr_email'] . "!" ;
//        header("Location: https://wdev.be/wdev_nicole/dag2/profile.php");
        header("Location:".$_application_folder."profile.php");
    }
    else
    {
        $_SESSION["msg"][] = "Sorry! Wrong password!";
        header("Location:".$_application_folder."login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Wrong formname or buttonvalue";
}
?>