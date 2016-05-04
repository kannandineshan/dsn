<?php

include("assets/PHP/PHPfunctions.php");

?>


<!DOCTYPE html>
<html lang="en">
<!-- - [START OF HEAD] ============================================================================================= -->
<head>
    <meta charset="UTF-8">

    <title>Add Bugs</title>

    <!-- - CSS Stylesheet- -->
    <link rel="stylesheet" href="assets/CSS/css.css" type="text/css">

</head>
<!-- - [END OF HEAD] ============================================================================================= -->


<!-- - [START OF BODY] ============================================================================================= -->
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


        <!-- (START OF NAV) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        <section class="container-nav" id="nav-showbugs">

            <?php

            include("assets/HTML/navigation.php");

            ?>

        </section>
        <!-- (END OF NAV) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

        <!-- (START OF CONTENT) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        <section class="container-content">
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {

                    $success = $_GET["Success"];

                    if ($success == "Yes") {
                        echo "<SCRIPT>alert('New Bug Has Been Added To The Database!!!');</SCRIPT>";

                    } elseif ($success == "No") {
                        echo "<script>alert('Bug With This Name Already Exists In The Database');</script>";

                    } elseif ($success == null) {
                        ?>
                        <section class="content">

                            <form action="" method="post">

                                <label for="bugname">Bug Name</label>
                                <input required type="text" id="bugname" name="bugname">
                                <br>
                                <label for="bugsummary">Bug Summary</label>
                                <textarea required id="bugsummary" name="bugsummary"></textarea>
                                <br>
                                <label for="bugcategory">Bug Category</label>
                                <select name="bugcategory">
                                    <optionvalue
                                    ="">Select location</option>
                                    <option value="Android">Android</option>
                                    <option value="iOS">iOS</option>
                                    <option value="Windows">Windows</option>
                                </select>
                                <br>
                                <br>
                                <input type="submit" value="Submit" id="submit">

                            </form>

                        </section>
                        <?php
                    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        addbugsdetails();

                    } else {
                        header("Location: index.php");
                    }
                }
            ?>


        </section>
        <!-- (END OF CONTENT) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

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
<!-- - [END OF BODY] ============================================================================================= -->
</html>
