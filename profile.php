<?php
require_once "lib/autoload.php";
$css = array("profile.css");
BasicHead($css);

?>
<body>
<a href="login.php"><img src="img/logo4.svg" alt="getfiT logo" id="svg-logo"></a>
<div class="container">
    <div class="band">
        <a href="#"><img id="user-icon" src="img/user-icon.JPG" alt="user-icon"></a>
        <?php
//        $data = GetData("select * from users where usr_id=" . $_GET['id'] );
//        $template = LoadTemplate("profile_greeting");
//        print ReplaceContent( $data, $template);
        $name = $_SESSION['usr']['usr_firstname'];
//        $name = strtok($string, '@');
        $_SESSION["msg"][] = "Welcome, " . $name . "!" ;
        ShowMessages();
        ?>

        <form method="post" action="lib/logout.php" id="logout-form">

            <input type="hidden" id="formname" name="formname" value="logout_form">
            <input type="hidden" id="afterinsert" name="afterinsert" value="login.php">
            <input type="hidden" id="tablename" name="tablename" value="users">
            <input type="hidden" id="pkey" name="pkey" value="usr_id">
            <input id="logout-btn" name="logoutbutton" type="submit" value="Log Out">
        </form>

    </div>
    <div id="trap">
    </div>
    <div class="headings">
        <div class="workout-heading">
            <h2>Workouts</h2>
        </div>
        <div class="exercise-heading">
            <h2>Exercises</h2>
        </div>
    </div>
    <section>

        <div class="col workout-column">
            <ul>
                <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, mollitia.</a></li>
                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
                <li><a href="#">Lorem ipsum dolor sit amet.</a></li>
            </ul>
            <input id="add-btn" type="submit" value="+">
        </div>
        <div class="col exercise-column">
            <ul>
                <?php
                $data = GetData("select * from exercises");
                $template = LoadTemplate("profile");
                print ReplaceContent( $data, $template);
                ?>
            </ul>
            <input id="add-btn" type="submit" value="+" onclick="location.href='options.php';">
        </div>
    </section>
</div>

</body>
</html>
