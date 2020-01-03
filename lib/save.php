<?php
require_once "autoload.php";
//var_dump($_POST);

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$afterinsert = $_POST["afterinsert"];
$pkey = $_POST["pkey"];

$exe_name = htmlentities($_POST['exe_name'], ENT_QUOTES);
$exe_sets = htmlentities($_POST['exe_sets'], ENT_QUOTES);
$exe_reps = htmlentities($_POST['exe_reps'], ENT_QUOTES);
$exe_desc = htmlentities($_POST['exe_desc'], ENT_QUOTES);
$exe_usr_id = $_SESSION['usr']['usr_id'];
$exe_cat = htmlentities($_POST['exe_cat'], ENT_QUOTES);

if ($_POST["savebutton"] == "Save") {
    $sql_body = array();
    //key-value pairs samenstellen
    foreach ($_POST as $field => $value) {
        if (in_array($field, array("tablename", "formname", "afterinsert", "pkey", "savebutton", $pkey))) continue;
        $sql_body[] = " $field = '" . htmlentities($value, ENT_QUOTES) . "' ";
    }
    if ($_POST[$pkey] > 0) //update
    {
        $sql = "UPDATE $tablename SET " . implode(", ", $sql_body) . " WHERE $pkey=" . $_POST[$pkey];
//        if (ExecuteSQL($sql)) $new_url = "https://wdev.be/wdev_nicole/dag2/profile.php";
       if (ExecuteSQL($sql)) $new_url = "https://wdev.be/wdev_nicole/dag2/detail.php?id=" . $_POST[$pkey] . "&updateOK=true";
    } else //insert
    {
        $sql =  "INSERT INTO $tablename SET " .
            " exe_name='" . $exe_name  . "' , " .
            " exe_sets='". $exe_sets ."' , " .
            " exe_reps='" . $exe_reps . "' , " .
            " exe_desc='" . $exe_desc . "' , " .
            " exe_usr_id='" . $exe_usr_id . "' , " .
            " exe_cat='" . $exe_cat . "' , ";


        $sql = "INSERT INTO $tablename SET " . implode(", ", $sql_body);
        if (ExecuteSQL($sql)) $new_url = "https://wdev.be/wdev_nicole/dag2/$afterinsert?insertOK=true";
    }
//    print $sql;
    header("Location: $new_url");
}

//if ($_POST["editsavebutton"] == "Save Changes") {
//    $sql_body = array();
//    //key-value pairs samenstellen
//    foreach ($_POST as $field => $value) {
//        if (in_array($field, array("tablename", "formname", "afterinsert", "pkey", "savebutton", $pkey))) continue;
//        $sql_body[] = " $field = '" . htmlentities($value, ENT_QUOTES) . "' ";
//    }
//    if ($_POST[$pkey] > 0) //update
//    {
//        $sql = "UPDATE $tablename SET " .
//            " exe_name='" . htmlentities($_POST['exe_name'], ENT_QUOTES) . "' , " .
//            " exe_img='" . htmlentities($_POST['exe_img'], ENT_QUOTES) . "' , " .
//            " exe_desc='" . htmlentities($_POST['exe_desc'], ENT_QUOTES) . "' , " .
//            " exe_sets='" . htmlentities($_POST['exe_sets'], ENT_QUOTES) . "' , " .
//            " exe_reps='" . htmlentities($_POST['exe_reps'], ENT_QUOTES) . "'
//            WHERE exe_id=" . $_POST['pkey'];
//        if (ExecuteSQL($sql)) {
////            $_SESSION["msg"][] = "Updated successfully!";
////            header("location:" . $_application_folder . "profile.php");
//            echo 'success';
//        } else {
////            $_SESSION["msg"][] = "Failed to update";
////            header("location:" . $_application_folder . "profile.php");
//            echo 'something went wrong';
//        }
//    }
////    {
////        $sql = "UPDATE $tablename SET " . implode(", ", $sql_body) . " WHERE $pkey=" . $_POST[$pkey];
////        if (ExecuteSQL($sql)) $new_url = "https://wdev.be/wdev_nicole/dag2/detail.php?id=" . $_POST[$pkey] . "&updateOK=true";
////    } else //insert
////    {
////        $sql = "INSERT INTO $tablename SET " . implode(", ", $sql_body);
////        if (ExecuteSQL($sql)) $new_url = "https://wdev.be/wdev_nicole/dag2/$afterinsert?insertOK=true";
////    }
////
//////    print $sql;
////    header("Location: $new_url");
//}





