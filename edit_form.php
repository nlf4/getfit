<?php
require_once "lib/autoload.php";
$css = array("exercise-form.css");
BasicHead($css);
NavBar();

?>
<body>
<p><?php echo $_POST["pkey"]; ?></p>
    <?php
    echo $_POST["pkey"];
    $data = GetData("select * from exercises where exe_id=" . $_GET['id'] );
    $data2 = GetData("select * from options where opt_id=" . $_GET['id'] );
    $template = LoadTemplate("edit_form");
    print ReplaceContent( $data, $template);

    ?>
</body>
</html>