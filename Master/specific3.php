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
<div id="content-outer">
    <!-- start content -->
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Details</th>
            </tr>
            </thead>
            <?php
            include("db_connection.php");

            $id = $_GET['vol_id'];


            //number of submissions
            $sql_submissions = "select count(submission_id) from submissions where vol_id =$id";
            $sql_output = $db->query($sql_submissions) or die($db->connect_error);
            $output = mysqli_fetch_array($sql_output);

            //how much money did you spend?
            $sql_money_sum = "select sum(answer_text_req), `answers`.question_id from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=11";
            $sql_money_min = "select min(answer_text_req), `answers`.question_id from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=11";
            $sql_money_max = "select max(answer_text_req), `answers`.question_id from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=11";
            $sql_money_avg = "select avg(answer_text_req), `answers`.question_id from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=11";

            $output_sum = $db->query($sql_money_sum) or die($db->connect_error);
            $output_min = $db->query($sql_money_min) or die($db->connect_error);
            $output_max = $db->query($sql_money_max) or die($db->connect_error);
            $output_avg = $db->query($sql_money_avg) or die($db->connect_error);

            $sum = mysqli_fetch_array($output_sum);
            $min = mysqli_fetch_array($output_min);
            $max = mysqli_fetch_array($output_max);
            $avg = mysqli_fetch_array($output_avg);


            //how much fun did you have today?
            $sql_fun_happy = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=21 and answer_text_req=2";
            $sql_fun_normal = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=21 and answer_text_req=1";
            $sql_fun_sad = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=21 and answer_text_req=0";

            $output_happy = $db->query($sql_fun_happy);
            $output_normal = $db->query($sql_fun_normal);
            $output_sad = $db->query($sql_fun_sad);

            $happy = mysqli_fetch_array($output_happy);
            $normal = mysqli_fetch_array($output_normal);
            $sad = mysqli_fetch_array($output_sad);

            //did you learn anything new?
            $sql_learn_yes = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=31 and answer_text_req=2";
            $sql_learn_might = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=31 and answer_text_req=1";
            $sql_learn_no = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=31 and answer_text_req=0";

            $output_learn_yes = $db->query($sql_learn_yes);
            $output_learn_might = $db->query($sql_learn_might);
            $output_learn_no = $db->query($sql_learn_no);

            $learn_yes = mysqli_fetch_array($output_learn_yes);
            $learn_might = mysqli_fetch_array($output_learn_might);
            $learn_no = mysqli_fetch_array($output_learn_no);

            //did you eat something healthy?
            $sql_healthy_yes = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=41 and answer_text_req=1";
            $sql_healthy_no = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=41 and answer_text_req=0";

            $output_healthy_yes = $db->query($sql_healthy_yes);
            $output_healthy_no = $db->query($sql_healthy_no);

            $healthy_yes = mysqli_fetch_array($output_healthy_yes);
            $healthy_no = mysqli_fetch_array($output_healthy_no);

            //would you do it again?
            $sql_again_yes = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=51 and answer_text_req=1";
            $sql_again_no = "select count(answer_text_req) from answers, questions where submission_id in (select submission_id from submissions where vol_id =$id) and `answers`.question_id = `questions`.question_id and `answers`.question_id=51 and answer_text_req=0";

            $output_again_yes = $db->query($sql_again_yes);
            $output_again_no = $db->query($sql_again_no);

            $again_yes = mysqli_fetch_array($output_again_yes);
            $again_no = mysqli_fetch_array($ouput_again_no);

                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td>Total amount of money spent was £<?php echo $sum[0]; ?></td>
                        <td>The average spending: £<?php echo $avg[0]; ?> <br/>
                            The minimum amount spent: £<?php echo $min[0];?> <br/>
                            The maximum amount spent: £<?php echo $max[0];?></td>
                    </tr>

                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td>Number of responses: <?php echo $output[0]; ?></td>
                        <td>Number of happy kids: <?php echo $happy[0]; ?> <br/>
                            Number of indifferent kids: <?php echo $normal[0];?> <br/>
                            Number of sad kids: <?php echo $sad[0];?></td>
                    </tr>

                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td>Number of responses: <?php echo $output[0]; ?></td>
                        <td>Number that learnt something new <?php echo $learn_yes[0]; ?><br/>
                            Number that learnt something relatively new <?php echo $learn_might[0];?> <br/>
                            Number that had done it before <?php echo $learn_no[0];?></td>
                    </tr>

                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td>Number of responses: <?php echo $output[0]; ?></td>
                        <td>Number that ate something healthy: <?php echo $healthy_yes[0]; ?> <br/>
                            Number that ate nothing healthy: <?php echo $healthy_no[0];?> </td>
                    </tr>

                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td>Number of responses: <?php echo $output[0]; ?></td>
                        <td>Number that would repeat the activity: <?php echo $again_yes[0]; ?> <br/>
                            Number that would not repeat the activity: <?php echo $again_no[0];?></td>
                    </tr>
                    </tbody>

        </table>
    </div>
    <!--  end content -->
    <div class="clear">&nbsp;</div>
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
