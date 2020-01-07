<?php
require_once "autoload.php";
//var_dump($_POST);
//var_dump($_GET);

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$afterinsert = $_POST["afterinsert"];
$pkey = $_POST["pkey"];
$exe_usr_id = $_SESSION['usr']['usr_id'];

if ($_POST["editbutton"] == "Edit") {
    $sql_body = array();

    //key-value pairs samenstellen
    foreach ($_POST as $field => $value) {
        if (in_array($field, array("tablename", "formname", "afterinsert", "pkey", "savebutton", $pkey))) continue;

        $sql_body[] = " $field = '" . htmlentities($value, ENT_QUOTES) . "' ";
    }

    if ($_POST[$pkey] > 0) //update
    {
        $sql = "UPDATE $tablename SET " . implode(", ", $sql_body) . " WHERE $pkey=" . $_POST[$pkey];
        if (ExecuteSQL($sql)) $new_url = "wdev_nicole/dag2/$formname.php?id=" . $_POST[$pkey] . "&updateOK=true";
    } else {
        print "Exercise not found.";
    }
    print $sql;
    header("Location: $new_url");
}

if ($_POST["deletebutton"] == "Delete") {

//    $data = GetData("SELECT * FROM exercises WHERE exe_id=$pkey");

    $sql = "DELETE from exercises WHERE exe_id=$pkey and exe_usr_id=$exe_usr_id";
    if(ExecuteSQL($sql)) {
        header("Location:".$_application_folder."profile.php");
    } else {
        echo 'Deletion error';
        header("Location:".$_application_folder."detail.php");
    }
























//    try {
//        $pdo = GetConnection();
//        // set the PDO error mode to exception
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        // sql to delete a record
//        $stmt = $pdo->prepare("DELETE FROM exercises WHERE id= :id");
//        $stmt->bindParam(':id', $pkey);
//        $stmt->execute();
//
//        // use exec() because no results are returned
//        echo "Record deleted successfully";
//    } catch (PDOException $e) {
//        echo $sql . "<br>" . $e->getMessage();
//    }
//
//    $pdo = null;

}

////////////////////
//if ($_POST["deletebutton"] == "Delete") {
//    try {
//        $conn = GetConnection();
//        // set the PDO error mode to exception
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        // sql to delete a record
//        $sql = "DELETE FROM $tablename WHERE $pkey=" . $_GET[$pkey];
//
//        // use exec() because no results are returned
//        $conn->exec($sql);
//        echo "Record deleted successfully";
//        if (ExecuteSQL($sql)) $new_url = "wdev_nicole/dag2/$afterinsert?insertOK=true";
//
//    } catch (PDOException $e) {
//        echo $sql . "<br>" . $e->getMessage();
//    }
//
//    $conn = null;
//    print $sql;
//    header("Location: $new_url");

    /////////////////////////////////////

        ///
//        $sql = "DELETE FROM $tablename WHERE $pkey=" . $_GET[$pkey];
//        if (ExecuteSQL($sql)) $new_url = "wdev_nicole/dag2/$afterinsert?insertOK=true";



///////
//
//try {
//    $conn = GetConnection();
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    // sql to delete a record
//    $sql = "DELETE FROM $tablename WHERE $pkey=" . $_GET[$pkey];
//
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "Record deleted successfully";
//    if (ExecuteSQL($sql)) $new_url = "wdev_nicole/dag2/$afterinsert?insertOK=true";
//
//} catch (PDOException $e) {
//    echo $sql . "<br>" . $e->getMessage();
//}
//
//$conn = null;
