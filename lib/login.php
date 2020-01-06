<?php
$login_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "login_form" AND $buttonvalue == "Log in" )
{
    if ( CheckLogin( $_POST['usr_email'], $_POST['usr_password'] ) )
    {
        //login successful
//        $string = $_SESSION['usr']['usr_firstname'];
//        $_SESSION["msg"][] = "Welcome, " . $name . "!" ;
        header("Location:".$_application_folder."profile.php");
    }
    else
    {
        //foutmelding
        $_SESSION["msg"][] = "Sorry! Wrong password!";
        header("Location:".$_application_folder."login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Wrong formname or buttonvalue";
}
?>