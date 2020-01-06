<?php
require_once "lib/autoload.php";
$css = array("detail.css");
BasicHead($css);
NavBar();
?>
<body>
    <?php
    $data = GetData("select * from exercises where exe_id=" . $_GET['id'] );
    $template = LoadTemplate("detail");
    print ReplaceContent( $data, $template);
    ?>
</body>
</html>
