<?php
/**
 * Created by PhpStorm.
 * User: chukwudiezekwesili
 * Date: 29/03/2016
 * Time: 13:42
 */
//THIS PAGE IS DESTINATION FOR ADMIN WHEN LOGGED IN AND TRYING TO ACCESS INDEX.PHP, AND WHEN CLICKING LINKS LEADING HERE
include 'functions.php';
//If no session exists, admin is sent to index.php
session_start();
if(!isset($_SESSION['ad_email'])){
    header("Location: index.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Administrator</title>
    <link rel="stylesheet" href="../Chukwudi/cssadminpage/screen.css" type="text/css" media="screen" title="default" />

    <link rel="stylesheet" media="all" type="text/css" href="../Chukwudi/cssadminpage/pro_dropline_ie.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--  jquery core -->
    <script src="../Chukwudi/jsadminpage/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

    <!--  styled select box script version 2 -->
    <script src="../Chukwudi/jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
            $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
        });
    </script>

    <!--  styled select box script version 3 -->
    <script src="../Chukwudi/jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
        });
    </script>

    <!--  styled file upload script -->
    <script src="../Chukwudi/jsadminpage/jquery/jquery.filestyle.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $("input.file_1").filestyle({
                image: "images/forms/upload_file.gif",
                imageheight : 29,
                imagewidth : 78,
                width : 300
            });
        });
    </script>


    <!--  date picker script -->
    <link rel="stylesheet" href="../Chukwudi/cssadminpage/datePicker.css" type="text/css" />
    <script src="../Chukwudi/jsadminpage/jquery/date.js" type="text/javascript"></script>
    <script src="../Chukwudi/jsadminpage/jquery/jquery.datePicker.js" type="text/javascript"></script>
    <script type="text/javascript" charset="utf-8">
        $(function()
        {

// initialise the "Select date" link
            $('#date-pick')
                .datePicker(
                    // associate the link with a date picker
                    {
                        createButton:false,
                        startDate:'01/01/2005',
                        endDate:'31/12/2020'
                    }
                ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

            var updateSelects = function (selectedDate)
            {
                var selectedDate = new Date(selectedDate);
                $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                $('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
            }
// listen for when the selects are changed and update the picker
            $('#d, #m, #y')
                .bind(
                    'change',
                    function()
                    {
                        var d = new Date(
                            $('#y').val(),
                            $('#m').val()-1,
                            $('#d').val()
                        );
                        $('#date-pick').dpSetSelected(d.asString());
                    }
                );

// default the position of the selects to today
            var today = new Date();
            updateSelects(today.getTime());

// and update the datePicker to reflect it...
            $('#d').trigger('change');
        });
    </script>



</head>
<body>
<!-- Start: page-top-outer -->
<div id="page-top-outer">

    <!-- Start: page-top -->
    <div id="page-top">



        <div class="clear"></div>

    </div>
    <!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
    <!--  start nav-outer -->
    <div class="nav-outer">

        <!-- start nav-right -->
        <div id="nav-right">

            <div class="nav-divider">&nbsp;</div>
            <a href="logout.php" id="logout"><img src="imagesadminpage/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
            <div class="clear">&nbsp;</div>


        </div>
        <!-- end nav-right -->


        <!--  start nav -->
        <div class="nav">
            <div class="table">

                <ul class="select"><li><a href="adminhome.php"><b>Home</b></a>

                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>



                <ul class="select"><li><a href="createlogin.php"><b>Volunteer Management</b></a>

                        <div class="select_sub">
                            <ul class="sub">
                                <li><a href="createlogin.php">Create Volunteer Account</a></li>
                                <li><a href="delete-user.php">Edit Volunteers</a></li>
                            </ul>
                        </div>

                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>

                <ul class="select"><li><a href="view.php"><b>Data</b></a>

                        <div class="select_sub">
                            <ul class="sub">
                                <li><a href="view.php">Surveys</a></li>
                                <li><a href="view%20report.php">Reports</a></li>
                            </ul>
                        </div>

                    </li>
                </ul>

                <div class="nav-divider">&nbsp;</div>


                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <!--  start nav -->

    </div>
    <div class="clear"></div>
    <!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

<div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Question</th>
            <th>Total</th>
            <th>Details</th>
        </tr>
        </thead>
        <?php
        include("db_connection.php");

        if($db->connect_errno){
            die('Connectfailed['.$db->connect_error.']');
        }

//How much did you spend?
        $sql_avg = "select avg(answer_text_req) from answers, questions where `answers`.question_id=11 and `answers`.question_id=`questions`.question_id";
        $sql_sum = "select sum(answer_text_req) from answers, questions where `answers`.question_id=11 and `answers`.question_id=`questions`.question_id";
        $sql_max = "select max(answer_text_req) from answers, questions where `answers`.question_id=11 and `answers`.question_id=`questions`.question_id";
        $sql_min = "select min(answer_text_req) from answers, questions where `answers`.question_id=11 and `answers`.question_id=`questions`.question_id";
        $sql_text2 = "select question_text, COUNT(answer_text_req) from answers, questions where `answers`.question_id=11 and `answers`.question_id=`questions`.question_id";

        $result_avg = $db->query($sql_avg) or die($db->connect_error);
        $result_sum = $db->query($sql_sum) or die($db->connect_error);
        $result_max = $db->query($sql_max) or die($db->connect_error);
        $result_min = $db->query($sql_min) or die($db->connect_error);
        $result6 = $db->query($sql_text2) or die($db->connect_error);

        $avg = mysqli_fetch_array($result_avg);
        $sum = mysqli_fetch_array($result_sum);
        $max = mysqli_fetch_array($result_max);
        $min = mysqli_fetch_array($result_min);
        $question2 = mysqli_fetch_array($result6);


///How much fun did you have?
        $sql_happy = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=21 and answer_text_req = 2 and `answers`.question_id=`questions`.question_id";
        $sql_sad = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=21 and answer_text_req = 0 and `answers`.question_id=`questions`.question_id";
        $sql_normal = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=21 and answer_text_req = 1 and `answers`.question_id=`questions`.question_id";
        $sql_total = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=21 and `answers`.question_id=`questions`.question_id";
        $sql_text1 = "select question_text, COUNT(answer_text_req) from answers, questions where `answers`.question_id=21 and `answers`.question_id=`questions`.question_id";

        $result1 = $db->query($sql_happy) or die($db->connect_error);
        $result2 = $db->query($sql_normal) or die($db->connect_error);
        $result3 = $db->query($sql_sad) or die($db->connect_error);
        $result4 = $db->query($sql_total) or die($db->connect_error);
        $result5 = $db->query($sql_text1) or die($db->connect_error);

        $happy = mysqli_fetch_array($result1);
        $normal = mysqli_fetch_array($result2);
        $sad = mysqli_fetch_array($result3);
        $total = mysqli_fetch_array($result4);
        $question1 = mysqli_fetch_array($result5);

///Did you learn something new?
        $sql_new = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=31 and answer_text_req = 2 and `answers`.question_id=`questions`.question_id";
        $sql_notnew = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=31 and answer_text_req = 0 and `answers`.question_id=`questions`.question_id";
        $sql_abitnew = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=31 and answer_text_req = 1 and `answers`.question_id=`questions`.question_id";
        $sql_total2 = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=31 and `answers`.question_id=`questions`.question_id";
        $sql_text3 = $sql_text1 = "select question_text, COUNT(answer_text_req) from answers, questions where `answers`.question_id=31 and `answers`.question_id=`questions`.question_id";

        $result_new = $db->query($sql_new) or die($db->connect_error);
        $result_abitnew = $db->query($sql_abitnew) or die($db->connect_error);
        $result_notnew = $db->query($sql_notnew) or die($db->connect_error);
        $result4_total2 = $db->query($sql_total2) or die($db->connect_error);
        $result_text3 = $db->query($sql_text3) or die($db->connect_error);

        $new = mysqli_fetch_array($result_new);
        $abitnew = mysqli_fetch_array($result_abitnew);
        $notnew = mysqli_fetch_array($result_notnew);
        $total2 = mysqli_fetch_array($result4_total2);
        $question5 = mysqli_fetch_array($result_text3);

//Did you eat something healthy?
        $sql_healthy = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=41 and answer_text_req = 1 and `answers`.question_id=`questions`.question_id";
        $sql_unhealthy = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=41 and answer_text_req = 0 and `answers`.question_id=`questions`.question_id";
        $sql_total3 = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=41 and `answers`.question_id=`questions`.question_id";
        $sql_text4 = $sql_text1 = "select question_text, COUNT(answer_text_req) from answers, questions where `answers`.question_id=41 and `answers`.question_id=`questions`.question_id";

        $result_healthy = $db->query($sql_healthy) or die($db->connect_error);
        $result_unhealthy = $db->query($sql_unhealthy) or die($db->connect_error);
        $result_total3 = $db->query($sql_total3) or die($db->connect_error);
        $result7 = $db->query($sql_text4) or die($db->connect_error);

        $healthy = mysqli_fetch_array($result_healthy);
        $unhealthy = mysqli_fetch_array($result_unhealthy);
        $total3 = mysqli_fetch_array($result_total3);
        $question3 = mysqli_fetch_array($result7);

//Would you do this again?
        $sql_again = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=51 and answer_text_req = 1 and `answers`.question_id=`questions`.question_id";
        $sql_notagain = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=51 and answer_text_req = 0 and `answers`.question_id=`questions`.question_id";
        $sql_total4 = "select COUNT(answer_text_req) from answers, questions where `answers`.question_id=51 and `answers`.question_id=`questions`.question_id";
        $sql_text5 = "select question_text, COUNT(answer_text_req) from answers, questions where `answers`.question_id=51 and `answers`.question_id=`questions`.question_id";

        $result_again = $db->query($sql_again) or die($db->connect_error);
        $result_notagain = $db->query($sql_notagain) or die($db->connect_error);
        $result_total = $db->query($sql_total4) or die($db->connect_error);
        $result8 = $db->query($sql_text5) or die($db->connect_error);

        $again = mysqli_fetch_array($result_again);
        $notagain = mysqli_fetch_array($result_notagain);
        $total2 = mysqli_fetch_array($result_total);
        $question4 = mysqli_fetch_array($result8);

        ?>

        <tbody>
        <tr>
            <td>When asked <?php  echo $question1[0]; ?></td>
            <td>Total number of responses: <?php echo $total[0]; ?></td>
            <td>Number of happy kids: <?php echo $happy[0]; ?> <br/>
                Number of indifferent kids: <?php echo $normal[0]; ?> <br/>
                Number of sad kids: <?php echo $sad[0]; ?> </td>
        </tr>

        <tr>
            <td> When asked <?php  echo $question2[0]; ?></td>
            <td>Total amount spent during outings: £<?php echo $sum[0]; ?></td>
            <td>Average spending: £<?php echo $avg[0]; ?> <br/>
                Maximum spending: £<?php echo $max[0]; ?> <br/>
                Minimum spending: £<?php echo $min[0]; ?> </td>
        </tr>

        <tr>
            <td> When asked <?php  echo $question3[0]; ?></td>
            <td> Total number of responses: <?php echo $total3[0]; ?></td>
            <td> Number of kids who ate something healthy: <?php echo $healthy[0]; ?> <br/>
                 Number of kids who ate nothing healthy: <?php echo $unhealthy[0]; ?> </td>
        </tr>

        <tr>
            <td> When asked <?php  echo $question4[0]; ?></td>
            <td> Total number of responses: <?php echo $total2[0]; ?></td>
            <td> Number of kids who would repeat the activity: <?php echo $again[0]; ?> <br/>
                 Number of kids who wouldn't repeat the activity: <?php echo $notagain[0]; ?> </td>
        </tr>

        <tr>
            <td> When asked <?php  echo $question5[0]; ?></td>
            <td> Total number of responses: <?php echo $total2[0]; ?></td>
            <td> Number of kids who learnt something new: <?php echo $new[0]; ?> <br/>
                Number of kids who learnt something relatively new: <br/><?php echo $abitnew[0]; ?> <br/>
                Number of kids who learnt nothing new: <?php echo $notnew[0]; ?></td>
        </tr>
        </tbody>
        <?php
        $db->close();
        ?>
        ?>
    </table>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>

<!-- start footer -->
<div id="footer">
    <!-- <div id="footer-pad">&nbsp;</div> -->
    <!--  start footer-left -->
    <div id="footer-left">
        Copyright 2016 Befriend A Child <a href="">http://www.befriendachild.org.uk/</a>. All rights reserved.</div>
    <!--  end footer-left -->
    <div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

</body>
</html>
