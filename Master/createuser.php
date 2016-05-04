<?php

    //THIS PAGE IS DESTINATION WHEN ADMIN WANTS TO CREATE A NEW USER AND WHEN A NEW USER HAS BEEN ADDED TO THE DATABASE



    //sends user back to index.php if not logged in
    session_start();
    if(!isset($_SESSION['ad_email'])){
        header("Location: index.php");
    }


    //This check shows the right message if the user was created or existed already
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $success = $_GET["Success"];

        if($success=="Yes"){
            echo "<SCRIPT>alert('User created!!!');</SCRIPT>";
        }
        elseif($success=="No"){
            echo "<script>alert('User already exists');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Create Login</title>
    <link rel="stylesheet" href="cssadminpage/screen.css" type="text/css" media="screen" title="default" />

    <link rel="stylesheet" media="all" type="text/css" href="cssadminpage/pro_dropline_ie.css" />

    <!--  jquery core -->
    <script src="jsadminpage/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
        });
    </script>

    <!--  styled file upload script -->
    <script src="jsadminpage/jquery/jquery.filestyle.js" type="text/javascript"></script>
    < type="text/javascript" charset="utf-8">
        $(function() {
            $("input.file_1").filestyle({
                image: "images/forms/upload_file.gif",
                imageheight : 29,
                imagewidth : 78,
                width : 300
            });
        });
    <!-- javascript for random password -->
    <script type='text/javascript' src='jscreatelogin/randompassword.js'></script>

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

<!-- start content-outer -->
<div id="content-outer">
    <!-- start content -->
    <div id="content">


        <div id="page-heading"><h1>Create User Login</h1></div>


        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="3" class="sized"><img src="imagesadminpage/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="imagesadminpage/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
            </tr>
            <tr>
                <td id="tbl-border-left"></td>
                <td>
                    <!--  start content-table-inner -->
                    <div id="content-table-inner">

                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                            <tr valign="top">
                                <td>


                                    <!--  start step-holder -->
                                    <div id="step-holder">

                                        <div class="step-dark-left">Add User details</div>


                                        <div class="clear"></div>
                                    </div>
                                    <!--  end step-holder -->

                                    <!-- start id-form -->
                                    <form id="idform" action='createlogin.php' method='post'>
                                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                        <tr>
                                            <th valign="top">Firstname:</th>
                                            <td><input type="text"  class="inp-form" name="firstname" id="firstname" required/></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <th valign="top">Surname:</th>
                                            <td><input type="text" class="inp-form" name="surname" id="surname" required/></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <th valign="top">E-mail:</th>
                                            <td><input type="email" class="inp-form" name="email" id="email" required/></td>
                                            <td></td>

                                        </tr>
                                        <!-- added field for random password -->
                                        <tr>
                                            <th valign="top">Password:</th>
                                            <td>
                                                <label for="pass"></label>
                                                <input type="password" class="inp-form" name="password" id="pass" id="password" required/>
                                            </td>
                                            <td>
                                                <button type="button" onclick="output()">Create Password</button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th valign="top">Currently matched with a child?</th>
                                            <td>
                                                <input type="radio" name="child_matched" value=true id="yes" id="matched" required>Yes
                                                <input type="radio" name="child_matched" value=false id="no" id="matched" required>No
                                            </td>
                                        </tr>

                                        <tr id="childinfo" style="display: none;">
                                            <th valign="top">Child's gender:</th>
                                            <th>
                                                <input type="radio" name="child_gender" value="male" class="disabledelements" id="gender" required>Male
                                                <input type="radio" name="child_gender" value="female" class="disabledelements" id="gender" required>Female
                                                <input type="radio" name="child_gender" value="other" class="disabledelements" id="gender" required>Other
                                            </th>


                                            <th valign="top">Child's date of birth:</th>

                                            <th>
                                                <input  type="date" class="disabledelements" disabled name="date_of_birth" id="dateofbirth" required >
                                            </th>
                                        </tr>


                                        <tr>
                                            <th>&nbsp;</th>
                                            <td valign="top">
                                                <input id="submit" type="submit" value="" class="form-submit" />
                                                <input type="reset" value="" class="form-reset"  />
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    </form>
                                    <script src="jsadminpage/jquery/enabledisablegender.js" type="text/javascript"></script>
                                    <script src="jsadminpage/jquery/modernizr-custom.js" type="text/javascript"></script>
                                    <!-- end id-form  -->


                                </td>

                                <td>



                            <tr>
                                <td><img src="imagesadminpage/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                                <td></td>
                            </tr>
                        </table>

                        <div class="clear"></div>


                    </div>
                    <!--  end content-table-inner  -->
                </td>
                <td id="tbl-border-right"></td>
            </tr>
            <tr>
                <th class="sized bottomleft"></th>
                <td id="tbl-border-bottom">&nbsp;</td>
                <th class="sized bottomright"></th>
            </tr>
        </table>




        <div class="clear">&nbsp;</div>

    </div>
    <!--  end content -->
    <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->



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