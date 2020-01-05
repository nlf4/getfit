<?php
require_once "autoload.php";
//var_dump($_POST);
//var_dump($_SESSION['usr']['usr_id']);
//var_dump($_POST['exe_id']);

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$afterinsert = $_POST["afterinsert"];
$pkey = $_POST["pkey"];



if ($_POST["savebutton"] == "Save" or $_POST["editsavebutton"] == "Save Changes") {
    $exe_name = htmlentities($_POST['exe_name'], ENT_QUOTES);
    $exe_sets = htmlentities($_POST['exe_sets'], ENT_QUOTES);
    $exe_reps = htmlentities($_POST['exe_reps'], ENT_QUOTES);
    $exe_desc = htmlentities($_POST['exe_desc'], ENT_QUOTES);
    $exe_usr_id = $_SESSION['usr']['usr_id'];
    $exe_cat = htmlentities($_POST['exe_cat'], ENT_QUOTES);

//    if ($_POST["editsavebutton"] == "Save Changes" and $formname == "edit-form") {
//        $sql = "UPDATE exercises SET
//                      exe_name='$exe_name',
//                      exe_sets='$exe_sets',
//                      exe_reps='$exe_reps',
//                      exe_desc='$exe_desc',
//                      exe_usr_id='$exe_usr_id',
//                      exe_cat='$exe_cat'
//                      WHERE exe_id=73";
//
////        $sql = "UPDATE $tablename SET " . implode(", ", $sql_body) . " WHERE $pkey=" . $_POST[$pkey];
//        if (ExecuteSQL($sql)) {
////            echo "update successful";
//            header("Location = https://wdev.be/wdev_nicole/dag2/profile.php?insertOK=true");
////            $new_url = "https://wdev.be/wdev_nicole/dag2/profile.php";
////            $new_url = "https://wdev.be/wdev_nicole/dag2/detail.php?id=" . $_POST[$pkey] . "&updateOK=true";
//        } else {
////            echo "failed to update exercise";
//            header("Location:".$_application_folder."profile.php");
//        }
 //   } else {
        $sql = "INSERT INTO exercises SET 
                      exe_name='$exe_name',
                      exe_sets='$exe_sets',
                      exe_reps='$exe_reps',
                      exe_desc='$exe_desc',
                      exe_usr_id='$exe_usr_id',
                      exe_cat='$exe_cat'";

        if ( ExecuteSQL($sql) )
        {
                header("Location:".$_application_folder."profile.php");
        }
        else
        {
            $_SESSION["msg"][] = "Sorry, something went wrong. Your information was not saved." ;
        }
//        $sql = "INSERT INTO $tablename SET " . implode(", ", $sql_body);
//        if (ExecuteSQL($sql)) $new_url = "https://wdev.be/wdev_nicole/dag2/$afterinsert?insertOK=true";
//        if (ExecuteSQL($sql)) {
////            header("Location:".$_application_folder."profile.php");
//            header("Location = https://wdev.be/wdev_nicole/dag2/profile.php");
////            $_SESSION["msg"][] = "Data inserted successfully";
//
////            header("Location = https://wdev.be/wdev_nicole/dag2/profile.php?insertOK=true");
//        } else {
//            header("Location:".$_application_folder."profile.php");
////            $_SESSION["msg"][] = "Failed to insert data";
//        }
//    }
}




