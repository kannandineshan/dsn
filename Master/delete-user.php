
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


//I DO NOW UNDERSTAND WHAT THIS DOES...
if(isset($_GET['vol_email']))
{
    $login_name=$_GET['vol_email'];

    $result = getUser($login_name);
    $row = mysqli_fetch_array($result);
    $imageurl = $row['imageurl'];
    if(file_exists($imageurl))
    {

        unlink($imageurl);

    }
    deleteUser($login_name);
    // header("location: delete-user.php");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Administrator</title>
    <link rel="stylesheet" href="cssadminpage/screen.css" type="text/css" media="screen" title="default" />

    <link rel="stylesheet" media="all" type="text/css" href="cssadminpage/pro_dropline_ie.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!--  jquery core -->
    <script src="jsadminpage/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

    <!--  styled select box script version 2 -->
    <script src="jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
            $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
        });
    </script>

    <!--  styled select box script version 3 -->
    <script src="jsadminpage/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
        });
    </script>

    <!--  styled file upload script -->
    <script src="jsadminpage/jquery/jquery.filestyle.js" type="text/javascript"></script>
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
    <link rel="stylesheet" href="cssadminpage/datePicker.css" type="text/css" />
    <script src="jsadminpage/jquery/date.js" type="text/javascript"></script>
    <script src="jsadminpage/jquery/jquery.datePicker.js" type="text/javascript"></script>
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
            <th>Sr. #</th>
            <th>Login Name</th>
            <th>First Name</th>
            <th>Surname</th>

            <th>Child Matched?</th>
            <th>Child Gender</th>
            <th>Child Date of Birth</th>

            <th>Options</th>
        </tr>
        </thead>
        <?php

        $result = getAllRegisteredUsers();

        if(mysqli_num_rows($result)>0)                                                {

            $counter = 0;
            while ($row=  mysqli_fetch_array($result))
            {
                $counter++;
                ?>
                <tbody>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row['vol_email']; ?></td>
                    <td><?php echo $row['vol_firstname']; ?></td>
                    <td><?php echo $row['vol_surname']; ?></td>
                    <td><?php
                        if($row['vol_child_matched']==1){
                            echo "Yes";
                        }
                        else{
                            echo "No";
                        }
                        ?></td>
                    <td><?php
                        if($row['vol_child_matched']==1){
                            echo $row['vol_child_gender'];
                        }
                        else{
                            echo "/";
                        }?></td>
                    <td><?php
                        if($row['vol_child_matched']==1) {
                            echo $row['vol_child_dob'];
                        }
                        else{
                            echo "/";
                        }?></td>
                    <td>
                        <a href="edit-user.php?vol_email=<?php echo $row['vol_email']; ?>" style="color:green;">Edit</a>
                        &nbsp;&nbsp;&nbsp;<a href="?vol_email=<?php echo $row['vol_email']; ?>" style="color:red;">Delete</a>
                    </td>

                </tr>
                </tbody>
                <?php

            }//end of for loop
        }//end if statement
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
