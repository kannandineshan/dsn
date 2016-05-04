<?php


include("assets/PHP/PHPfunctions.php");

?>


<!DOCTYPE html>
<html lang="en">

<!-- - [START OF HEAD] ============================================================================================= -->
    <head>
        <meta charset="UTF-8">

        <title>Index</title>

        <!-- - CSS Stylesheet- -->
        <link rel="stylesheet" href="assets/CSS/css.css" type="text/css">

    </head>
    <!-- - [END OF HEAD] =========================================================================================== -->


    <!-- - [START OF BODY] ========================================================================================= -->
    <body>

    <!-- (START OF HEADER) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <header>
        <section class="container" id="head">

            <?php

            include("assets/HTML/header.php");

            ?>

        </section>
    </header>
    <!-- (END OF HEADER) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->



    <!-- (START OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <main>

        <section class="container" id="main">


            <!-- (START OF NAV) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - -->
            <section class="container-nav" id="nav-showbugs">

                <?php

                include("assets/HTML/navigation.php");

                ?>

            </section>
            <!-- (END OF NAV) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

            <!-- (START OF CONTENT) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
            <section class="container-content">

                <section class="content">

                    <p>
                        Suspendisse non lacinia lectus. Fusce pharetra eleifend velit, a vulputate sapien eleifend et.
                        In vehicula tempor est, vitae fringilla metus laoreet ut.
                        Fusce iaculis eu diam congue tempus.
                        Cras consequat mi id eros consequat, sed accumsan ipsum facilisis. Cras semper, lorem et eleifend
                        placerat, lorem ex varius eros, at scelerisque lectus lacus nec risus.
                    </p>

                </section>

            </section>
            <!-- (END OF CONTENT) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        </section>

    </main>
    <!-- (END OF MAIN) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

    <!-- (START OF FOOTER) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <footer>

        <section class="container" id="footer">

            <?php

            include("assets/HTML/footer.php");

            ?>

        </section>

    </footer>
    <!-- (END OF FOOTER) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

    </body>
    <!-- - [END OF BODY] =========================================================================================== -->

</html>
