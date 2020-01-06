<?php
require_once "lib/autoload.php";
$css = array("exercise-form.css");
BasicHead($css);
NavBar();

?>
    <body>
    <p id="file-message"><?php ShowMessages(); ?></p>
        <?php
            $data = GetData("select * from options where opt_id=" . $_GET['id'] );
            $template = LoadTemplate("exercise_form_template");
            print ReplaceContent( $data, $template);

        ?>

    </body>
</html>
