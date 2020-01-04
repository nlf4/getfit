<?php
require_once "autoload.php";

$tablename = $_POST["tablename"];
$pkey = $_POST["pkey"];
$searchterm = $_POST["search"];

$sql = "SELECT exe_name FROM exercises WHERE `exe_name` LIKE %" . $searchterm . "%";
$rows = GetData($sql);
foreach ($rows as $row) {
    echo "<div id='link' onClick='addText(\"".$row['exe_name']."\");'>" . $row['exe_name'] . "</div>";
}


?>