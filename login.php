<?php
$login_form = true;
require_once "lib/autoload.php";

//redirect naar profiel als de gebruiker al ingelogd is
if ( isset($_SESSION['usr']) ) {
//    $_SESSION["msg"][] = "You are already logged in!";
    header("Location:".$_application_folder."profile.php"); exit;
}
$css = array("login.css");
BasicHead($css);

?>
<body>

<!--navigatie---------------------->

    <nav>
        <div id="logo"><a href="login.php" title="logo"><img src="img/logo4.svg" alt="getfiT logo" class="logo"></a></div>
        <div id="links">
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </div>
    </nav>
    <?php ShowMessages(); ?>

<!--login form------------------------>

    <div class="container">
        <?php
        print LoadTemplate("login");
        ?>
    </div>

<!--about, contact, footer------------->
    <section data-brackets-id="57" class="testimonials" id="about">
        <h3 data-brackets-id="58" class="title">About Us</h3>
        <p data-brackets-id="60" class="quote">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ipsum nulla eum ab minima sint, quis nemo omnis voluptatum adipisci beatae a amet odit similique, eos at sed dolor! Qui.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias optio nesciunt dolor illo, magni minus amet vero dolorum odit quam. Libero odit, ut unde. </p>
    </section>
    <section data-brackets-id="66" class="contact" id="contact">
        <h3 data-brackets-id="67" class="title">Contact Us</h3>
        <p data-brackets-id="68">If there are any questions you can always contact us at:</p>
        <form data-brackets-id="70">
            <p>email: getfit@gmail.com         <br>     tel: + 32 123 45 67 89 </p>
        </form>
    </section>
    <?php Footer(); ?>
</body>

<!--JS voor input label-------------------->

<script type="text/javascript">
    $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
    });

    $(".txtb input").on("blur",function(){
        if($(this).val() == "")
            $(this).removeClass("focus");
    });

</script>

</html>
