<?php
require_once "autoload.php";
//var_dump($_POST);
//var_dump($_SESSION['usr']['usr_id']);

//print json_encode($_FILES);

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
    $exe_id = htmlentities($_POST['exe_id'], ENT_QUOTES);

    // behandling van afbeelding --------------------------

    $exe_img = $_FILES['exe_img'];
    $exe_img_name = $exe_img['name'];
    $img_path = '../img/' . $exe_img_name;

    $img_name = $_FILES['name'];
    $img_type = $_FILES['type'];
    $img_tmp = $_FILES['tmp_name'];
    $img_error = $_FILES['error'];
    $img_size = $_FILES['size'];


    $path_parts = pathinfo($img_path);
    $img_ext = $path_parts['extension'];

    move_uploaded_file($exe_img['tmp_name'], $img_path);

    if ((empty($_POST['exe_name'])) or empty($_POST['exe_desc'])) {
        header("Location:" . $_application_folder . "exercise_form.php?id=1");
        $_SESSION["msg"][] = "Sorry, you need to enter a name and description.";
        die();
    }

//    if(empty($_FILES[$exe_img])){
//        header("Location:" . $_application_folder . "exercise_form.php?id=1");
//        $_SESSION["msg"][] = "Sorry, you need to upload an image.";
//        die();
//    }
//    and ($img_ext === 'jpg' or $img_ext === 'png')

    // controleer file fout, extensie en grootte
    if (($_FILES['exe_img']['error'] == 0) and ($_FILES['exe_img']['size'] < 4000000)) {

        //    insert --------------------------------

        if ($_POST["savebutton"] == "Save") {

            $sql = "INSERT INTO exercises SET 
                          exe_name='$exe_name',
                          exe_img='$exe_img_name',
                          exe_sets='$exe_sets',
                          exe_reps='$exe_reps',
                          exe_desc='$exe_desc',
                          exe_usr_id='$exe_usr_id',
                          exe_cat='$exe_cat'";

            if (ExecuteSQL($sql)) {
                header("Location:" . $_application_folder . "profile.php");
            } else {
                $_SESSION["msg"][] = "Sorry, your information was not saved.";
            }
        }

        //        update ----------------------------

        elseif ($_POST["editsavebutton"] == "Save Changes") {

            $exe_img = $_FILES['exe_img2'];
            $exe_img_name = $exe_img['name'];
            $img_path = '../img/' . $exe_img_name;

            move_uploaded_file($exe_img['tmp_name'], $img_path);

            $sql = "UPDATE exercises SET
                          exe_name='$exe_name',
                          exe_sets='$exe_sets',
                          exe_reps='$exe_reps',
                          exe_desc='$exe_desc',
                          exe_usr_id='$exe_usr_id',
                          exe_cat='$exe_cat'
                          WHERE exe_id='$exe_id'";
            if (ExecuteSQL($sql)) {
                header("Location:" . $_application_folder . "profile.php");
            } else {
                $_SESSION["msg"][] = "Sorry, your information was not updated.";
            }
        }
    } else {
        if ($_FILES['exe_img']['size'] > 2000000) {
            // error
            header("Location:" . $_application_folder . "exercise_form.php?id=1");
            $_SESSION["msg"][] = "Sorry, the uploaded file exceeds the maximum size.";
            die();
        }
        if (!($img_ext === 'jpg' or $img_ext === 'png')) {
            header("Location:" . $_application_folder . "exercise_form.php?id=1");
            $_SESSION["msg"][] = "Sorry, the uploaded file type is not accepted.";
        } else {
            header("Location:" . $_application_folder . "profile.php");
        }
    }
}






















//
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





