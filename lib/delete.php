
<?php
require_once "pdo.php";

$tablename = $_POST["tablename"];
$formname = $_POST["formname"];
$afterinsert = $_POST["afterinsert"];
$pkey = $_POST["pkey"];

try {
    $pdo = GetConnection();
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $stmt = $pdo->prepare("DELETE FROM exercises WHERE exe_id=" . $pkey);
    $stmt->bindParam(':id', $pkey);
    $stmt->execute();

    // use exec() because no results are returned
    echo "Record deleted successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$pdo = null;
?>

