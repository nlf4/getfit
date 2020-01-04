<?php
$register_form = true;
require_once "lib/autoload.php";
$css = array("register.css");
BasicHead($css);
//NavBar();
?>
    <body>
        <nav>
            <div id="logo"><a href="login.php" title="logo"><img src="/img/logo1.svg" alt="Logo van de site" class="logo"></a></div>
            <div id="links">
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </div>
        </nav>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-12">
                        <div id="login-box" class="col-md-12">
                            <?php
//                            $data = GetData("select * from users");
//                            $template = LoadTemplate("login");
//                            ReplaceContent( $data, $template);
                            print LoadTemplate("register");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php Footer(); ?>
    </body>
</html>


