<?php
require_once "lib/autoload.php";
$css = array("options.css");
BasicHead($css);
NavBar();
?>
<body>
    <main>
        <div class="container">
            <?php
            $data = GetData("select * from options");
            $template = LoadTemplate("options_template");
            print ReplaceContent( $data, $template);
            ?>
        </div>
    </main>
</body>
</html>
